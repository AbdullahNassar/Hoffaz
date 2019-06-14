<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Org;
use App\Guardian;
use App\Member;
use App\Center;
use App\Course;
use App\Absent;
use App\Level;
use App\User;
use App\Material;
use App\Percent;
use App\StudentGrade;
use App\StudentMaterial;
use App\Payment;
use App\Paym;
use Carbon\Carbon;
use App\Student_document;
use Response;
use Illuminate\Support\Facades\Input;
use Config;
use Session;
use Auth;
use Hash;
use DB;

class HomeController extends Controller
{
    public function getIndex() {
		$id = 1;
    	$org = Org::find($id);
        $students = Student::where('guardian_id','=', Auth::guard('members')->user()->id)->get();
        $guardians = Guardian::all();
        $centers = Center::all();
        $levels = Level::all();
        $docs = DB::table('student_documents')
                ->join('students','student_documents.student_id','=','students.id')
                ->select('student_documents.*','students.student_name')
                ->get();
        $materials = Material::all();
        $now = Carbon::now();
        $mats = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('student_materials.*','students.student_name','materials.material_name')
                    ->get();
        return view('site.pages.home', compact('now','org','students','docs','guardians','centers','levels','materials','mats'));
    }

    public function profile() {
        $students = Student::where('guardian_id','=', Auth::guard('members')->user()->id)->get();
        return view('site.pages.profile', compact('students'));
    }

    public function editProfile(Request $request) {
        $id = Auth::guard('members')->user()->id;
        $guardian = Guardian::find($id);
        $guardian->guardian_name = $request->name;
        $guardian->password = bcrypt($request->password);
        $guardian->recover = $request->password;
        $guardian->address = $request->address;
        $guardian->email = $request->email;
        $guardian->phone = $request->phone;
        $guardian->whatsapp = $request->whatsapp;
        $guardian->national_id = $request->national_id;
        $guardian->nationality = $request->nationality;
        $guardian->job = $request->job;

        $member = Member::find($id);
        $member->guardian_name = $request->name;
        $member->password = bcrypt($request->password);
        $member->recover = $request->password;
        $member->address = $request->address;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->whatsapp = $request->whatsapp;
        $member->national_id = $request->national_id;
        $member->nationality = $request->nationality;
        $member->job = $request->job;

        if ($guardian->save() && $member->save()){
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
        $id = Auth::guard('members')->user()->id;
        $member = Member::find($id);
        $guardian = Guardian::find($id);
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

        if ($guardian->save() && $member->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }

    }

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

        $students = DB::table('absents')
                ->join('students','absents.student_id','=','students.id')
                ->select('absents.date')
                ->whereBetween('absents.date', [$dfrom, $dto])
                ->where('students.guardian_id','=', Auth::guard('members')->user()->id)
                ->groupBy('absents.date')
                ->get();
        

        return Response::json($students);
    }

    public function studs() {

        $dfrom = Input::get('dfrom');
        $dto = Input::get('dto');

        $students = DB::table('absents')
                ->join('students','absents.student_id','=','students.id')
                ->select('students.student_name','absents.student_id')
                ->where('students.guardian_id','=', Auth::guard('members')->user()->id)
                ->whereBetween('absents.date', [$dfrom, $dto])
                
                ->groupBy('absents.student_id')
                ->get();
        

        return Response::json($students);
    }

    public function dfrom() {

        $dfrom = Input::get('dfrom');
        $dto = Input::get('dto');
        $s_id = Input::get('s_id');

        $status = DB::table('absents')
                ->select('absents.status')
                ->whereBetween('absents.date', [$dfrom, $dto])
                ->where('absents.student_id','=',$s_id)
                ->get();
        

        return Response::json($status);
    }

