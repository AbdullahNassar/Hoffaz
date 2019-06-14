@extends('admin.layouts.master')
@section('title')
تقارير حضور المدرسين
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
                        <h3 class="box-title"><span class="semi-bold"> تقارير حضور المدرسين</span></h3>
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
                                <th>التاريخ</th>
                                <th>المدرس</th>
                                <th>وقت الحضور</th>
                                <th>وقت الانصراف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attends as $attend)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$attend->date}}</td>
                                    <td>{{$attend->teacher_name}}</td>
                                    <td>{{(new DateTime($attend->attends ))->format('h:i:s A')}}</td>
                                    <td>{{(new DateTime($attend->leaves ))->format('h:i:s A')}}</td>
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

