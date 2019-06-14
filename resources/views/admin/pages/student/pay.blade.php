@extends('admin.layouts.master')
@section('title')
الطلاب
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
<section class="content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{route('admin.students.pay')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                    <!-- SELECT2 EXAMPLE -->
                        <div class="box transparent">
                            <div class="box-header border">
                                <h3 class="box-title"><span class="semi-bold"> دفع الاشتراك الشهرى</span></h3>
                                <div class="box-tools pull-right">
                                    <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
                                    <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                                    <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                                    <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5> الطالب</h5>
                                            <select name="student_id" class="form-control select2" data-placeholder="اختر طالب" style="width: 100%; text-align: right;">
                                                <option>            </option>
                                                @foreach($students as $student)
                                                    <option value="{{$student->id}}">{{$student->student_name}}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <h5> المبلغ</h5>
                                            <input name="amount" type="number" class="form-control" placeholder="أدخل المبلغ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5> الشهر</h5>
                                            <select name="month" class="form-control select2" data-placeholder="اختر الشهر" style="width: 100%; text-align: right;">
                                                <option>               </option>
                                                <option value="1">يناير</option>
                                                <option value="2">فبراير</option>
                                                <option value="3">مارس</option>
                                                <option value="4">ابريل</option>
                                                <option value="5">مايو</option>
                                                <option value="6">يونيو</option>
                                                <option value="7">يوليو</option>
                                                <option value="8">أغسطس</option>
                                                <option value="9">سبتمبر</option>
                                                <option value="10">أكتوبر</option>
                                                <option value="11">نوفمبر</option>
                                                <option value="12">ديسمبر</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h5> المادة</h5>
                                            <select name="material_id" class="form-control select2" data-placeholder="اختر المادة" style="width: 100%; text-align: right;">
                                                <option>            </option>
                                                @foreach($materials as $material)
                                                    <option value="{{$material->id}}">{{$material->material_name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.box-body -->
                            <div class="box-footer transparent">
                                <a href="{{route('admin.home')}}" class="btn btn-orange">  أغلق</a>
                                <button type="submit" class="btn btn-blue addButton"> حفظ</button>
                            </div>

                        </div><!-- /.box -->
                    </form>
                </div>
            </div>
        </section>
</div>
  <!-- Content page End -->
@endsection