    public function dto() {

        $dfrom = Input::get('dfrom');
        $dto = Input::get('dto');
        $s_id = Input::get('s_id');

        $students = DB::table('absents')
                ->select('absents.status')
                ->whereBetween('absents.date', [$dfrom, $dto])
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

        $stud = DB::table('absents')
				->select('absents.*')
                ->where('student_id','=',$request->student_id)
                ->where('date','=',$request->date)
                ->where('center_id','=',$request->center_id)
                ->where('course_id','=',$request->course_id)
				->get();
        if ($stud){
            return ['status' => false ,'data' => 'حدث خطأ , لقد قمت بتسجيل الحضور سابقا'];
        }else{
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
                if ($absent->save()){
                    return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }
            }
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
        $stud = DB::table('student_grades')
				->join('student_percents','student_percents.grade_id','=','student_grades.id')
				->select('student_grades.*','student_percents.*')
                ->where('student_grades.student_id','=',$request->student_id)
                ->where('student_grades.date','=',$request->date)
                ->where('student_grades.material_id','=',$request->material_id)
				->get();
        if ($stud){
            return ['status' => false ,'data' => 'حدث خطأ , لقد قمت بتسجيل التقييم سابقا'];
        }else{
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
    }
	
	public function postEdit(Request $request) {
    	
        $id = 1;
        $org = Org::find($id);

        $org->name = $request->name;
        $org->address = $request->address;
        $org->business_registration = $request->business_registration;
        $org->tax_card = $request->tax_card;
        $org->phone = $request->phone;
        $org->fax = $request->fax;
        $org->email = $request->email;
        $org->website = $request->website;

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $org->logo = $imageName;
        }
        

        if ($org->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
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

//--------------------------------------------------------------------------------------------------------
    public function lock() {
        Session::put('locked', true);
        return view('site.pages.lock');
    }

    public function back(Request $r) {
        // 1- Validator::make()
        // 2- check if fails
        // 3- fails redirect or success not redirect

        $return = [
            'status' => 'success',
            'message' => 'Login Success!',
        ];

        // grapping admin credentials
        $password = $r->input('password');
        // Searching for the admin matches the passed email or adminname
        $admin = Member::where('national_id', Auth::guard('members')->user()->national_id)->first();
    //($admin && Hash::check($password, $admin->password))
        if ($admin && Hash::check($password, $admin->password)) {
            // login the admin
            Session::forget('locked');
            Auth::guard('members')->login($admin, $r->has('remember'));
        } else {
            $return = [
                'response' => 'error',
                'message' => 'Login Failed!'
            ];
        }
        return response()->json($return);
    }

//------------------------------------------------------------------------------------------------------------
    public function getPayCourse() {

        $course_id = Input::get('course_id');

        $courses = Course::where('center_id','=',$course_id)->get();

        return Response::json($courses);
    }

    public function getPayStudent() {

        $student_id = Input::get('student_id');

        $students = DB::table('student_courses')
                ->join('students','student_courses.student_id','=','students.id')
                ->join('courses','student_courses.course_id','=','courses.id')
                ->select('students.*')
                ->where('student_courses.course_id','=',$student_id)
                ->get();

        return Response::json($students);
    }

    public function getMaterialPrice() {

        $student_id = Input::get('student_id');

        $price = DB::table('student_materials')
                    ->join('students','student_materials.student_id','=','students.id')
                    ->join('materials','student_materials.material_id','=','materials.id')
                    ->select('materials.price')
                    ->where('student_materials.student_id','=',$student_id)
                    ->get();
        
        return Response::json($price);
    }

    public function date() {

        $student_id = Input::get('student_id');

        $month = DB::table('payms')->where('student_id','=', $student_id)->max('month');

        $year = DB::table('payms')->where('student_id','=', $student_id)->max('year');

        $search = DB::table('payms')
                    ->select('payms.*')
                    ->where('student_id','=', $student_id)
                    ->where('month','=', $month)
                    ->where('year','=', $year)
                    ->get();
        
        return Response::json($search);
    }

    public function process() {

        $student_id = Input::get('student_id');
        $year = Input::get('year');

        $process = DB::table('pay_details')
                    ->select('date','amount')
                    ->whereYear('date', $year)
                    ->where('student_id','=', $student_id)
                    ->get();
        
        return Response::json($process);
    }

    public function month() {

        $student_id = Input::get('student_id');
        $month = Input::get('month');

        $process = DB::table('pay_details')
                    ->select('date','amount')
                    ->whereMonth('date', $month)
                    ->where('student_id','=', $student_id)
                    ->get();
        
        return Response::json($process);
    }

    public function payms(Request $request) {
        $v = validator($request->all() ,[
            'student_id' => 'required',
            'amount' => 'required',
            'month' => 'required',
            'year' => 'required',
        ] ,[
            'student_id.required' => 'من فضلك اختر احد الطلاب',
            'amount.required' => 'من فضلك أدخل المبلغ',
            'month.required' => 'من فضلك أدخل الشهر',
            'year.required' => 'من فضلك أدخل السنة',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        
        $material = DB::table('student_materials')
                ->join('students','student_materials.student_id','=','students.id')
                ->join('materials','student_materials.material_id','=','materials.id')
                ->where('student_materials.student_id','=',$request->student_id)
                ->sum('materials.price');
        $price = $material;
        $double = $price * 2;
        $search = DB::table('payms')
                    ->select('payms.*')
                    ->where('student_id','=', $request->student_id)
                    ->where('month','=', $request->month)
                    ->where('year','=', $request->year)
                    ->get();
        $absen = DB::table('absents')
                    ->select('absents.*')
                    ->where('student_id','=',$request->student_id)
                    ->whereYear('date', $request->year)
                    ->whereMonth('date', $request->month)
                    ->count();
        if($absen > 0){
            if($search){
                foreach ($search as $s) {
                    $pay = Paym::find($s->id);
                    if($pay->payed == 0){
                        $index2 = $pay->amount + $request->amount;
                        if($index2 == $price){
                            $pay->remain = 0;
                            $pay->payed = 1;
                            $pay->amount = $price;
                            if ($pay->save()){
                            //----------------------------------------------------------------------------------------------------------------
                                $now = Carbon::now();
                                $time  = strtotime($now);
                                $day   = date('d',$time);
                                $month = date('m',$time);
                                $news = date('MM',$time);
                                $new = $request->month;
                                $year  = $request->year;
                                $absents = DB::table('absents')
                                    ->select('absents.*')
                                    ->where('absents.student_id','=',$request->student_id)
                                    ->whereYear('date', $year)
                                    ->whereMonth('date', $new)
                                    ->count();
                                    if($absents > 0){
                                        $max = DB::table('counts')->where('student_id','=', $request->student_id)->max('updated_at');
                                        $prev = DB::table('counts')
                                                ->where('student_id','=',$request->student_id)
                                                ->where('updated_at', $max)
                                                ->sum('remain');
                                        $price = DB::table('student_materials')
                                                ->join('students','student_materials.student_id','=','students.id')
                                                ->join('materials','student_materials.material_id','=','materials.id')
                                                ->where('student_materials.student_id','=',$request->student_id)
                                                ->sum('materials.price');
                                        if($prev < 0){
                                            $amount = 0;
                                            $amount = $amount - $price;
                                            $paid = $request->amount;
                                            $remain = ($paid + $prev) + $amount;
                                            $notes = 'دفعة من حساب شهر '.$new.'';
                                            $data = array(
                                                'student_id'=>$request->student_id,
                                                'amount'=>$amount,
                                                'paid'=>$paid,
                                                'remain'=>$remain,
                                                'date'=>$now,
                                                'notes'=>$notes
                                                );
                                    
                                            DB::table('counts')->insert($data);
                                        }elseif($prev > 0){
                                            $amount = 0;
                                            $amount = $amount - $price;
                                            $paid = $request->amount;
                                            $remain = ($paid + $prev) + $amount;
                                            $notes = 'دفعة من حساب شهر '.$new.'';
                                            $data = array(
                                                'student_id'=>$request->student_id,
                                                'amount'=>$amount,
                                                'paid'=>$paid,
                                                'remain'=>$remain,
                                                'date'=>$now,
                                                'notes'=>$notes
                                                );
                                    
                                            DB::table('counts')->insert($data);
                                        }
                                        
                                    }
                            //----------------------------------------------------------------------------------------------------------------
                                return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
                            }else{
                                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                            }
                        }elseif($index2 > $price && $index2 <= $double){
                            $pay->remain = $index2 - $price;
                            $pay->amount = $price;
                            $x = $index2 - $price;
                            if($x > 0 && $x <= $price){
                                $pay2 = new Paym();
                                $pay2->student_id = $request->student_id;
                                $pay2->payed = 0;
                                $pay2->month = $pay->month + 1;
                                if($pay->month == 12){
                                    $pay2->year = $pay->year + 1;
                                }else{
                                    $pay2->year = $pay->year;
                                }
                                $pay2->amount = $pay->remain;
                                $pay2->remain = $pay->remain - $price;
                                $pay->payed = 1;
                            }elseif($x > $price){
                                return ['status' => false ,'data' => 'حدث خطأ , لقد تجاوزت الحد الأقصى للمبلغ '];
                            }
                            if ($pay->save() && $pay2->save()){
                                $data = array(
                                    'date'=>$request->date,
                                    'amount'=>$request->amount,
                                    'student_id'=>$request->student_id,
                                    'pay_id'=>$pay->id
                                );
                                DB::table('pay_details')->insert($data);
                            //----------------------------------------------------------------------------------------------------------------
                                $now = Carbon::now();
                                $time  = strtotime($now);
                                $day   = date('d',$time);
                                $month = date('m',$time);
                                $news = date('MM',$time);
                                $new = $request->month;
                                $year  = $request->year;
                                $absents = DB::table('absents')
                                    ->select('absents.*')
                                    ->where('absents.student_id','=',$request->student_id)
                                    ->whereYear('date', $year)
                                    ->whereMonth('date', $new)
                                    ->count();
                                    if($absents > 0){
                                        $max = DB::table('counts')->where('student_id','=', $request->student_id)->max('updated_at');
                                        $prev = DB::table('counts')
                                                ->where('student_id','=',$request->student_id)
                                                ->where('updated_at', $max)
                                                ->sum('remain');
                                        $price = DB::table('student_materials')
                                                ->join('students','student_materials.student_id','=','students.id')
                                                ->join('materials','student_materials.material_id','=','materials.id')
                                                ->where('student_materials.student_id','=',$request->student_id)
                                                ->sum('materials.price');
                                                if($prev < 0){
                                                    $amount = 0;
                                                    $amount = $amount - $price;
                                                    $paid = $request->amount;
                                                    $remain = ($paid + $prev) + $amount;
                                                    $notes = 'دفعة من حساب شهر'.$new.'';
                                                    $data = array(
                                                        'student_id'=>$request->student_id,
                                                        'amount'=>$amount,
                                                        'paid'=>$paid,
                                                        'remain'=>$remain,
                                                        'date'=>$now,
                                                        'notes'=>$notes
                                                        );
                                            
                                                    DB::table('counts')->insert($data);
                                                }elseif($prev > 0){
                                                    $amount = 0;
                                                    $amount = $amount - $price;
                                                    $paid = $request->amount;
                                                    $remain = ($paid + $prev) + $amount;
                                                    $notes = 'دفعة من حساب شهر '.$new.'';
                                                    $data = array(
                                                        'student_id'=>$request->student_id,
                                                        'amount'=>$amount,
                                                        'paid'=>$paid,
                                                        'remain'=>$remain,
                                                        'date'=>$now,
                                                        'notes'=>$notes
                                                        );
                                            
                                                    DB::table('counts')->insert($data);
                                                }
                                    }
                            //----------------------------------------------------------------------------------------------------------------
                                return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
                            }else{
                                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                            }
                        }elseif($index2 < $price){
                            $pay->remain = $index2 - $price;
                            $pay->amount = $index2;
                            $pay->payed = 0;
                            if ($pay->save()){
                                $data = array(
                                    'date'=>$request->date,
                                    'amount'=>$request->amount,
                                    'student_id'=>$request->student_id,
                                    'pay_id'=>$pay->id
                                    );
                                DB::table('pay_details')->insert($data);
                        //----------------------------------------------------------------------------------------------------------------
                            $now = Carbon::now();
                            $time  = strtotime($now);
                            $day   = date('d',$time);
                            $month = date('m',$time);
                            $news = date('MM',$time);
                            $new = $request->month;
                            $year  = $request->year;
                            $absents = DB::table('absents')
                                ->select('absents.*')
                                ->where('absents.student_id','=',$request->student_id)
                                ->whereYear('date', $year)
                                ->whereMonth('date', $new)
                                ->count();
                                if($absents > 0){
                                    $max = DB::table('counts')->where('student_id','=', $request->student_id)->max('updated_at');
                                    $prev = DB::table('counts')
                                            ->where('student_id','=',$request->student_id)
                                            ->where('updated_at', $max)
                                            ->sum('remain');
                                    $price = DB::table('student_materials')
                                            ->join('students','student_materials.student_id','=','students.id')
                                            ->join('materials','student_materials.material_id','=','materials.id')
                                            ->where('student_materials.student_id','=',$request->student_id)
                                            ->sum('materials.price');
                                            if($prev < 0){
                                                $amount = 0;
                                                $amount = $amount - $price;
                                                $paid = $request->amount;
                                                $remain = ($paid + $prev) + $amount;
                                                $notes = 'دفعة من حساب شهر '.$new.'';
                                                $data = array(
                                                    'student_id'=>$request->student_id,
                                                    'amount'=>$amount,
                                                    'paid'=>$paid,
                                                    'remain'=>$remain,
                                                    'date'=>$now,
                                                    'notes'=>$notes
                                                    );
                                        
                                                DB::table('counts')->insert($data);
                                            }elseif($prev > 0){
                                                $amount = 0;
                                                $amount = $amount - $price;
                                                $paid = $request->amount;
                                                $remain = ($paid + $prev) + $amount;
                                                $notes = 'دفعة من حساب شهر'.$new.'';
                                                $data = array(
                                                    'student_id'=>$request->student_id,
                                                    'amount'=>$amount,
                                                    'paid'=>$paid,
                                                    'remain'=>$remain,
                                                    'date'=>$now,
                                                    'notes'=>$notes
                                                    );
                                        
                                                DB::table('counts')->insert($data);
                                            }
                                }
                        //----------------------------------------------------------------------------------------------------------------
                                return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];  
                            }else{
                                return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                            }
                        }
                    }elseif($pay->payed == 1){
                        return ['status' => false ,'data' => 'حدث خطأ , لقد تم دفع هذا الشهر '];
                    }
                }
            }
            if($request->amount == $price){
                $pay = new Paym();
                $pay->student_id = $request->student_id;
                $pay->amount = $request->amount;
                $pay->month = $request->month;
                $pay->year = $request->year;
                $pay->remain = 0;
                $pay->payed = 1;
                if ($pay->save()){
                    $data = array(
                        'date'=>$request->date,
                        'amount'=>$request->amount,
                        'student_id'=>$request->student_id,
                        'pay_id'=>$pay->id
                        );
                    DB::table('pay_details')->insert($data);
                //----------------------------------------------------------------------------------------------------------------
                    $now = Carbon::now();
                    $time  = strtotime($now);
                    $day   = date('d',$time);
                    $month = date('m',$time);
                    $news = date('MM',$time);
                    $new = $request->month;
                    $year  = $request->year;
                    $absents = DB::table('absents')
                        ->select('absents.*')
                        ->where('absents.student_id','=',$request->student_id)
                        ->whereYear('date', $year)
                        ->whereMonth('date', $new)
                        ->count();
                        if($absents > 0){
                            $max = DB::table('counts')->where('student_id','=', $request->student_id)->max('updated_at');
                            $prev = DB::table('counts')
                                    ->where('student_id','=',$request->student_id)
                                    ->where('updated_at', $max)
                                    ->sum('remain');
                            $price = DB::table('student_materials')
                                    ->join('students','student_materials.student_id','=','students.id')
                                    ->join('materials','student_materials.material_id','=','materials.id')
                                    ->where('student_materials.student_id','=',$request->student_id)
                                    ->sum('materials.price');
                                    if($prev < 0){
                                        $amount = 0;
                                        $amount = $amount - $price;
                                        $paid = $request->amount;
                                        $remain = ($paid + $prev) + $amount;
                                        $notes = 'دفعة من حساب شهر '.$new.'';
                                        $data = array(
                                            'student_id'=>$request->student_id,
                                            'amount'=>$amount,
                                            'paid'=>$paid,
                                            'remain'=>$remain,
                                            'date'=>$now,
                                            'notes'=>$notes
                                            );
                                
                                        DB::table('counts')->insert($data);
                                    }elseif($prev > 0){
                                        $amount = 0;
                                        $amount = $amount - $price;
                                        $paid = $request->amount;
                                        $remain = ($paid + $prev) + $amount;
                                        $notes = 'دفعة من حساب شهر '.$new.'';
                                        $data = array(
                                            'student_id'=>$request->student_id,
                                            'amount'=>$amount,
                                            'paid'=>$paid,
                                            'remain'=>$remain,
                                            'date'=>$now,
                                            'notes'=>$notes
                                            );
                                
                                        DB::table('counts')->insert($data);
                                    }
                        }
                //----------------------------------------------------------------------------------------------------------------
                    return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }

            }elseif($request->amount > $price && $request->amount <= $double){
                $pay = new Paym();
                $pay->student_id = $request->student_id;
                $pay->amount = $price;
                $pay->month = $request->month;
                $pay->year = $request->year;
                $pay->remain = $request->amount - $price;
                $pay->payed = 1;
                $w = $request->amount - $price;
                if($w <= $price){
                    $pay2 = new Paym();
                    $pay2->student_id = $request->student_id;
                    $pay2->payed = 0;
                    $pay2->month = $pay->month + 1;
                    if($pay->month == 12){
                        $pay2->year = $pay->year + 1;
                    }else{
                        $pay2->year = $pay->year;
                    }
                    $pay2->amount = $w;
                    $pay2->remain = $pay->remain - $price;
                }
                if ($pay->save() && $pay2->save()){
                    $data = array(
                        'date'=>$request->date,
                        'amount'=>$request->amount,
                        'student_id'=>$request->student_id,
                        'pay_id'=>$pay->id
                        );
                    DB::table('pay_details')->insert($data);
                //----------------------------------------------------------------------------------------------------------------
                    $now = Carbon::now();
                    $time  = strtotime($now);
                    $day   = date('d',$time);
                    $month = date('m',$time);
                    $news = date('MM',$time);
                    $new = $request->month;
                    $year  = $request->year;
                    $absents = DB::table('absents')
                        ->select('absents.*')
                        ->where('absents.student_id','=',$request->student_id)
                        ->whereYear('date', $year)
                        ->whereMonth('date', $new)
                        ->count();
                        if($absents > 0){
                            $max = DB::table('counts')->where('student_id','=', $request->student_id)->max('updated_at');
                            $prev = DB::table('counts')
                                    ->where('student_id','=',$request->student_id)
                                    ->where('updated_at', $max)
                                    ->sum('remain');
                            $price = DB::table('student_materials')
                                    ->join('students','student_materials.student_id','=','students.id')
                                    ->join('materials','student_materials.material_id','=','materials.id')
                                    ->where('student_materials.student_id','=',$request->student_id)
                                    ->sum('materials.price');
                                    if($prev < 0){
                                        $amount = 0;
                                        $amount = $amount - $price;
                                        $paid = $request->amount;
                                        $remain = ($paid + $prev) + $amount;
                                        $notes = 'دفعة من حساب شهر '.$new.'';
                                        $data = array(
                                            'student_id'=>$request->student_id,
                                            'amount'=>$amount,
                                            'paid'=>$paid,
                                            'remain'=>$remain,
                                            'date'=>$now,
                                            'notes'=>$notes
                                            );
                                
                                        DB::table('counts')->insert($data);
                                    }elseif($prev > 0){
                                        $amount = 0;
                                        $amount = $amount - $price;
                                        $paid = $request->amount;
                                        $remain = ($paid + $prev) + $amount;
                                        $notes = 'دفعة من حساب شهر '.$new.'';
                                        $data = array(
                                            'student_id'=>$request->student_id,
                                            'amount'=>$amount,
                                            'paid'=>$paid,
                                            'remain'=>$remain,
                                            'date'=>$now,
                                            'notes'=>$notes
                                            );
                                
                                        DB::table('counts')->insert($data);
                                    }
                        }
                //----------------------------------------------------------------------------------------------------------------
                    return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }
                
            }elseif($request->amount < $price){
                $pay = new Paym();
                $pay->student_id = $request->student_id;
                $pay->amount = $request->amount;
                $pay->month = $request->month;
                $pay->year = $request->year;
                $pay->remain = $request->amount - $price;
                $pay->payed = 0;
                if ($pay->save()){
                    $data = array(
                        'date'=>$request->date,
                        'amount'=>$request->amount,
                        'student_id'=>$request->student_id,
                        'pay_id'=>$pay->id
                        );
                    DB::table('pay_details')->insert($data);
                //----------------------------------------------------------------------------------------------------------------
                    $now = Carbon::now();
                    $time  = strtotime($now);
                    $day   = date('d',$time);
                    $month = date('m',$time);
                    $news = date('MM',$time);
                    $new = $request->month;
                    $year  = $request->year;
                    $absents = DB::table('absents')
                        ->select('absents.*')
                        ->where('absents.student_id','=',$request->student_id)
                        ->whereYear('date', $year)
                        ->whereMonth('date', $new)
                        ->count();
                        if($absents > 0){
                            $max = DB::table('counts')->where('student_id','=', $request->student_id)->max('updated_at');
                            $prev = DB::table('counts')
                                    ->where('student_id','=',$request->student_id)
                                    ->where('updated_at', $max)
                                    ->sum('remain');
                            $price = DB::table('student_materials')
                                    ->join('students','student_materials.student_id','=','students.id')
                                    ->join('materials','student_materials.material_id','=','materials.id')
                                    ->where('student_materials.student_id','=',$request->student_id)
                                    ->sum('materials.price');
                                    if($prev < 0){
                                        $amount = 0;
                                        $amount = $amount - $price;
                                        $paid = $request->amount;
                                        $remain = ($paid + $prev) + $amount;
                                        $notes = 'دفعة من حساب شهر '.$new.'';
                                        $data = array(
                                            'student_id'=>$request->student_id,
                                            'amount'=>$amount,
                                            'paid'=>$paid,
                                            'remain'=>$remain,
                                            'date'=>$now,
                                            'notes'=>$notes
                                            );
                                
                                        DB::table('counts')->insert($data);
                                    }elseif($prev > 0){
                                        $amount = 0;
                                        $amount = $amount - $price;
                                        $paid = $request->amount;
                                        $remain = ($paid + $prev) + $amount;
                                        $notes = 'دفعة من حساب شهر'.$new.'';
                                        $data = array(
                                            'student_id'=>$request->student_id,
                                            'amount'=>$amount,
                                            'paid'=>$paid,
                                            'remain'=>$remain,
                                            'date'=>$now,
                                            'notes'=>$notes
                                            );
                                
                                        DB::table('counts')->insert($data);
                                    }
                        }
                //----------------------------------------------------------------------------------------------------------------
                    return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];  
                }else{
                    return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
                }
            }elseif($request->amount > $double){
                return ['status' => false ,'data' => 'حدث خطأ , لقد تجاوزت الحد الأقصى للمبلغ '];
            }

        }else{
            return ['status' => false ,'data' => 'حدث خطأ , هذا الطالب لم يحضر هذا الشهر '];
        }
    }

}
