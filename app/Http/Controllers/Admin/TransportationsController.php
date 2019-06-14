<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transportation;
use App\Teacher;
use App\Center;
use Config;
use DB;

class TransportationsController extends Controller
{
    public function getIndex() {
        $transportations = Transportation::all();
        $teachers = Teacher::all();
        $centers = Center::all();
        return view('admin.pages.transportation.index', compact('transportations','teachers','centers'));
    }

    public function getAdd() {
        $transportations = Transportation::all();
        $teachers = Teacher::all();
        $centers = Center::all();
        return view('admin.pages.transportation.add', compact('transportations','teachers','centers'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'arrival' => 'required',
            'launch' => 'required',
            'price' => 'required',
            'bus' => 'required',
            'center' => 'required',
            'manager' => 'required',
        ] ,[
            'arrival.required' => 'من فضلك أدخل نقطة الوصول',
            'launch.required' => 'من فضلك أدخل نقطة الانطلاق',
            'price.required' => 'من فضلك أدخل قيمة الاشتراك',
            'bus.required' => 'من فضلك أدخل رقم الاوتوبيس',
            'center.required' => 'من فضلك اختر المركز',
            'manager.required' => 'من فضلك اختر المشرف',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $transportation = new Transportation();

        $transportation->arrival = $request->arrival;
        $transportation->launch = $request->launch;
        $transportation->price = $request->price;
        $transportation->bus = $request->bus;
        $transportation->center_id = $request->center;
        $transportation->manager_id = $request->manager;
        if(isset($request->sat)){
            $transportation->sat = 1;
        }
        if(isset($request->sun)){
            $transportation->sun = 1;
        }
        if(isset($request->mon)){
            $transportation->mon = 1;
        }
        if(isset($request->tue)){
            $transportation->tue = 1;
        }
        if(isset($request->wed)){
            $transportation->wed = 1;
        }
        if(isset($request->thu)){
            $transportation->thu = 1;
        }
        if(isset($request->fri)){
            $transportation->fri = 1;
        }
        
        if ($transportation->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $teachers = Teacher::all();
            $centers = Center::all();
            $transportations = DB::table('transportations')
                        ->join('teachers','transportations.manager_id','=','teachers.id')
                        ->join('centers','transportations.center_id','=','centers.id')
                        ->select('transportations.*','teachers.teacher_name','centers.center_name')
                        ->where('transportations.id','=',$id)
                        ->get();
            return view('admin.pages.transportation.edit', compact('centers','transportations','teachers'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $transportation = Transportation::find($id);

        $transportation->arrival = $request->arrival;
        $transportation->launch = $request->launch;
        $transportation->price = $request->price;
        $transportation->bus = $request->bus;
        $transportation->center_id = $request->center;
        $transportation->manager_id = $request->manager;

        if(isset($request->sat)){
            $transportation->sat = 1;
        }
        if(isset($request->sun)){
            $transportation->sun = 1;
        }
        if(isset($request->mon)){
            $transportation->mon = 1;
        }
        if(isset($request->tue)){
            $transportation->tue = 1;
        }
        if(isset($request->wed)){
            $transportation->wed = 1;
        }
        if(isset($request->thu)){
            $transportation->thu = 1;
        }
        if(isset($request->fri)){
            $transportation->fri = 1;
        }

        if ($transportation->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $transportation = Transportation::find($id);
            $transportation->delete();

            return redirect()->back();
        }
    }

}
