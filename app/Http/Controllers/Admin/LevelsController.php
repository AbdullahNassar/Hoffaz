<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Level;
use Config;
use DB;

class LevelsController extends Controller
{
    public function getIndex() {
        $levels = Level::all();
        return view('admin.pages.level.index', compact('levels'));
    }

    public function getAdd() {
        $levels = Level::all();
        return view('admin.pages.level.add', compact('levels'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل اسم المرحلة',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $level = new Level();

        $level->level_name = $request->name;
        
        if ($level->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $levels = Level::all();
            $level = Level::find($id);
            return view('admin.pages.level.edit', compact('level','levels'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $level = Level::find($id);

        $level->level_name = $request->name;

        if ($level->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $level = Level::find($id);
            $level->delete();

            return redirect()->back();
        }
    }

}
