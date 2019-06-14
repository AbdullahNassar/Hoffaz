@extends('admin.layouts.master')
@section('title')
الخزينة
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box transparent">
                    <div class="box-header border">
                        <h3 class="box-title"><span class="semi-bold"> الخزينة</span></h3>
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
                                <th> الوارد</th>
                                <th> الصادر</th>
                                <th> الملاحظات</th>
                                <th>          </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($counts as $count)
                            <tr>
                                <td>{{$count->paid}}</td>
                                <td>                </td>
                                <td>{{$count->notes}}</td>
                                <td> للطالب : {{$count->student_name}}</td>
                            </tr>
                            @endforeach
                            @foreach($salaries as $salary)
                            <tr>
                                <td>                  </td>
                                <td>{{$salary->final}}</td>
                                <td>{{$salary->notes}}</td>
                                <td>للموظف : {{$salary->teacher_name}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>الاجمالى : {{$total1}}</td>
                                <td>الاجمالى : {{$total2}}</td>
                                <td>                  </td>
                                <td>                  </td>
                            </tr>
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

