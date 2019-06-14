@extends('admin.layouts.master')
@section('title')
الموظفين
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
                        <h3 class="box-title"><span class="semi-bold"> الموظفين</span></h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
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
                            <th>الصورة الشخصية</th>
                            <th>الاسم</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>البريد الالكترونى</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>
                              <img src="{{asset('storage/uploads/teachers').'/'.$teacher->image}}" style="max-width: 100px;">
                            </td>
                            <td>{{$teacher->teacher_name}}</td>
                            <td>{{$teacher->phone}}</td>
                            <td>{{$teacher->address}}</td>
                            <td>{{$teacher->email}}</td>
                            <td style="min-width: 250px;">
                            <a href="{{ route('admin.teachers.edit' , ['id' => $teacher->id]) }}" class="btn btn-blue"> تعديل   </a>
                            <a href="{{ route('admin.teachers.code' , ['id' => $teacher->id]) }}" class="btn btn-orange">ID</a>
                            <button class="btn btn-orange btndelet" data-url="{{ route('admin.teachers.delete' , ['id' => $teacher->id]) }}" >
                                حذف
                            </button><br><br>
                            <a href="{{ route('admin.teachers.time' , ['id' => $teacher->id]) }}" class="btn btn-blue"> المواعيد   </a>
                            <a href="{{ route('admin.teachers.salaries' , ['id' => $teacher->id]) }}" class="btn btn-orange"> الحسابات   </a>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
  </div>
  <!-- Content page End -->
@endsection