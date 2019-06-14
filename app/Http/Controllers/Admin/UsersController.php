<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Config;
use DB;

class UsersController extends Controller {

    public function profile() {

        return view('admin.pages.profile');
    }

    public function getIndex() {
        $users = User::get();

        return view('admin.pages.users.index', compact('users'));
    }

    public function getUser($id)
    {
        if (isset($id)) {
            $users = DB::table('users')
                    ->select('users.*')
                    ->where('id', '=', $id)
                    ->get();

            return view('admin.pages.users.edit', compact('users'));
        }
    }

    public function getU($id)
    {
        if (isset($id)) {
            $users = DB::table('users')
                        ->select('users.*')
                        ->where('id', '=', $id)
                        ->get();

            return view('admin.pages.users.delete', compact('users'));
        }
    }

    public function deleteU($id)
    {
        if (isset($id)) {
            DB::table('users')->where('id','=', $id)->delete();
            $users = User::get();
            return view('admin.pages.users.index', compact('users'));
        }
    }

    public function getAdd() {

        return view('admin.pages.users.add');
    }

    public function insertUser(Request $request)
    {
        if (Config::get('app.locale') == 'en'){
            $v = validator($request->all() ,[
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'type' => 'required',
                'password' => 'required',
                'phone' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
                'active' => 'required',
            ] ,[
                'image.required' => 'Please upload image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'name.required' => 'Please insert Name',
                'username.required' => 'Please insert UserName',
                'email.required' => 'Please insert E-mail',
                'password.required' => 'Please insert Password',
                'type.required' => 'Please Select Type',
                'active.required' => 'Please Select Activation Status',
            ]);

            if ($v->fails()){
                return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
            }
        }else{
            $v = validator($request->all() ,[
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:members,email',
                'type' => 'required',
                'password' => 'required',
                'phone' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
                'active' => 'required',
            ] ,[
                'image.required' => 'من فضلك حمل الصورة',
                'image.image' => 'من فضلك حمل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم 20 MB',
                'name.required' => 'من فضلك ادخل الاسم',
                'username.required' => 'من فضلك ادخل اسم المستخدم',
                'email.required' => 'من فضلك ادخل البريد الالكترونى',
                'email.unique' => 'هذا البريد الالكترونى تم استخدامه مسبقا',
                'email.email' => 'من فضلك تأكد من صحة البريد الالكترونى',
                'password.required' => 'من فضلك ادخل كلمة السر',
                'type.required' => 'من فضلك اختر  النوع',
                'active.required' => 'من فضلك اختر  حالة التفعيل',
            ]);

            if ($v->fails()){
                return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
            }
        }
        

        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $recover = $request->input('password');
        $country = $request->input('country');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $google = $request->input('google');
        $instagram = $request->input('instagram');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $image = $request->input('image');
        $active = $request->input('active');

        $data = array(
            'name'=>$name,
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
            'recover'=>$recover,
            'country'=>$country,
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'google'=>$google,
            'instagram'=>$instagram,
            'phone'=>$phone,
            'address'=>$address,
            'image'=>$image,
            'active'=>$active
            );

        $U = DB::table('users')->insert($data);
        if (Config::get('app.locale') == 'en'){
            if ($U){
                return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
            }
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }else{
            if ($U){
                return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
            }
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function postActive(Request $request){
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->active = 1;
            if($user->save()){
                return response()->json('success');
            }
        }
    }

    public function postDisActive(Request $request){
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->active = 0;
            $user->save();
            return response()->json('success');
        }
    }

    public function postBlock(Request $request){
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->active =-1;
            $user->save();
            return response()->json('success');
        }
    }

    public function updateUser(Request $request)
    {
        $id = $request->input('s_id');
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $country = $request->input('country');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $google = $request->input('google');
        $instagram = $request->input('instagram');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $image = $request->input('image');
        $active = $request->input('active');
        $type = $request->input('type');
        $password = bcrypt($request->input('password'));
        $recover = $request->input('password');

        $data = array(
            'name'=>$name,
            'username'=>$username,
            'password'=>$password,
            'recover'=>$recover,
            'email'=>$email,
            'country'=>$country,
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'google'=>$google,
            'instagram'=>$instagram,
            'phone'=>$phone,
            'address'=>$address,
            'image'=>$image,
            'type'=>$type,
            'active'=>$active
            );

        $U = DB::table('users')
            ->where('id','=', $id)
            ->update($data);

        if ($U){
            if (Config::get('app.locale') == 'en'){
                return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
            }else{
                return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
            }
            
        }
        if (Config::get('app.locale') == 'en'){
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }

    }

    public function editProfile(Request $request)
    {
        $id = Auth::guard('admins')->user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->about = $request->about;
        $user->email = $request->email;
        $user->website = $request->website;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->google = $request->google;
        $user->instagram = $request->instagram;

        if ($user->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }

    }
    public function editProfileImage(Request $request)
    {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
        ] ,[
            'image.required' => 'من فضلك قم بتحميل الملف',
            'image.image' => 'من فضلك حمل صورة وليس فيديو',
            'image.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image.max' => 'الحد الاقصى لحجم الملف : 20 MB',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = Auth::guard('admins')->user()->id;
        $user = User::find($id);
        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $user->image = $imageName;
        }

        if ($user->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }

    }

    public function editProfilePass(Request $request)
    {
        $v = validator($request->all() ,[
            'password1' => 'required|min:6',
            'password2' => 'required|min:6',
        ] ,[
            'password1.required' => 'Please Enter Password',
            'password2.required' => 'Please confirm Password',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = Auth::guard('admins')->user()->id;
        $user = User::find($id);
        $p1 = $request->input('password1');
        $p2 = $request->input('password2');

        if ($p1 == $p2) {
            $user->password = bcrypt($request->input('password1'));
            if ($user->save()){
                if (Config::get('app.locale') == 'en'){
                    return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
                }else{
                    return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
                }
            }else{
                if (Config::get('app.locale') == 'en'){
                    return ['status' => false ,'data' => 'Something went wrong , please try again'];
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }
            }
        }else{
            if (Config::get('app.locale') == 'en'){
                return ['status' => false ,'data' => 'Please make sure that passwords are matching'];
            }else{
                return ['status' => false ,'data' => 'من فضلك تأكد من تطابق كلمتى السر'];
            }

        }

    }

}
