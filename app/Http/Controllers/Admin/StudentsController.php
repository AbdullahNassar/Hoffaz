<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Guardian;
use App\Center;
use App\Course;
use App\Level;
use App\Material;
use App\Payment;
use Carbon\Carbon;
use App\Student_document;
use Response;
use Illuminate\Support\Facades\Input;
use Config;
use Session;
use Auth;
use Hash;
use DB;


class StudentsController extends Controller
{
    public function getIndex() {
        $students = Student::all();
        $guardians = Guardian::all();
        $centers = Center::all();
        $courses = Course::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
                ->join('students','student_documents.student_id','=','students.id')
                ->select('student_documents.*','students.student_name')
                ->get();
        $materials = Material::all();
        $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->get();
        $now = Carbon::now();
        return view('admin.pages.student.index', compact('now','courses','students','docs','guardians','centers','levels','materials','mats'));
    }

    public function count($id) {
        $student = Student::find($id);
        $counts = DB::table('counts')
                    ->select('counts.*')
                    ->where('student_id', $id)
                    ->orderBy('id', 'asc')
                    ->get();
        return view('admin.pages.student.count', compact('counts','student'));
    }

    public function files() {
        $students = Student::all();
        $guardians = Guardian::all();
        $centers = Center::all();
        $courses = Course::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
                ->join('students','student_documents.student_id','=','students.id')
                ->select('student_documents.*','students.student_name')
                ->get();
        $materials = Material::all();
        $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->get();
        $now = Carbon::now();
        return view('admin.pages.student.files', compact('now','courses','students','docs','guardians','centers','levels','materials','mats'));
    }

    public function payment() {
        $students = Student::all();
        $guardians = Guardian::all();
        $centers = Center::all();
        $courses = Course::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
                ->join('students','student_documents.student_id','=','students.id')
                ->select('student_documents.*','students.student_name')
                ->get();
        $materials = Material::all();
        $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->get();
        $now = Carbon::now();
        return view('admin.pages.student.pay', compact('now','courses','students','docs','guardians','centers','levels','materials','mats'));
    }

    public function getAbsent() {
        $students = Student::all();
        $guardians = Guardian::all();
        $centers = Center::all();
        $courses = Course::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
                ->join('students','student_documents.student_id','=','students.id')
                ->select('student_documents.*','students.student_name')
                ->get();
        $materials = Material::all();
        $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->get();
        $now = Carbon::now();
        return view('admin.pages.student.absent', compact('now','courses','students','docs','guardians','centers','levels','materials','mats'));
    }

    public function attend() {
        $students = Student::all();
        $guardians = Guardian::all();
        $centers = Center::all();
        $courses = Course::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
                ->join('students','student_documents.student_id','=','students.id')
                ->select('student_documents.*','students.student_name')
                ->get();
        $materials = Material::all();
        $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->get();
        $now = Carbon::now();
        return view('admin.pages.student.attend', compact('now','courses','students','docs','guardians','centers','levels','materials','mats'));
    }

    public function report() {
        $students = Student::all();
        $guardians = Guardian::all();
        $centers = Center::all();
        $courses = Course::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
                ->join('students','student_documents.student_id','=','students.id')
                ->select('student_documents.*','students.student_name')
                ->get();
        $materials = Material::all();
        $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->get();
        $now = Carbon::now();
        return view('admin.pages.student.report', compact('now','courses','students','docs','guardians','centers','levels','materials','mats'));
    }

