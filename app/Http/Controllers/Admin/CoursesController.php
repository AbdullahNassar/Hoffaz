<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\CourseMaterial;
use App\Material;
use App\Center;
use App\Level;
use Config;
use DB;

class CoursesController extends Controller
{
    public function getIndex() {
        $courses = DB::table('courses')
                    ->join('centers','courses.center_id','=','centers.id')
                    ->join('levels','courses.level_id','=','levels.id')
                    ->select('courses.*','centers.center_name','levels.level_name')
                    ->get();
        $centers = Center::all();
        $levels = Level::all();
        $materials = Material::all();
        return view('admin.pages.course.index', compact('courses','levels','centers','materials'));
    }

    public function getAdd() {
        $courses = DB::table('courses')
                    ->join('centers','courses.center_id','=','centers.id')
                    ->join('levels','courses.level_id','=','levels.id')
                    ->select('courses.*','centers.center_name','levels.level_name')
                    ->get();
        $centers = Center::all();
        $levels = Level::all();
        $materials = Material::all();
        return view('admin.pages.course.add', compact('courses','levels','centers','materials'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required',
            'center_id' => 'required',
            'level_id' => 'required',
            'max_num' => 'required',
            'time' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل اسم الحلقة',
            'center_id.required' => 'من فضلك اختر احد المراكز',
            'level_id.required' => 'من فضلك اختر احدى المراحل',
            'max_num.required' => 'من فضلك أدخل الحد الاقصى لعدد الطلاب ',
            'time.required' => 'من فضلك أدخل المواعيد',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $course = new Course();

        $course->course_name = $request->name;
        $course->center_id = $request->center_id;
        $course->level_id = $request->level_id;
        $course->max_num = $request->max_num;
        $course->time = $request->time;
        
        if ($course->save()){
            $count = Material::count();

            for($i=1; $i<=$count; $i++){
                $item = $request->input('m'.$i);
                if(isset($item)){
                    $course->details()->create([
                        'course_id' => $course->id,
                        'material_id' => $request->input('m'.$i)
                    ]);
                }
            }
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $courses = DB::table('courses')
                    ->join('centers','courses.center_id','=','centers.id')
                    ->join('levels','courses.level_id','=','levels.id')
                    ->select('courses.*','centers.center_name','levels.level_name')
                    ->get();
            $groups = DB::table('courses')
                    ->join('centers','courses.center_id','=','centers.id')
                    ->join('levels','courses.level_id','=','levels.id')
                    ->select('courses.*','centers.center_name','levels.level_name')
                    ->where('courses.id','=',$id)
                    ->get();
            $materials = Material::all();
            $mats = DB::table('course_materials')
                    ->join('courses','course_materials.course_id','=','courses.id')
                    ->join('materials','course_materials.material_id','=','materials.id')
                    ->select('course_materials.*','courses.course_name','materials.material_name')
                    ->where('course_materials.course_id','=',$id)
                    ->get();
            $centers = Center::all();
            $levels = Level::all();
            return view('admin.pages.course.edit', compact('groups','courses','centers','levels','materials','mats'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $course = Course::find($id);

        $count = Material::count();

        for($i=1; $i<=$count; $i++){
            $item = $request->input('m'.$i);
            if(isset($item)){
                $course_id = $id;
                $material_id = $request->input('m'.$i);
                $data = array('course_id' => $course_id , 'material_id' => $material_id);
                DB::table('course_materials')->insert($data);
            }
        }

        

        $course->course_name = $request->name;
        $course->center_id = $request->center_id;
        $course->level_id = $request->level_id;
        $course->max_num = $request->max_num;
        $course->time = $request->time;

        if ($course->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $course = Course::find($id);
            $course->delete();

            DB::table('course_materials')->where('course_id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function mdelete($id) {
        if (isset($id)) {
            DB::table('course_materials')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

}
