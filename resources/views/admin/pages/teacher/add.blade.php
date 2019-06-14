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
              <h3 class="box-title"><span class="semi-bold">اضافة موظف جديد</span></h3>
              <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
                <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <br>
				    <form class="form-1 fl-form" action="{{route('admin.teachers.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
              {{ csrf_field() }}
						<div class="box-body">
              <div class="row form-row">
								<div class="col-md-12">
									<div class="user-img-upload">
										<div class="fileUpload user-editimg">
											<!--<span><i class="fa fa-camera"></i> اضف</span>-->
											<input type='file' id="imgInp" class="upload" name="image" />
											<input type="hidden" value="teachers" name="storage" >
										</div>
										<img src="{{asset('assets/admin/img/add.png')}}" id="blah" class="img-circle" alt="">
										<p id="result"></p>
										<br>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-1">اسم الموظف</label>
										<input name="name" id="input-1" class="form-control" type="text">
										<input name="d1" type="hidden" value="Saturday">
                    <input name="dd1" type="hidden" value="السبت">
										<input name="d2" type="hidden" value="Sunday">
                    <input name="dd2" type="hidden" value="الأحد">
										<input name="d3" type="hidden" value="Monday">
                    <input name="dd3" type="hidden" value="الاثنين">
										<input name="d4" type="hidden" value="Tuesday">
                    <input name="dd4" type="hidden" value="الثلاثاء">
										<input name="d5" type="hidden" value="Wednesday">
                    <input name="dd5" type="hidden" value="الأربعاء">
										<input name="d6" type="hidden" value="Thursday">
                    <input name="dd6" type="hidden" value="الخميس">
										<input name="d7" type="hidden" value="Friday">
                    <input name="dd7" type="hidden" value="الجمعة">
									</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label for="select-1">الوظيفة</label>
										<select id="select-1" name="job" class="form-control">
											@foreach($jobs as $job)
												<option value="{{$job->type}}">{{$job->job_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label for="input-3">البريد الالكترونى</label>
                    <input name="email" id="input-3" type="email" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-9">عدد ساعات العمل</label>
										<input name="hours" class="form-control" id="input-9" type="number">
									</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label for="input-4">رقم الهاتف</label>
                    <input name="phone" type="text" class="form-control" id="input-4">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-6">الراتب الأساسى</label>
										<input name="salary" id="input-6" type="number" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-7">اسم المستخدم</label>
										<input name="username" id="input-7" type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-8">كلمة السر</label>
										<input name="password" id="input-8" type="password" class="form-control">
									</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label for="input-2">تاريخ الميلاد</label>
										<input name="birth" id="input-2" type="date" class="form-control">
									</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label for="input-2">يوم التوظيف</label>
                    <input name="first_day" id="input-2" type="date" class="form-control">
									</div>
								</div>
								
                <div class="col-md-12">
									<div class="form-group">
										<label for="input-5">عنوان الموظف</label>
                    <textarea class="form-control" name="address" rows="3" id="input-5"></textarea>
									</div>
								</div>
                <div class="col-md-12">
									<div class="form-group">
										<h5> مواد المدرس</h5>
										@foreach($materials as $material)
										<label class="checkbox-inline">{{$material->material_name}}</label>
										<input class="minimal" name="m{{$loop->index + 1}}" type="checkbox" value="{{$material->id}}">@endforeach
                  </div>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.box-body -->
						<div class="box-footer transparent"> <a href="{{route('admin.teachers')}}" class="btn btn-orange">  أغلق</a>
							<button type="submit" class="btn btn-blue addButton"> حفظ</button>
						</div>
					</div>
					<!-- /.box -->
				</form>
			</div>
		</div>
	</section>
</div>
<!-- Content page End -->
@endsection