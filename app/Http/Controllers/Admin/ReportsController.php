<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Level;
use App\Salary;
use Config;
use DB;

class ReportsController extends Controller
{
    public function absent() {
        $students = DB::table('absents')
                ->join('students','absents.student_id','=','students.id')
                ->join('courses','absents.course_id','=','courses.id')
                ->join('centers','absents.center_id','=','centers.id')
                ->select('students.student_name','courses.course_name','centers.center_name','absents.*')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.absent', compact('students'));
    }

    public function counts() {
        $students = DB::table('counts')
                ->join('students','counts.student_id','=','students.id')
                ->select('students.student_name','counts.*')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.counts', compact('students'));
    }

    public function grades() {
        $students = DB::table('student_grades')
                ->join('students','student_grades.student_id','=','students.id')
                ->join('materials','student_grades.material_id','=','materials.id')
                ->join('centers','student_grades.center_id','=','centers.id')
                ->select('students.student_name','centers.center_name','materials.material_name','student_grades.*')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.grades', compact('students'));
    }

    public function attend() {
        $attends = DB::table('attend')
                ->join('teachers','attend.teacher_id','=','teachers.id')
                ->select('teachers.teacher_name','attend.*')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.attend', compact('attends'));
    }

    public function salariesReport() {
        $salaries = DB::table('salaries')
                ->join('teachers','salaries.teacher_id','=','teachers.id')
                ->select('salaries.*','teachers.teacher_name')
                ->where('status', 1)
                ->get();
        return view('admin.pages.reports.salaries', compact('salaries'));
    }

    public function store() {
        $counts = DB::table('counts')
                ->join('students','counts.student_id','=','students.id')
                ->select('students.student_name','counts.*')
                ->where('paid','>', 0)
                ->orderBy('id', 'asc')
                ->get();

        $total1 = DB::table('counts')
                ->select('paid')
                ->where('paid','>', 0)
                ->sum('paid');

        $salaries = DB::table('salaries')
                ->join('teachers','salaries.teacher_id','=','teachers.id')
                ->select('teachers.teacher_name','salaries.*')
                ->where('status','=', 1)
                ->orderBy('id', 'asc')
                ->get();

        $total2 = DB::table('salaries')
                ->select('final')
                ->where('status','=', 1)
                ->sum('final');

        return view('admin.pages.store', compact('counts','salaries','total1','total2'));
    }

}
