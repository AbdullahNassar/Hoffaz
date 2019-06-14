@extends('admin.layouts.master')
@section('title')
المواصلات
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
                        <h3 class="box-title"><span class="semi-bold"> المواصلات</span></h3>
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
                                <th>محطة الوصول</th>
                                <th>محطة الانطلاق</th>
                                <th>رقم الاوتوبيس</th>
                                <th>قيمة الاشتراك</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transportations as $trans)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$trans->arrival}}</td>
                                <td>{{$trans->launch}}</td>
                                <td>{{$trans->bus}}</td>
                                <td>{{$trans->price}}</td>
                                <td>
                                <a href="{{ route('admin.transportations.edit' , ['id' => $trans->id]) }}" class="btn btn-blue"> تعديل   </a>
                                <button class="btn btn-orange btndelet" data-url="{{ route('admin.transportations.delete' , ['id' => $trans->id]) }}" >
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

