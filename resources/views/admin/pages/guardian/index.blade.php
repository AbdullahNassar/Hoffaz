@extends('admin.layouts.master')
@section('title')
 أولياء الأمور 
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
                        <h3 class="box-title"><span class="semi-bold">  أولياء الأمور </span></h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                            <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!--<div class="box-body white-bg">
                        <a class="btn btn-app btn-orange">
                            <i class="fa fa-clone"></i> اضافة جديد
                        </a>
                    </div>-->
                    <div class="box-body white-bg">
                        <table id="tables" class="display" style="width:100%">
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
                            @foreach($guardians as $guardian)
                              <tr>
                                  <td>{{$loop->index + 1}}</td>
                                  <td>
                                    <img src="{{asset('storage/uploads/guardians').'/'.$guardian->image}}" style="max-width: 100px;">
                                  </td>
                                  <td>{{$guardian->guardian_name}}</td>
                                  <td>{{$guardian->phone}}</td>
                                  <td>{{$guardian->address}}</td>
                                  <td>{{$guardian->email}}</td>
                                  <td style="min-width: 200px;">
                                  <a href="{{ route('admin.guardians.edit' , ['id' => $guardian->id]) }}" class="btn btn-blue"> تعديل   </a>
                                  <button class="btn btn-orange btndelet" data-url="{{ route('admin.guardians.delete' , ['id' => $guardian->id]) }}" >
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

