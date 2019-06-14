@extends('admin.layouts.master')
@section('title')
تقارير المرتبات
@endsection
@section('content')
<!-- Content page Start -->
  <div class="content-wrapper">
    <!--<section class="content-header">
      <h1>
        <i class="fa fa-arrow-left"></i>
        <span class="semi-bold">Dashboard</span>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box transparent">
                    <div class="box-header border">
                        <h3 class="box-title"><span class="semi-bold"> تقارير المرتبات</span></h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-body white-bg">
                    <table id="tables" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>المدرس</th>
                            <th>الراتب الأساسى</th>
                            <th>أيام الحضور</th>
                            <th>الشهر</th>
                            <th>السنة</th>
                            <th>الساعات الاضافية</th>
                            <th>المبلغ الاضافى</th>
                            <th>الخصومات</th>
                            <th>السلف</th>
                            <th>صافى الراتب</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salaries as $salary)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$salary->teacher_name}}</td>
                            <td>{{$salary->salary}}</td>
                            <td>{{$salary->days}}</td>
                            <td>{{$salary->month}}</td>
                            <td>{{$salary->year}}</td>
                            <td>{{$salary->hours}}</td>
                            <td>{{$salary->bonus}}</td>
                            <td>{{$salary->minus}}</td>
                            <td>{{$salary->parts}}</td>
                            <td>{{$salary->final}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
  </div>
  <!-- Content page End -->
@endsection