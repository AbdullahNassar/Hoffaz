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
                        <h3 class="box-title"><span class="semi-bold">تعديل وظيفة</span></h3>
                        <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <br>
                    <form class="form-1 fl-form" action="{{route('admin.jobs.edit' , ['id' => $job->id])}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
                        <div class="box-body">
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-1">اسم الوظيفة</label>
                                        <input name="name" value="{{$job->job_name}}" id="input-1" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer transparent"> <a href="{{route('admin.jobs')}}" class="btn btn-orange">  أغلق</a>
                            <button type="submit" class="btn btn-blue addButton">حفظ</button>
                        </div>
                    </div>
                <!-- /.box -->
                </form>
            </div>
        </div>
    </section>
  </div>
  <!-- Content page End -->
@endsection