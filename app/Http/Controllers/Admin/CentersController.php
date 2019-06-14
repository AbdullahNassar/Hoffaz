<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Center;
use Config;
use DB;

class CentersController extends Controller
{
    public function getIndex() {
        $centers = Center::all();
        return view('admin.pages.center.index', compact('centers'));
    }

    public function getAdd() {
        $centers = Center::all();
        return view('admin.pages.center.add', compact('centers'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required',
            'address' => 'required',
            'manager' => 'required',
            'head_manager' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل اسم المركز',
            'address.required' => 'من فضلك أدخل عنوان المركز',
            'manager.required' => 'من فضلك أدخل اسم المشرف',
            'head_manager.required' => 'من فضلك أدخل اسم المدير العام',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $center = new Center();

        $center->center_name = $request->name;
        $center->address = $request->address;
        $center->manager = $request->manager;
        $center->head_manager = $request->head_manager;
        
        if ($center->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $centers = Center::all();
            $center = Center::find($id);
            return view('admin.pages.center.edit', compact('center','centers'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $center = Center::find($id);

        $center->center_name = $request->name;
        $center->address = $request->address;
        $center->manager = $request->manager;
        $center->head_manager = $request->head_manager;

        if ($center->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $center = Center::find($id);
            $center->delete();

            DB::table('courses')->where('center_id','=', $id)->delete();
            DB::table('students')->where('center_id','=', $id)->delete();
            DB::table('center_documents')->where('center_id','=', $id)->delete();
            DB::table('absents')->where('center_id','=', $id)->delete();
            DB::table('transportations')->where('center_id','=', $id)->delete();

            return redirect()->back();
        }
    }

}
