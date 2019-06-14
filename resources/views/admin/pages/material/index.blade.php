@extends('admin.layouts.master')
@section('title')
المواد
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box transparent">
                    <div class="box-header border">
                        <h3 class="box-title"><span class="semi-bold"> المواد</span></h3>
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
                              <th>الاسم</th>
                              <th>المرحلة</th>
                              <th>درجة النجاح</th>
                              <th>السعر</th>
                              <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($materials as $material)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$material->material_name}}</td>
                                <td>{{$material->level_name}}</td>
                                <td>{{$material->success}}</td>
                                <td>{{$material->price}}</td>
                                <td>
                                <a href="{{ route('admin.materials.edit' , ['id' => $material->id]) }}" class="btn btn-blue"> تعديل   </a>
                                <button class="btn btn-orange btndelet" data-url="{{ route('admin.materials.delete' , ['id' => $material->id]) }}" >
                                    حذف
                                </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
  <!-- Content page End -->
@endsection