    public function getAdd() {
        $students = Student::all();
        $guardians = Guardian::all();
        $centers = Center::all();
        $courses = Course::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
            ->join('students','student_documents.student_id','=','students.id')
            ->select('student_documents.*','students.student_name')
            ->get();
        $materials = Material::all();
        $mats = DB::table('student_materials')
            ->join('students','student_materials.student_id','=','students.id')
            ->join('materials','student_materials.material_id','=','materials.id')
            ->select('student_materials.*','students.student_name','materials.material_name')
            ->get();
        $now = Carbon::now();
        return view('admin.pages.student.add', compact('now','courses','students','docs','guardians','centers','levels','materials','mats'));
    }


    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
            'name' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'first_day' => 'required',
            'national_id' => 'required',
            'level_id' => 'required',
            'guardian_id' => 'required',
            'nationality' => 'required',
            'center_id' => 'required',
        ] ,[
            'image.required' => 'من فضلك قم بتحميل الملف',
            'image.image' => 'من فضلك حمل صورة وليس فيديو',
            'image.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image.max' => 'الحد الاقصى لحجم الملف : 20 MB',
            'name.required' => 'من فضلك أدخل اسم الطالب',
            'birth.required' => 'من فضلك أدخل تاريخ الميلاد',
            'address.required' => 'من فضلك أدخل العنوان',
            'email.required' => 'من فضلك أدخل البريد الالكترونى',
            'gender.required' => 'من فضلك أدخل الجنس',
            'first_day.required' => 'من فضلك أدخل يوم الالتحاق',
            'national_id.required' => 'من فضلك أدخل الرقم القومى',
            'level_id.required' => 'من فضلك اختر احدى المراحل',
            'center_id.required' => 'من فضلك اختر المركز',
            'guardian_id.required' => 'من فضلك اختر ولى الأمر',
            'nationality.required' => 'من فضلك أدخل الجنسية',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $student = new Student();

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $student->image = $imageName;
        }

        $student->student_name = $request->name;
        $student->birth = $request->birth;        
        $student->age = Carbon::parse($request->birth)->age;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->first_day = $request->first_day;
        $student->gender = $request->gender;
        $student->national_id = $request->national_id;
        $student->level_id = $request->level_id;
        $student->guardian_id = $request->guardian_id;
        $student->center_id = $request->center_id;
        $student->nationality = $request->nationality;
        if(isset($request->transportation)){
            $student->transportation = 1;
        }
        
        if ($student->save()){
            $count = Material::count();
            for($i=1; $i<=$count; $i++){
                $item = $request->input('m'.$i);
                if(isset($item)){
                    $student->details()->create([
                        'material_id' => $request->input('m'.$i),
                        'student_id' => $student->id 
                    ]);
                }
            }

            $count2 = Course::count();
            for($i=1; $i<=$count2; $i++){
                $item2 = $request->input('c'.$i);
                if(isset($item2)){
                    $student->courses()->create([
                        'course_id' => $request->input('c'.$i),
                        'student_id' => $student->id 
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
            $students = Student::all();
            $student = Student::find($id);
            $guardians = Guardian::all();
            $centers = Center::all();
            $courses = Course::all();
            $cours = DB::table('student_courses')
                    ->join('students','student_courses.student_id','=','students.id')
                    ->join('courses','student_courses.course_id','=','courses.id')
                    ->select('student_courses.*','students.student_name','courses.course_name')
                    ->where('student_courses.student_id','=',$id)
                    ->get();
            $levels = Level::all();
            $docs = DB::table('student_documents')
            ->select('student_documents.*')
            ->where('student_id','=', $id)
            ->get();
            $materials = Material::all();
            $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->where('student_materials.student_id','=',$id)
                    ->get();
            return view('admin.pages.student.edit', compact('cours','courses','materials','mats','student','students','docs','guardians','centers','levels'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $student = Student::find($id);
        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $student->image = $imageName;
        }
        $student->student_name = $request->name;
        $student->birth = $request->birth;
        $student->age = Carbon::parse($request->birth)->age;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->first_day = $request->first_day;
        $student->gender = $request->gender;
        $student->national_id = $request->national_id;
        $student->level_id = $request->level_id;
        $student->guardian_id = $request->guardian_id;
        $student->center_id = $request->center_id;
        $student->nationality = $request->nationality;
        if(isset($request->transportation)){
            $student->transportation = 1;
        }

        if ($student->save()){
            $count = Material::count();
            for($i=1; $i<=$count; $i++){
                $item = $request->input('m'.$i);
                if(isset($item)){
                    $student->details()->create([
                        'material_id' => $request->input('m'.$i),
                        'student_id' => $id 
                    ]);
                }
            }

            $count2 = Course::count();
            for($i=1; $i<=$count2; $i++){
                $item2 = $request->input('c'.$i);
                if(isset($item2)){
                    $student->courses()->create([
                        'course_id' => $request->input('c'.$i),
                        'student_id' => $id 
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
            $student = Student::find($id);
            $student->delete();
            DB::table('student_materials')->where('student_id','=', $id)->delete();
            DB::table('student_documents')->where('student_id','=', $id)->delete();
            DB::table('student_courses')->where('student_id','=', $id)->delete();
            DB::table('student_grades')->where('student_id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function addDoc(Request $request) {

        $v = validator($request->all() ,[
            'image2' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:20000',
            'student_id' => 'required',
        ] ,[
            'image2.required' => 'من فضلك قم بتحميل الملف',
            'image2.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image2.max' => 'الحد الاقصى لحجم الملف : 20 MB',
            'student_id.required' => 'من فضلك اختر موظف',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $doc = new Student_document();
        $doc->student_id = $request->student_id;

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
            $doc = Student_document::find($id);

            $doc->delete();

            return redirect()->back();
        }
    }

    public function pay(Request $request) {
        $v = validator($request->all() ,[
            'student_id' => 'required',
            'material_id' => 'required',
            'amount' => 'required',
            'month' => 'required',
        ] ,[
            'student_id.required' => 'من فضلك اختر احد الطلاب',
            'material_id.required' => 'من فضلك اختر احدى المواد',
            'amount.required' => 'من فضلك أدخل المبلغ',
            'month.required' => 'من فضلك اختر الشهر',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        
        $material = Material::find($request->material_id);
        $price = $material->price;
        $search = DB::table('payments')
                    ->select('payments.*')
                    ->where('student_id','=', $request->student_id)
                    ->where('month','=', $request->month)
                    ->get();
        if($search){
            foreach ($search as $s) {
                $pay = Payment::find($s->id);
                if($pay->payed == 0){
                    $index = $pay->remain + $request->amount;
                    if($index == $price){
                        $pay->remain = 0;
                        $pay->payed = 1;
                        $pay->amount = $index;
                        if ($pay->save()){
                            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
                        }else{
                            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                        }
                    }elseif($index > $price){
                        $pay->payed = 1;
                        $pay2 = new Payment();
                        $pay2->student_id = $request->student_id;
                        $pay2->material_id = $request->material_id;
                        $pay2->payed = 0;
                        $pay2->month = $request->month + 1;
                        if($index > $price){
                            $pay2->amount = $price;
                            $pay2->remain = $index - $price;
                            $pay->remain = 0;
                        }elseif($index <= $price){
                            $pay2->amount = $index;
                            $pay2->remain = 0;
                            $pay->remain = 0;
                        }
                        if ($pay->save() && $pay2->save()){
                            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
                        }else{
                            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                        }
                    }else{
                        return ['status' => false ,'data' => 'حدث خطأ , المبلغ أقل من قيمة الاشتراك '];
                    }
                }elseif($pay->payed == 1){
                    return ['status' => false ,'data' => 'حدث خطأ , لقد تم دفع هذا الشهر '];
                }
            }
        }
        if($request->amount == $price){
            $pay = new Payment();
            $pay->student_id = $request->student_id;
            $pay->material_id = $request->material_id;
            $pay->amount = $request->amount;
            $pay->month = $request->month;
            $pay->remain = 0;
            if ($pay->save()){
                return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
            }else{
                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
            }

        }elseif($request->amount > $price){
            $pay = new Payment();
            $pay->student_id = $request->student_id;
            $pay->material_id = $request->material_id;
            $pay->amount = $price;
            $pay->month = $request->month;
            $pay->remain = $request->amount - $price;
            $pay->payed = 1;
            $pay2 = new Payment();
            $pay2->student_id = $request->student_id;
            $pay2->material_id = $request->material_id;
            $pay2->payed = 0;
            $pay2->month = $request->month + 1;
            if($pay->remain > $price){
                $pay2->amount = $price;
                $pay2->remain = $pay->remain - $price;
                $pay->remain = 0;
            }elseif($pay->remain <= $price){
                $pay2->amount = $pay->remain;
                $pay2->remain = 0;
                $pay->remain = 0;
            }
            if ($pay->save() && $pay2->save()){
                return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
            }else{
                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
            }
            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , المبلغ أقل من قيمة الاشتراك '];
        }

    }

    public function mdelete($id) {
        if (isset($id)) {
            DB::table('student_materials')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function cdelete($id) {
        if (isset($id)) {
            DB::table('student_courses')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

    //-------------------------------------------------------------------------------------
    public function getGroups() {

        $group_id = Input::get('group_id');

        $courses = Course::where('center_id','=',$group_id)->get();

        return Response::json($courses);
    }

    public function getStud() {

        $student_id = Input::get('student_id');

        $students = DB::table('students')
                ->join('student_courses','student_courses.student_id','=','students.id')
                ->select('student_courses.*','students.student_name')
                ->where('student_courses.course_id','=',$student_id)
                ->get();
        

        return Response::json($students);
    }

    public function dates() {

        $dfrom = Input::get('dfrom');
        $dto = Input::get('dto');
        $center = Input::get('center');
        $course = Input::get('course');

        $students = DB::table('absents')
                ->select('absents.date')
                ->whereBetween('absents.date', [$dfrom, $dto])
                ->where('absents.course_id','=',$course)
                ->where('absents.center_id','=',$center)
                ->groupBy('absents.date')
                ->get();
        

        return Response::json($students);
    }

    public function studs() {

        $dfrom = Input::get('dfrom');
        $dto = Input::get('dto');
        $center = Input::get('center');
        $course = Input::get('course');

        $students = DB::table('absents')
                ->join('students','absents.student_id','=','students.id')
                ->select('students.student_name','absents.student_id')
                ->whereBetween('absents.date', [$dfrom, $dto])
                ->where('absents.course_id','=',$course)
                ->where('absents.center_id','=',$center)
                ->groupBy('absents.student_id')
                ->get();
        

        return Response::json($students);
    }

    public function dfrom() {

        $dfrom = Input::get('dfrom');
        $dto = Input::get('dto');
        $center = Input::get('center');
        $course = Input::get('course');
        $s_id = Input::get('s_id');

        $status = DB::table('absents')
                ->select('absents.status')
                ->whereBetween('absents.date', [$dfrom, $dto])
                ->where('absents.course_id','=',$course)
                ->where('absents.center_id','=',$center)
                ->where('absents.student_id','=',$s_id)
                ->get();
        

        return Response::json($status);
    }

    public function dto() {

        $dfrom = Input::get('dfrom');
        $dto = Input::get('dto');
        $center = Input::get('center');
        $course = Input::get('course');
        $s_id = Input::get('s_id');

        $students = DB::table('absents')
                ->select('absents.status')
                ->whereBetween('absents.date', [$dfrom, $dto])
                ->where('absents.course_id','=',$course)
                ->where('absents.center_id','=',$center)
                ->where('absents.student_id','=',$s_id)
                ->get();
        

        return Response::json($students);
    }

    public function absent(Request $request) {
        $v = validator($request->all() ,[
            'center_id' => 'required',
            'course_id' => 'required',
            'date' => 'required',
        ] ,[
            'course_id.required' => 'من فضلك اختر احدى الحلقات',
            'center_id.required' => 'من فضلك اختر المركز',
            'date.required' => 'من فضلك أدخل التاريخ',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        
        $students = DB::table('students')
                ->join('student_courses','student_courses.student_id','=','students.id')
                ->select('student_courses.*','students.student_name')
                ->where('student_courses.course_id','=',$request->course_id)
                ->get();
        foreach($students as $s){
            $absent = new Absent();

            $absent->center_id = $request->center_id;
            $absent->course_id = $request->course_id;
            $absent->date = $request->date;
            $item = $request->input('ab'.$s->student_id);
            $student = $request->input('st'.$s->student_id);
            if(isset($item)){
                $absent->student_id = $student;
                $absent->status = 1;
            }else{
                $absent->student_id = $student;
                $absent->status = 0;
            }
            $absent->save();
        }
        
        if ($absent->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getCourse() {

        $course_id = Input::get('course_id');

        $courses = Course::where('center_id','=',$course_id)->get();

        return Response::json($courses);
    }

    public function getStudent() {

        $student_id = Input::get('student_id');

        $students = Student::where('center_id','=',$student_id)->get();

        return Response::json($students);
    }

    public function getMaterial() {

		$material_id = Input::get('material_id');

		$maters = DB::table('student_materials')
				->join('students','student_materials.student_id','=','students.id')
				->join('materials','student_materials.material_id','=','materials.id')
				->select('student_materials.*','students.student_name','materials.material_name')
				->where('student_materials.student_id','=',$material_id)
				->get();
		

        //$maters = Material::where('student_id','=',$material_id)->get();

        return Response::json($maters);
    }

    public function getPercent() {

        $percent_id = Input::get('percent_id');

		$percents = Percent::where('material_id','=',$percent_id)->get();
		
        return Response::json($percents);
    }
    
    public function grades(Request $request) {
        $v = validator($request->all() ,[
            'center_id' => 'required',
            'student_id' => 'required',
            'material_id' => 'required',
            'date' => 'required',
        ] ,[
            'student_id.required' => 'من فضلك اختر احد الطلاب',
            'center_id.required' => 'من فضلك اختر المركز',
            'material_id.required' => 'من فضلك اختر مادة',
            'date.required' => 'من فضلك أدخل تاريخ التقييم',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $grade = new StudentGrade();

        $grade->center_id = $request->center_id;
        $grade->student_id = $request->student_id;
        $grade->material_id = $request->material_id;
        $grade->date = $request->date;
        $count = Percent::where('material_id','=',$request->material_id)->get();
        $total = 0;
        foreach($count as $cc){
            $item = $request->input('p'.$cc->id);
            if($item > $cc->grade){
                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أدخل درجة أقل'];
            }
            if(isset($item)){
                $total = $total + $item;
            }
        }
        $grade->total = $total;
        $percents = Material::where('id','=',$request->material_id)->get();
        foreach($percents as $pp){
            if($total >= $pp->p1){
                $grade->percent = "امتياز";
            }elseif($total >= $pp->p2){
                $grade->percent = "جيد جدا";
            }elseif($total >= $pp->p3){
                $grade->percent = "جيد";
            }elseif($total >= $pp->p4){
                $grade->percent = "مقبول";
            }elseif($total >= $pp->p5){
                $grade->percent = "ضعيف";
            }elseif($total <= $pp->p5){
                $grade->percent = "راسب";
            }
        }
        
        if ($grade->save()){
            foreach($count as $c){
                $item = $request->input('p'.$c->id);
                if(isset($item)){
                    $grade->details()->create([
                        'grade' => $request->input('p'.$c->id),
                        'grade_id' => $grade->id,
                        'material_id' => $request->material_id,
                        'percent_id' => $c->id
                    ]);
                }
            }
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }
	
//----------------------------------------------------------------------------------------------------

    public function getCourses() {

        $course_id = Input::get('courses_id');

        $courses = Course::where('center_id','=',$course_id)->get();

        return Response::json($courses);
    }

    public function getStudents() {

        $student_id = Input::get('students_id');

        $students = DB::table('student_courses')
                ->join('students','student_courses.student_id','=','students.id')
                ->join('courses','student_courses.course_id','=','courses.id')
                ->select('students.*')
                ->where('student_courses.course_id','=',$student_id)
                ->get();

        return Response::json($students);
    }

    public function getMaterials() {

        $material_id = Input::get('materials_id');

        $maters = DB::table('student_materials')
                ->join('students','student_materials.student_id','=','students.id')
                ->join('materials','student_materials.material_id','=','materials.id')
                ->select('materials.*','student_materials.material_id')
                ->where('student_materials.student_id','=',$material_id)
                ->get();
        

        //$maters = Material::where('student_id','=',$material_id)->get();

        return Response::json($maters);
    }

    public function getSMaterial() {

        $material_id = Input::get('materials_id');

        $materis = DB::table('student_grades')
                ->join('students','student_grades.student_id','=','students.id')
                ->join('materials','student_grades.material_id','=','materials.id')
                ->select('materials.material_name','student_grades.date','student_grades.total','student_grades.id','student_grades.percent')
                ->where('student_grades.student_id','=',$material_id)
                ->get();
        

        //$maters = Material::where('student_id','=',$material_id)->get();

        return Response::json($materis);
    }

    public function getSPercent() {

        $p_id = Input::get('p_id');

        $materis = DB::table('percents')
                ->join('student_percents','student_percents.percent_id','=','percents.id')
                ->select('percents.percent_name','student_percents.id','student_percents.grade')
                ->where('student_percents.grade_id','=',$p_id)
                ->get();
        

        //$maters = Material::where('student_id','=',$material_id)->get();

        return Response::json($materis);
    }

    public function getPercents() {

        $percent_id = Input::get('percents_id');
        $student_id = Input::get('student_id');

        $percents = DB::table('student_grades')
                ->join('students','student_grades.student_id','=','students.id')
                ->join('materials','student_grades.material_id','=','materials.id')
                ->select('materials.material_name','student_grades.date','student_grades.total','student_grades.id','student_grades.percent')
                ->where('student_grades.material_id','=',$percent_id)
                ->where('student_grades.student_id','=',$student_id)
                ->get();
        
        return Response::json($percents);
    }

    public function getFrom() {

        $from = Input::get('from');
        $now = Carbon::now();
        $percents = DB::table('student_grades')
                    ->join('students','student_grades.student_id','=','students.id')
                    ->join('materials','student_grades.material_id','=','materials.id')
                    ->select('materials.material_name','student_grades.date','student_grades.total','student_grades.id','student_grades.percent')
                    ->whereBetween('student_grades.date', [$from, $now])
                    ->get();
        return Response::json($percents);
    }

    public function getTo() {

        $from = Input::get('from');
        $to = Input::get('to');
        $percents = DB::table('student_grades')
                    ->join('students','student_grades.student_id','=','students.id')
                    ->join('materials','student_grades.material_id','=','materials.id')
                    ->select('materials.material_name','student_grades.date','student_grades.total','student_grades.id','student_grades.percent')
                    ->whereBetween('student_grades.date', [$from, $to])
                    ->get();
        return Response::json($percents);
    }

}
