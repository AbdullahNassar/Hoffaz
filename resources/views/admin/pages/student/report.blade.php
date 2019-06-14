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
                            <h3 style="text-align: student;">تقارير الطلاب</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4> المركز</h4>
                                    <select id="centers" name="center_id" class="form-control select2" data-placeholder="اختر المركز" style="width: 100%; text-align: right;">
                                        <option>            </option>
                                        @foreach($centers as $center)
                                            <option value="{{$center->id}}">{{$center->center_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h4> المادة</h4>
                                    <select id="materials" name="material_id" class="form-control select2" data-placeholder="اختر المادة" style="width: 100%; text-align: right;">
                                        <option>            </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4> الحلقة</h4>
                                    <select id="courses" name="course_id" class="form-control select2" data-placeholder="اختر الحلقة" style="width: 100%; text-align: right;">
                                        <option>            </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h4>من</h4>
                                    <input id="from" type="date" class="form-control">
                                </div>
                                <!--<h4> التاريخ من : الى</h4>
                                <div class="input-group">

                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reportrange">
                                  </div>-->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4> الطالب</h4>
                                    <select id="students" name="student_id" class="form-control select2" data-placeholder="اختر الطالب" style="width: 100%; text-align: right;">
                                        <option>            </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h4>الى</h4>
                                    <input id="to" type="date" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="box box-primary">
                                        <div class="box-body">
                                            <table class="table table-striped" id="datatable">
                                                <tbody id="per">
                                                <tr>
                                                <tr><td>المادة</td><td>الدرجة</td><td>التقدير</td><td>التاريخ</td><td>عرض</td></tr>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box box-primary">
                                        <div class="box-body">
                                            <table class="table table-striped">
                                                <tbody id="percents">
                                                <tr>
                                                <tr><td>البند</td><td>الدرجة</td></tr>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
</div>
  <!-- Content page End -->
@endsection

