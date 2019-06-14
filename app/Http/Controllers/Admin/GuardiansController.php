<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guardian;
use App\Member;
use Config;
use DB;

class guardiansController extends Controller
{
    public function getIndex() {
        $guardians = Guardian::all();
        return view('admin.pages.guardian.index', compact('guardians'));
    }

    public function getAdd() {
        $guardians = Guardian::all();
        return view('admin.pages.guardian.add', compact('guardians'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'whatsapp' => 'required',
            'national_id' => 'required',
            'nationality' => 'required',
            'job' => 'required',
        ] ,[
            'image.required' => 'من فضلك قم بتحميل الملف',
            'image.image' => 'من فضلك حمل صورة وليس فيديو',
            'image.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image.max' => 'الحد الاقصى لحجم الملف : 20 MB',
            'name.required' => 'من فضلك أدخل اسم ولى الأمر',
            'username.required' => 'من فضلك أدخل اسم المستخدم',
            'password.required' => 'من فضلك أدخل كلمة السر',
            'address.required' => 'من فضلك أدخل العنوان',
            'email.required' => 'من فضلك أدخل البريد الالكترونى',
            'email.required' => 'من فضلك أدخل بريد الكترونى صحيح',
            'phone.required' => 'من فضلك أدخل رقم الهاتف',
            'nationality.required' => 'من فضلك أدخل الجنسية',
            'whatsapp.required' => 'من فضلك أدخل رقم الواتس',
            'national_id.required' => 'من فضلك أدخل الرقم القومى',
            'job.required' => 'من فضلك أدخل وظيفة',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $guardian = new Guardian();
        $member = new Member();

        $member->guardian_name = $request->name;
        $member->username = $request->username;
        $member->password = bcrypt($request->password);
        $member->recover = $request->password;
        $member->address = $request->address;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->whatsapp = $request->whatsapp;
        $member->national_id = $request->national_id;
        $member->nationality = $request->nationality;
        $member->job = $request->job;

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $member->image = $imageName;
            $guardian->image = $imageName;
        }

        $guardian->guardian_name = $request->name;
        $guardian->username = $request->username;
        $guardian->password = bcrypt($request->password);
        $guardian->recover = $request->password;
        $guardian->address = $request->address;
        $guardian->email = $request->email;
        $guardian->phone = $request->phone;
        $guardian->whatsapp = $request->whatsapp;
        $guardian->national_id = $request->national_id;
        $guardian->nationality = $request->nationality;
        $guardian->job = $request->job;
        
        if ($guardian->save() && $member->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $guardians = Guardian::all();
            $guardian = Guardian::find($id);
            return view('admin.pages.guardian.edit', compact('guardian','guardians'));
        }        
    }

    public function postEdit(Request $request,$id) {

        $guardian = Guardian::find($id);
        $guardian->guardian_name = $request->name;
        $guardian->username = $request->username;
        $guardian->password = bcrypt($request->password);
        $guardian->recover = $request->password;
        $guardian->address = $request->address;
        $guardian->email = $request->email;
        $guardian->phone = $request->phone;
        $guardian->whatsapp = $request->whatsapp;
        $guardian->national_id = $request->national_id;
        $guardian->nationality = $request->nationality;
        $guardian->job = $request->job;

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $guardian->image = $imageName;
        }

        if ($guardian->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $guardian = Guardian::find($id);
            $guardian->delete();

            return redirect()->back();
        }
    }

}
