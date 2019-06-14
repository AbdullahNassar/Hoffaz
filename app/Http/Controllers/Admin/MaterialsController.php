<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Material;
use App\Percent;
use App\Course;
use App\Material_document;
use App\Teacher;
use App\Level;
use Config;
use DB;

class MaterialsController extends Controller
{
    public function getIndex() {
        $docs = DB::table('material_documents')
                ->join('materials','material_documents.material_id','=','materials.id')
                ->select('material_documents.*','materials.material_name')
                ->get();

        $percents = DB::table('percents')
                ->join('materials','percents.material_id','=','materials.id')
                ->select('percents.*','materials.material_name')
                ->get();

        $materials = DB::table('materials')
                ->join('levels','materials.level_id','=','levels.id')
                ->select('materials.*','levels.level_name')
                ->get();
        $courses = Course::all();
        $cors = DB::table('course_materials')
                    ->join('courses','course_materials.course_id','=','courses.id')
                    ->join('materials','course_materials.material_id','=','materials.id')
                    ->select('course_materials.*','courses.course_name','materials.material_name')
                    ->get();

        $teachers = Teacher::all();
        $teachs = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $levels = Level::all();
        return view('admin.pages.material.index', compact('teachs','cors','materials','docs','courses','levels','percents','teachers'));
    }

    public function getAdd() {
        $docs = DB::table('material_documents')
                ->join('materials','material_documents.material_id','=','materials.id')
                ->select('material_documents.*','materials.material_name')
                ->get();

        $percents = DB::table('percents')
                ->join('materials','percents.material_id','=','materials.id')
                ->select('percents.*','materials.material_name')
                ->get();

        $materials = DB::table('materials')
                ->join('levels','materials.level_id','=','levels.id')
                ->select('materials.*','levels.level_name')
                ->get();
        $courses = Course::all();
        $cors = DB::table('course_materials')
                    ->join('courses','course_materials.course_id','=','courses.id')
                    ->join('materials','course_materials.material_id','=','materials.id')
                    ->select('course_materials.*','courses.course_name','materials.material_name')
                    ->get();

        $teachers = Teacher::all();
        $teachs = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $levels = Level::all();
        return view('admin.pages.material.add', compact('teachs','cors','materials','docs','courses','levels','percents','teachers'));
    }

    public function files() {
        $docs = DB::table('material_documents')
                ->join('materials','material_documents.material_id','=','materials.id')
                ->select('material_documents.*','materials.material_name')
                ->get();

        $percents = DB::table('percents')
                ->join('materials','percents.material_id','=','materials.id')
                ->select('percents.*','materials.material_name')
                ->get();

        $materials = DB::table('materials')
                ->join('levels','materials.level_id','=','levels.id')
                ->select('materials.*','levels.level_name')
                ->get();
        $courses = Course::all();
        $cors = DB::table('course_materials')
                    ->join('courses','course_materials.course_id','=','courses.id')
                    ->join('materials','course_materials.material_id','=','materials.id')
                    ->select('course_materials.*','courses.course_name','materials.material_name')
                    ->get();

        $teachers = Teacher::all();
        $teachs = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $levels = Level::all();
        return view('admin.pages.material.files', compact('teachs','cors','materials','docs','courses','levels','percents','teachers'));
    }

