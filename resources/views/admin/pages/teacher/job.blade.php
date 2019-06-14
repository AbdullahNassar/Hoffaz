@extends('admin.layouts.master')
@section('title')
الوظائف
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
            <div class="col-md-8 col-md-offset-2">
                <div class="box transparent">
                    <div class="box-header border">
                        <h3 class="box-title"><span class="semi-bold"> الوظائف</span></h3>
                        <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-body white-bg">
                        <table id="tables" class="display" style="max-width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الوظيفة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$job->job_name}}</td>
                                    <td style="min-width: 200px;"> <a href="{{ route('admin.jobs.edit' , ['id' => $job->id]) }}" class="btn btn-blue"> تعديل   </a>
                                        <button class="btn btn-orange btndelet" data-url="{{ route('admin.jobs.delete' , ['id' => $job->id]) }}">حذف</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
  </div>
  <!-- Content page End -->
@endsection