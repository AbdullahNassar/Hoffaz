@extends('admin.layouts.master')
@section('title')
المراكز
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
                        <h3 class="box-title"><span class="semi-bold"> المراكز</span></h3>
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
                              <th>العنوان</th>
                              <th>المشرف</th>
                              <th>المدير</th>
                              <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($centers as $center)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$center->center_name}}</td>
                                <td>{{$center->address}}</td>
                                <td>{{$center->manager}}</td>
                                <td>{{$center->head_manager}}</td>
                                <td>
                                <a href="{{ route('admin.centers.edit' , ['id' => $center->id]) }}" class="btn btn-blue"> تعديل   </a>
                                <button class="btn btn-orange btndelet" data-url="{{ route('admin.centers.delete' , ['id' => $center->id]) }}" >
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

