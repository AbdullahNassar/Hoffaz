@extends('admin.layouts.master')
@section('title')
الموظفين
@endsection
@section('content')
<!-- Content page Start -->
  <div class="content-wrapper">
    <section class="content">  
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form action="{{route('admin.teacherDoc.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                {{ csrf_field() }}
                  <div class="col-md-4">        
                    <div class="box transparent">
                      <div class="box-header with-border">
                        <h3 class="box-title">ادراج ملفات الموظفين</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                      <div class="form-group">
                          <select name="teacher_id" class="form-control select2" data-placeholder="اختر موظف" style="width: 100%; text-align: right;">
                                <option>الموظف</option>
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                @endforeach
                          </select>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <input type="file" name="image2" placeholder="حمل  ملف">
                            <input type="hidden" value="teachers" name="storage2" >
                        </div>
                      </div>
                      <div class="box-footer transparent">
                        <a href="{{route('admin.home')}}" class="btn btn-orange">  أغلق</a>
                        <button type="submit" class="btn btn-blue addButton">  حفظ</button>
                      </div>
                    </div>
                  </div><!-- End col -->
              </form>
              <div class="col-md-8">        
                <div class="box transparent">
                  <div class="box-header with-border">
                    <h3 class="box-title">ملفات الموظفين</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body white-bg">
                    <table class="table table-striped">
                      <tbody>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>الموظف</th>
                        <th>الملف</th>
                        <th>العمليات</th>
                      </tr>
                      @foreach($docs as $doc)
                      <tr>
                        <td>{{$loop->index + 1}}.</td>
                        <td>{{$doc->teacher_name}}</td>
                        <td><a href=""><i class="fa fa-file-text"></i>    {{$doc->file}}</a></td>
                        <td>
                          <a href="{{asset('storage/uploads/teachers').'/'.$doc->file}}" class="btn btn-blue">تحميل</a>
                          <button type="submit" class="btn btn-orange btndelet" data-url="{{ route('admin.teacherDoc.delete' , ['id' => $doc->id]) }}">حذف</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody></table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- End col -->
            </div>
            </div>
    </section>
  </div>
  <!-- Content page End -->
@endsection