@extends('admin.layouts.master')
@section('title')
المواعيد
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
            <div class="col-md-6 col-md-offset-3">
                <div class="box transparent">
                    <div class="box-header border">
                        <h3 class="box-title"><span class="semi-bold"> المواعيد</span></h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <form action="{{route('admin.teachers.addtime')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                        {{ csrf_field() }}
                    <div class="box-body white-bg">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th>اليوم</th>
                            <th>وقت الحضور</th>
                            <th>وقت الانصراف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($search)
                        @foreach($times as $time)
                        <tr>
                            <td>
                                <label class="checkbox-inline">{{$time->day_ar}}</label>
                                <input class="minimal" name="day{{$time->id}}" type="checkbox" @if($time->status == 1) checked @endif>
                                <input name="d{{$time->id}}" type="hidden" value="{{$time->day}}">
                                <input name="dd{{$time->id}}" type="hidden" value="{{$time->day_ar}}">
                                <input name="teacher" type="hidden" value="{{$teacher->id}}">
                            </td>
                            <td><input name="attend{{$time->id}}" type="time" class="form-control" value="{{$time->attend}}" style="text-align: right;"></td>
                            <td><input name="leave{{$time->id}}" type="time" class="form-control" value="{{$time->leave}}" style="text-align: right;"></td>
                        </tr>
                        @endforeach                        
                        @endif
                        </tbody>
                    </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer transparent"> 
                        <a href="{{route('admin.teachers')}}" class="btn btn-orange">  أغلق</a>
						<button type="submit" class="btn btn-blue addButton"> حفظ</button>
					</div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
  </div>
  <!-- Content page End -->
@endsection