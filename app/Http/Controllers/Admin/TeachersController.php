<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use App\Material;
use App\Salary;
use App\Time;
use App\User;
use App\Job;
use App\Part;
use App\Teacher_document;
use Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

class TeachersController extends Controller
{
    public function getIndex() {
        $materials = Material::all();
        $mats = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $teachers = Teacher::all();
        $jobs = Job::all();
        $docs = DB::table('teacher_documents')
                ->join('teachers','teacher_documents.teacher_id','=','teachers.id')
                ->select('teacher_documents.*','teachers.*')
                ->get();
        return view('admin.pages.teacher.index', compact('teachers','docs','jobs','materials','mats'));
        
    }

    public function getSalary() {
        $teachers = Teacher::all();
        return view('admin.pages.teacher.salary', compact('teachers'));
        
    }

    public function salaries($id) {
        $teacher = Teacher::find($id);
        $salaries = Salary::where('teacher_id', $id)->where('status', 1)->get();
        return view('admin.pages.teacher.salaries', compact('salaries','teacher'));
    }

    public function code($id) {
        $teacher = Teacher::find($id);
        return view('admin.pages.teacher.code', compact('teacher'));
    }

    public function insertSalary(Request $request) {
        $v = validator($request->all() ,[
            'teacher' => 'required',
            'year' => 'required',
            'month' => 'required',
            'parts' => 'required',
            'days' => 'required',
            'minus' => 'required',
            'bonus' => 'required',
            'hours' => 'required',
            'salary' => 'required',
        ] ,[
            'teacher.required' => 'من فضلك اختر مدرس',
            'year.required' => 'من فضلك اختر سنة',
            'month.required' => 'من فضلك اختر شهر',
            'parts.required' => 'من فضلك أدخل السلف',
            'days.required' => 'من فضلك أدخل ايام الحضور',
            'minus.required' => 'من فضلك أدخل الخصومات',
            'bonus.required' => 'من فضلك أدخل المبلغ الاضافى',
            'hours.required' => 'من فضلك أدخل ساعات العمل',
            'salary.required' => 'من فضلك أدخل الراتب الأساسى',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $salary = DB::table('salaries')
                ->select('*')
                ->where('month', $request->month)
                ->where('year', $request->year)
                ->where('teacher_id', $request->teacher)
                ->first();

        $status = DB::table('salaries')
                ->select('status')
                ->where('month', $request->month)
                ->where('year', $request->year)
                ->where('teacher_id', $request->teacher)
                ->first();
        if($salary && $status->status == 0){
            if(isset($request->status)){
                $data = array(
                    'status' => 1
                );
                $update = DB::table('salaries')
                        ->where('teacher_id', $request->teacher)
                        ->where('month', $request->month)
                        ->where('year', $request->year)
                        ->update($data);
                if($update){
                    return ['status' => 'succes' ,'data' => 'تم صرف الراتب بنجاح'];            
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }
            }else{
                $data = array(
                    'status' => 0
                );
                $update = DB::table('salaries')
                        ->where('teacher_id', $request->teacher)
                        ->where('month', $request->month)
                        ->where('year', $request->year)
                        ->update($data);
                return ['status' => 'succes' ,'data' => 'لم يتم صرف الراتب بعد']; 
            }
        }else{
            $salaries = new Salary();
            $salaries->teacher_id = $request->teacher;
            $salaries->year = $request->year;
            $salaries->month = $request->month;
            $salaries->parts = $request->parts;
            $salaries->days = $request->days;
            $salaries->minus = $request->minus;
            $salaries->bonus = $request->bonus;
            $salaries->hours = $request->hours;
            $salaries->salary = $request->salary;
            $notes = 'مرتب شهر '.$request->month.'';
            $salaries->notes = $notes;
            $salaries->final = ($request->salary - $request->minus) + $request->bonus;
            if(isset($request->status)){
                $salaries->status = 1;
                if($salaries->save()){
                    return ['status' => 'succes' ,'data' => 'تم صرف الراتب بنجاح'];            
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }
            }else{
                $salaries->status = 0;
                $salaries->save();
                return ['status' => 'succes' ,'data' => 'لم يتم صرف الراتب بعد']; 
            }
        }
    }

    public function insertPart(Request $request) {
        $v = validator($request->all() ,[
            'teacher' => 'required',
            'year' => 'required',
            'month' => 'required',
            'part' => 'required',
        ] ,[
            'teacher.required' => 'من فضلك اختر مدرس',
            'year.required' => 'من فضلك اختر سنة',
            'month.required' => 'من فضلك اختر شهر',
            'part.required' => 'من فضلك أدخل المبلغ',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $salary = DB::table('parts')
                ->select('*')
                ->where('month', $request->month)
                ->where('year', $request->year)
                ->where('teacher_id', $request->teacher)
                ->first();

        $salary_part = DB::table('parts')
                ->where('teacher_id', $request->teacher)
                ->where('month', $request->month)
                ->where('year', $request->year)
                ->sum('part');
        if($salary){
            $teacher = Teacher::find($request->teacher);
            $total = $request->part + $salary_part;
            if($total <= $teacher->salary){
                $data = array(
                    'part' => $total
                );
                $update = DB::table('parts')
                        ->where('teacher_id', $request->teacher)
                        ->where('month', $request->month)
                        ->where('year', $request->year)
                        ->update($data);
                if($update){
                    return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }
            }elseif($total > $teacher->salary){
                return ['status' => false ,'data' => 'حدث خطأ , لقد تجاوزت  الحد الأقصى للمبلغ '];
            }
        }else{
            
            $part = new Part();
            $part->teacher_id = $request->teacher;
            $part->year = $request->year;
            $part->month = $request->month;
            $part->part = $request->part;

            if($part->save()){
                return ['status' => 'succes' ,'data' => 'تم تسجيل البيانات بنجاح'];            
            }else{
                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
            }
        }
    }

    public function getAjaxSalary() {
        $teacher = Input::get('teacher');
        $salary = DB::table('teachers')
                ->select('salary','hours')
                ->where('id', $teacher)
                ->get();
        return Response::json($salary);
    }

    public function getAjaxDays() {
        $teacher = Input::get('teacher');
        $month = Input::get('month');
        $year = Input::get('year');
        $days = DB::table('attend')
                ->select('*')
                ->where('teacher_id', $teacher)
                ->where('month', $month)
                ->where('year', $year)
                ->get();
        return Response::json($days);
    }

    public function getAjaxParts() {
        $teacher = Input::get('teacher');
        $month = Input::get('month');
        $year = Input::get('year');
        $parts = DB::table('parts')
                ->select('part')
                ->where('teacher_id', $teacher)
                ->where('month', $month)
                ->where('year', $year)
                ->get();
        return Response::json($parts);
    }

    public function attendSalary() {
        $teacher = Input::get('teacher');
        $month = Input::get('month');
        $year = Input::get('year');
        $days = DB::table('attend')
                ->select('*')
                ->where('teacher_id', $teacher)
                ->where('month', $month)
                ->where('year', $year)
                ->get();
        return Response::json($days);
    }

    public function timeSalary() {
        $teacher = Input::get('teacher');
        $days = DB::table('times')
                ->select('*')
                ->where('teacher_id', $teacher)
                ->get();
        return Response::json($days);
    }

    public function time($id) {

        $teacher = Teacher::find($id);
        $search = Time::where('teacher_id' , $id);
        $times = DB::table('times')
                ->join('teachers','times.teacher_id','=','teachers.id')
                ->select('times.*','teachers.teacher_name')
                ->where('times.teacher_id' , $id)
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.teacher.time', compact('teacher','times','search'));
        
    }

    public function insertTime(Request $request) {
        
        $time = Time::where('teacher_id' , $request->teacher)->get();

        if($time){
            foreach($time as $t){
                $t->attend = $request->input('attend'.$t->id);
                $t->leave = $request->input('leave'.$t->id);
                $t->day = $request->input('d'.$t->id);
                $t->day_ar = $request->input('dd'.$t->id);
                $cc = $request->input('day'.$t->id);
                if(isset($cc)){
                    $t->status = 1;
                }else{
                    $t->status = 0;
                }
                $t->save();
            }
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }
        
    }

    public function jobs() {

        $jobs = Job::all();

        return view('admin.pages.teacher.job', compact('jobs'));
        
    }

    public function getAddJob() {

        return view('admin.pages.teacher.jobadd');
        
    }

    public function jobEdit($id) {

        $job = Job::find($id);

        return view('admin.pages.teacher.jobedit', compact('job'));
        
    }

    public function addJob(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required'
        ] ,[
            'name.required' => 'من فضلك أدخل اسم الوظيفة',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $job = new Job();
        $job->job_name = $request->name;

        if($job->save()){
            return ['status' => 'succes' ,'data' => 'تم تسجيل البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function postJobEdit(Request $request,$id) {
        
        $job = Job::find($id);

        $job->job_name = $request->name;

        if ($job->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function jobDelete($id) {
        if (isset($id)) {
            $job = Job::find($id);

            $job->delete();

            return redirect()->back();
        }
    }

    public function attend() {
        $now = Carbon::now();
        $materials = Material::all();
        $mats = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $teachers = Teacher::all();
        $jobs = Job::all();
        $docs = DB::table('teacher_documents')
                ->join('teachers','teacher_documents.teacher_id','=','teachers.id')
                ->select('teacher_documents.*','teachers.*')
                ->get();
        return view('admin.pages.teacher.attend', compact('now','teachers','docs','jobs','materials','mats'));
    }

    public function postattend(Request $request) {
        $v = validator($request->all() ,[
            'teacher' => 'required',
            'date' => 'required',
            'time' => 'required',
        ] ,[
            'teacher.required' => 'من فضلك اختر مدرس',
            'date.required' => 'من فضلك أدخل التاريخ',
            'time.required' => 'من فضلك أدخل الوقت',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $search = DB::table('attend')
                ->select('attend.*')
                ->where('date' , $request->date)
                ->where('teacher_id' , $request->teacher)
                ->get();

        if(!$search){

            $data = array(
                'teacher_id'=>$request->teacher,
                'attends'=>$request->time,
                'date'=>$request->date,
                'days'=>$request->day,
                'month'=>$request->month,
                'year'=>$request->year
                );

            $a = DB::table('attend')->insert($data);
            
            if ($a){
                return ['status' => 'succes' ,'data' => 'تم تسجيل الحضور بنجاح'];            
            }else{
                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
            }

        }else{
            return ['status' => false ,'data' => 'حدث خطأ , تم تسجيل الحضور سابقا '];
        }
    }


    public function leave() {
        $now = Carbon::now();
        $materials = Material::all();
        $mats = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $teachers = Teacher::all();
        $jobs = Job::all();
        $docs = DB::table('teacher_documents')
                ->join('teachers','teacher_documents.teacher_id','=','teachers.id')
                ->select('teacher_documents.*','teachers.*')
                ->get();
        return view('admin.pages.teacher.leave', compact('now','teachers','docs','jobs','materials','mats'));
    }

    public function postleave(Request $request) {
        $v = validator($request->all() ,[
            'teacher' => 'required',
            'date' => 'required',
        ] ,[
            'teacher.required' => 'من فضلك اختر مدرس',
            'date.required' => 'من فضلك أدخل الوقت',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $search = DB::table('attend')
                ->select('attend.leaves')
                ->where('date' , $request->date)
                ->where('teacher_id' , $request->teacher)
                ->get();
        
        if($search){
            $data = array(
                'leaves'=>$request->time
                );
            $a = DB::table('attend')->where('date' , $request->date)->where('teacher_id' , $request->teacher)->update($data);
        
            if ($a){
                return ['status' => 'succes' ,'data' => 'تم تسجيل الانصراف بنجاح'];            
            }else{
                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
            }
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , لم يتم تسجيل الحضور '];
        }

    }


    public function getAdd() {
        $materials = Material::all();
        $mats = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $teachers = Teacher::all();
        $jobs = Job::all();
        $docs = DB::table('teacher_documents')
                ->join('teachers','teacher_documents.teacher_id','=','teachers.id')
                ->select('teacher_documents.*','teachers.*')
                ->get();
        return view('admin.pages.teacher.add', compact('teachers','docs','jobs','materials','mats'));
    }

    public function getFile() {
        $materials = Material::all();
        $mats = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->get();
        $teachers = Teacher::all();
        $jobs = Job::all();
        $docs = DB::table('teacher_documents')
                ->join('teachers','teacher_documents.teacher_id','=','teachers.id')
                ->select('teacher_documents.*','teachers.teacher_name')
                ->get();
        return view('admin.pages.teacher.files', compact('teachers','docs','jobs','materials','mats'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required',
            'first_day' => 'required',
            // 'qualifications' => 'required',
            'salary' => 'required',
            'job' => 'required',
        ] ,[
            'image.required' => 'من فضلك قم بتحميل الملف',
            'image.image' => 'من فضلك حمل صورة وليس فيديو',
            'image.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image.max' => 'الحد الاقصى لحجم الملف : 20 MB',
            'name.required' => 'من فضلك أدخل اسم الحلقة',
            'username.required' => 'من فضلك أدخل اسم المستخدم',
            'password.required' => 'من فضلك أدخل كلمة السر',
            'birth.required' => 'من فضلك أدخل تاريخ الميلاد',
            'address.required' => 'من فضلك أدخل العنوان',
            'email.required' => 'من فضلك ادخل البريد الالكترونى',
            'email.unique' => 'هذا البريد الالكترونى تم استخدامه مسبقا',
            'email.email' => 'من فضلك تأكد من صحة البريد الالكترونى',
            'email.required' => 'من فضلك أدخل البريد الالكترونى',
            'phone.required' => 'من فضلك أدخل رقم الهاتف الالكترونى',
            'first_day.required' => 'من فضلك أدخل يوم التوظيف',
            // 'qualifications.required' => 'من فضلك أدخل المؤهل الدراسى',
            'salary.required' => 'من فضلك أدخل الراتب الشهرى',
            'job.required' => 'من فضلك اختر وظيفة',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $teacher = new Teacher();
        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->recover = $request->password;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->mobile = $request->phone;
        $user->type = $request->job;

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $teacher->image = $imageName;
            $user->image = $imageName;
        }
        
        $teacher->teacher_name = $request->name;
        $teacher->username = $request->username;
        $teacher->password = bcrypt($request->password);
        $teacher->recover = $request->password;
        $teacher->birth = $request->birth;
        $teacher->address = $request->address;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->first_day = $request->first_day;
        $teacher->hours = $request->hours;
        $teacher->salary = $request->salary;
        $teacher->job = $request->job;
        
        if ($teacher->save() && $user->save()){
            $count = Material::count();
            for($i=1; $i<=$count; $i++){
                $item = $request->input('m'.$i);
                if(isset($item)){
                    $teacher->details()->create([
                        'material_id' => $request->input('m'.$i),
                        'teacher_id' => $teacher->id 
                    ]);
                }
            }
            for($i=1; $i<=7; $i++){
                $newTime = new Time();
                $newTime->teacher_id = $teacher->id;
                $newTime->attend = "";
                $newTime->leave = "";
                $newTime->day = $request->input('d'.$i);
                $newTime->day_ar = $request->input('dd'.$i);
                $newTime->status = 0;
                $newTime->save();
            }
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $jobs = Job::all();
            $teachers =  DB::table('teachers')
                    ->join('jobs','teachers.job','=','jobs.id')
                    ->select('jobs.job_name','teachers.*')
                    ->where('teachers.id','=',$id)
                    ->get();
            $docs = DB::table('teacher_documents')
            ->select('teacher_documents.*')
            ->where('teacher_id','=', $id)
            ->get();
            $materials = Material::all();
            $mats = DB::table('teacher_materials')
                    ->join('teachers','teacher_materials.teacher_id','=','teachers.id')
                    ->join('materials','teacher_materials.material_id','=','materials.id')
                    ->select('teacher_materials.*','teachers.teacher_name','materials.material_name')
                    ->where('teacher_materials.teacher_id','=',$id)
                    ->get();
            return view('admin.pages.teacher.edit', compact('materials','mats','teacher','teachers','docs','jobs'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $teacher = Teacher::find($id);

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $teacher->image = $imageName;
        }
        
        $teacher->teacher_name = $request->name;
        $teacher->birth = $request->birth;
        $teacher->address = $request->address;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->first_day = $request->first_day;
        $teacher->hours = $request->hours;
        $teacher->salary = $request->salary;
        $teacher->job = $request->job;
        
        if ($teacher->save() && $user->save()){
            $count = Material::count();
            for($i=1; $i<=$count; $i++){
                $item = $request->input('m'.$i);
                if(isset($item)){
                    $teacher->details()->create([
                        'material_id' => $request->input('m'.$i),
                        'teacher_id' => $id 
                    ]);
                }
            }
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $teacher = Teacher::find($id);
            $teacher->delete();
            DB::table('teacher_materials')->where('teacher_id','=', $id)->delete();
            DB::table('teacher_documents')->where('teacher_id','=', $id)->delete();
            $search = Time::where('teacher_id' , $id)->delete();

            return redirect()->back();
        }
    }

    public function addDoc(Request $request) {

        $v = validator($request->all() ,[
            'image2' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:20000',
            'teacher_id' => 'required',
        ] ,[
            'image2.required' => 'من فضلك قم بتحميل الملف',
            'image2.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image2.max' => 'الحد الاقصى لحجم الملف : 20 MB',
            'teacher_id.required' => 'من فضلك اختر موظف',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $doc = new Teacher_document();
        $doc->teacher_id = $request->teacher_id;

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
            $doc = Teacher_document::find($id);

            $doc->delete();

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
