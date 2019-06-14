@extends('admin.layouts.master') 
@section('title')
الموظفين 
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold">تعديل بيانات الموظف</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
          @foreach($teachers as $teacher)
					<div class="box-body" style="display: block;">
            <form class="form-1 fl-form" action="{{route('admin.teachers.edit' , ['id' => $teacher->id])}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                {{ csrf_field() }}
              <div class="row form-row">
								<div class="col-md-12">
									<div class="user-img-upload">
										<div class="fileUpload user-editimg">
											<span><i class="fa fa-camera"></i> تغيير</span>
											<input type='file' id="imgInp" class="upload" name="image" value="{{$teacher->image}}"/>
											<input type="hidden" value="teachers" name="storage" >
										</div>
										<img src="{{asset('storage/uploads/teachers').'/'.$teacher->image}}" id="blah" class="img-circle" alt="">
										<p id="result"></p>
										<br>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-1">اسم الموظف</label>
										<input value="{{$teacher->teacher_name}}" name="name" class="form-control" id="input-1" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="select-2">  الوظيفة</label>
										<select name="job" id="select-2" class="form-control">
										<option value="{{$teacher->job}}" selected>{{$teacher->job_name}}</option>
										@foreach($jobs as $job)
											<option value="{{$job->id}}">{{$job->job_name}}</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-6">الراتب الأساسى</label>
										<input name="salary" value="{{$teacher->salary}}" id="input-6" type="number" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-2">البريد الالكترونى</label>
										<input value="{{$teacher->email}}" name="email" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-9">عدد ساعات العمل</label>
										<input value="{{$teacher->hours}}" name="hours" class="form-control" id="input-9" type="number">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-3">رقم الهاتف</label>
										<input name="phone" id="input-3" value="{{$teacher->phone}}" type="text" class="form-control" placeholder="أدخل رقم الهاتف">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="select-3">تاريخ الميلاد</label>
										<input value="{{$teacher->birth}}" name="birth" type="date" id="select-3" class="form-control" data-placeholder="أدخل تاريخ الميلاد">
									</div>
								</div>
                				<div class="col-md-6">
									<div class="form-group">
										<label for="select-2">يوم التوظيف</label>
										<input name="first_day" id="select-2" value="{{$teacher->first_day}}" type="date" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="input-5">عنوان الموظف</label>
										<textarea name="address" class="form-control" id="input-5" type="text">{{$teacher->address}}</textarea>
									</div>
								</div>								
								<div class="col-md-12">
									<div class="form-group">
										<h5> مواد الموظف</h5>
                      @foreach($materials as $material)
                      <label class="checkbox-inline">{{$material->material_name}}</label>
                      <input class="minimal" name="m{{$loop->index + 1}}" type="checkbox" value="{{$material->id}}">
                      @endforeach
                  </div>
                  <div class="white-bg">
                    <table class="table table-bordered table-striped">
                          <thead>
                          <tr>
                              <th>الترتيب</th>
                              <th>المادة</th>
                              <th>العمليات</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($mats as $mat)
                          <tr>
                              <td>{{$loop->index + 1}}</td>
                              <td>{{$mat->material_name}}</td>
                              <td>
                              <button class="btn btn-orange btndelet" data-url="{{ route('admin.tmaterial.delete' , ['id' => $mat->id]) }}" >
                                  حذف
                              </button>
                              </td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.teachers')}}" class="btn btn-orange"> الغاء</a>
									<button type="submit" class="btn btn-blue addButton">حفظ</button>
								</div>
							</div>
						</form>
					</div>
          @endforeach
				</div>
			</div>
	</section>
</div>
<!-- Content page End -->
@endsection