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
                            <h3 style="text-align: student;">تقارير الحضور</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4> المركز</h4>
                                        <select id="cen" name="center_id" class="form-control select2" data-placeholder="اختر المركز" style="width: 100%; text-align: right;">
                                            <option>            </option>
                                            @foreach($centers as $center)
                                                <option value="{{$center->id}}">{{$center->center_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4> الحلقة</h4>
                                        <select id="groups" name="course_id" class="form-control select2" data-placeholder="اختر الحلقة" style="width: 100%; text-align: right;">
                                            <option>            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4>من</h4>
                                        <input style="text-align: right;" id="dfrom" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4>الى</h4>
                                        <input style="text-align: right;" id="dto" value="{{$now->toDateString()}}" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary">
                                        <div class="box-body">
                                            <table class="table table-striped">
                                                <tbody id="absents">
                                                <tr></tr>
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