    public function grades() {
        $docs = DB::table('material_documents')
                ->join('materials','material_documents.material_id','=','materials.id')
                ->select('material_documents.*','materials.material_name')
                ->get();

        $percents = DB::table('percents')
                ->join('materials','percents.material_id','=','materials.id')
                ->select('percents.*','materials.material_name')
                ->get();

        $materials = DB::table('materials')
                ->join('levels','materials.level_id','=','levels.id')
                ->select('materials.*','levels.level_name')
                ->get();
        $courses = Course::all();
        $cors = DB::table('course_materials')
                    ->join('courses','course_materials.course_id','=','courses.id')
                    ->join('materials','course_materials.material_id','=','materials.id')
                    ->select('course_materials.*','courses.course_name','materials.material_name')
                    ->get();

        $teachers = Teacher::all();
        $teachs = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $levels = Level::all();
        return view('admin.pages.material.grades', compact('teachs','cors','materials','docs','courses','levels','percents','teachers'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required',
            'success' => 'required',
            'price' => 'required',
            'level_id' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل اسم الحلقة',
            'success.required' => 'من فضلك أدخل درجة النجاح',
            'price.required' => 'من فضلك أدخل السعر ',
            'level_id.required' => 'من فضلك اختر احدى المراحل',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $material = new Material();

        $material->material_name = $request->name;
        $material->success = $request->success;
        $material->level_id = $request->level_id;
        $material->price = $request->price;

        $material->p1 = $request->p1;
        $material->p2 = $request->p2;
        $material->p3 = $request->p3;
        $material->p4 = $request->p4;
        $material->p5 = $request->p5;
        
        if ($material->save()){
            $count = Course::count();
            for($i=1; $i<=$count; $i++){
                $item = $request->input('c'.$i);
                if(isset($item)){
                    $material->details()->create([
                        'course_id' => $request->input('c'.$i),
                        'material_id' => $material->id 
                    ]);
                }
            }

            $count2 = Teacher::count();
            for($i=1; $i<=$count2; $i++){
                $item = $request->input('t'.$i);
                if(isset($item)){
                    $material->teachers()->create([
                        'teacher_id' => $request->input('t'.$i),
                        'material_id' => $material->id 
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
            $materials = DB::table('materials')
                    ->join('levels','materials.level_id','=','levels.id')
                    ->select('materials.*','levels.level_name')
                    ->where('materials.id','=', $id)
                    ->get();
            $courses = Course::all();
            $cors = DB::table('course_materials')
                    ->join('courses','course_materials.course_id','=','courses.id')
                    ->join('materials','course_materials.material_id','=','materials.id')
                    ->select('course_materials.*','courses.course_name','materials.material_name')
                    ->where('course_materials.material_id','=',$id)
                    ->get();
            $levels = Level::all();
            $docs = DB::table('material_documents')
                    ->join('materials','material_documents.material_id','=','materials.id')
                    ->select('material_documents.*','materials.*')
                    ->where('material_documents.material_id','=', $id)
                    ->get();
            $percents = DB::table('percents')
                    ->join('materials','percents.material_id','=','materials.id')
                    ->select('percents.*','materials.material_name')
                    ->where('percents.material_id','=', $id)
                    ->get();

            $teachers = Teacher::all();
            $teachs = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->where('teacher_materials.material_id','=',$id)
                    ->get();
            return view('admin.pages.material.edit', compact('teachers','teachs','cors','materials','docs','percents','courses','levels','teachers'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $material = Material::find($id);

        $material->material_name = $request->name;
        $material->success = $request->success;
        $material->level_id = $request->level_id;

        $material->p1 = $request->p1;
        $material->p2 = $request->p2;
        $material->p3 = $request->p3;
        $material->p4 = $request->p4;
        $material->p5 = $request->p5;

        $count = Course::count();

            for($i=1; $i<=$count; $i++){
                $item = $request->input('c'.$i);
                if(isset($item)){
                    $material->details()->create([
                        'course_id' => $request->input('c'.$i),
                        'material_id' => $id 
                    ]);
                }
            }

        $count2 = Teacher::count();
            for($i=1; $i<=$count2; $i++){
                $item = $request->input('t'.$i);
                if(isset($item)){
                    $material->teachers()->create([
                        'teacher_id' => $request->input('t'.$i),
                        'material_id' => $id 
                    ]);
                }
            }

        if ($material->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $material = Material::find($id);
            $material->delete();

            DB::table('course_materials')->where('material_id','=', $id)->delete();
            
            DB::table('teacher_materials')->where('material_id','=', $id)->delete();

            DB::table('percents')->where('material_id','=', $id)->delete();

            DB::table('material_documents')->where('material_id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function addDoc(Request $request) {

        $v = validator($request->all() ,[
            'image2' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:20000',
            'material_id' => 'required',
        ] ,[
            'image2.required' => 'من فضلك قم بتحميل الملف',
            'image2.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image2.max' => 'الحد الاقصى لحجم الملف : 20 MB',
            'material_id.required' => 'من فضلك اختر مادة',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $doc = new Material_document();
        $doc->material_id = $request->material_id;

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image2');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $doc->file = $imageName;
        }
        

        if ($doc->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function deleteDoc($id) {
        if (isset($id)) {
            $doc = Material_document::find($id);

            $doc->delete();

            return redirect()->back();
        }
    }

    public function addPercent(Request $request) {

        $v = validator($request->all() ,[
            'material_id' => 'required',
            'name' => 'required',
            'grade' => 'required',
        ] ,[
            'material_id.required' => 'من فضلك اختر مادة',
            'name.required' => 'من فضلك أدخل اسم البند',
            'grade.required' => 'من فضلك أدخل درجة البند',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $percent = new Percent();
        $percent->material_id = $request->material_id;
        $percent->percent_name = $request->name;
        $percent->grade = $request->grade;
        

        if ($percent->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function deletePercent($id) {
        if (isset($id)) {
            $percent = Percent::find($id);

            $percent->delete();

            return redirect()->back();
        }
    }

    public function cdelete($id) {
        if (isset($id)) {
            DB::table('course_materials')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function tdelete($id) {
        if (isset($id)) {
            DB::table('teacher_materials')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

}
