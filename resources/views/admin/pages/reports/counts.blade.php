@extends('admin.layouts.master')
@section('title')
تقارير حسابات الطلاب
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box transparent">
                    <div class="box-header border">
                        <h3 class="box-title"><span class="semi-bold"> تقارير حسابات الطلاب</span></h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!--<div class="box-body white-bg">
                        <a class="btn btn-app btn-orange">
                            <i class="fa fa-clone"></i> اضافة جديد
                        </a>
                    </div>-->
                    <div class="box-body white-bg">
                        <table id="tables" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الطالب</th>
                                <th>المصروفات الشهرية</th>
                                <th>المبلغ المدفوع</th>
                                <th> الحساب</th>
                                <th>التاريخ</th>
                                <th>ملاحظات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$student->student_name}}</td>
                                    <td>{{$student->amount * -1}}</td>
                                    <td>{{$student->paid}}</td>
                                    @if($student->remain > 0)
                                    <td>الرصيد : {{$student->remain}}</td>
                                    @elseif($student->remain < 0)
                                    <td>الديون : {{$student->remain * -1}}</td>
                                    @endif
                                    <td>{{$student->date}}</td>
                                    <td>{{$student->notes}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </section>


</div>
  <!-- Content page End -->
@endsection

