@extends('admin.layouts.master')
@section('title')
الطلاب
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
<section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 style="text-align: student;">تسجيل الحضور</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <form action="{{route('admin.absent.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4> المركز</h4>
                                            <select id="cent" name="center_id" class="form-control select2" data-placeholder="اختر المركز" style="width: 100%; text-align: right;">
                                                <option>            </option>
                                                @foreach($centers as $center)
                                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4> الحلقة</h4>
                                            <select id="group" name="course_id" class="form-control select2" data-placeholder="اختر الحلقة" style="width: 100%; text-align: right;">
                                                <option>            </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4>التاريخ</h4>
                                            <input style="text-align: right;" name="date" value="{{$now->toDateString()}}" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="box-body">
                                                <table class="table table-striped">
                                                    <tbody id="absent">
                                                    <tr><td>الطالب</td><td>الحالة</td><td></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <a href="{{route('admin.home')}}" class="btn btn-default"><i class="fa fa-close"></i>  أغلق</a>
                                <button type="submit" class="btn btn-primary addButton"><i class="fa fa-save"></i>  حفظ</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
</div>
  <!-- Content page End -->
@endsection

