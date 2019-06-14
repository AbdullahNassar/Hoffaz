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
                        <tr>
                            <td>
                                <label class="checkbox-inline">السبت</label>
                                <input class="minimal" name="day1" type="checkbox" >
                                <input name="teacher" type="hidden" value="{{$teacher->id}}">
                                <input name="d1" type="hidden" value="Saturday">
                                <input name="dd1" type="hidden" value="السبت">
                            </td>
                            <td><input name="attend1" type="time" class="form-control"></td>
                            <td><input name="leave1" type="time" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-inline">الأحد</label>
                                <input class="minimal" name="day2" type="checkbox" >
                                <input name="d2" type="hidden" value="Sunday">
                                <input name="dd2" type="hidden" value="الأحد">
                            </td>
                            <td><input name="attend2" type="time" class="form-control"></td>
                            <td><input name="leave2" type="time" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-inline">الاثنين</label>
                                <input class="minimal" name="day3" type="checkbox" >
                                <input name="d3" type="hidden" value="Monday">
                                <input name="dd3" type="hidden" value="الاثنين">
                            </td>
                            <td><input name="attend3" type="time" class="form-control"></td>
                            <td><input name="leave3" type="time" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-inline">الثلاثاء</label>
                                <input class="minimal" name="day4" type="checkbox" >
                                <input name="d4" type="hidden" value="Tuesday">
                                <input name="dd4" type="hidden" value="الثلاثاء">
                            </td>
                            <td><input name="attend4" type="time" class="form-control"></td>
                            <td><input name="leave4" type="time" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-inline">الأربعاء</label>
                                <input class="minimal" name="day5" type="checkbox" >
                                <input name="d5" type="hidden" value="Wednesday">
                                <input name="dd5" type="hidden" value="الأربعاء">
                            </td>
                            <td><input name="attend5" type="time" class="form-control"></td>
                            <td><input name="leave5" type="time" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-inline">الخميس</label>
                                <input class="minimal" name="day6" type="checkbox" >
                                <input name="d6" type="hidden" value="Thursday">
                                <input name="dd6" type="hidden" value="الخميس">
                            </td>
                            <td><input name="attend6" type="time" class="form-control"></td>
                            <td><input name="leave6" type="time" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-inline">الجمعة</label>
                                <input class="minimal" name="day7" type="checkbox" >
                                <input name="d7" type="hidden" value="Friday">
                                <input name="dd7" type="hidden" value="الجمعة">
                            </td>
                            <td><input name="attend7" type="time" class="form-control"></td>
                            <td><input name="leave7" type="time" class="form-control"></td>
                        </tr>
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