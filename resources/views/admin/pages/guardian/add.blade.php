@extends('admin.layouts.master') 
@section('title')
 أولياء الأمور 
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold">اضافة ولى أمر جديد</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
						<form class="form-1 fl-form" action="{{route('admin.guardians.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								<div class="col-md-12">
									<div class="user-img-upload">
										<div class="fileUpload user-editimg">
											<!--<span><i class="fa fa-camera"></i> اضف</span>-->
											<input type='file' id="imgInp" class="upload" name="image" />
											<input type="hidden" value="guardians" name="storage" >
										</div>
										<img src="{{asset('assets/admin/img/add.png')}}" id="blah" class="img-circle" alt="">
										<p id="result"></p>
										<br>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-1">اسم ولى الأمر</label>
										<input name="name" class="form-control" id="input-1" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-2">الوظيفة</label>
										<input name="job" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-3"> اسم المستخدم</label>
										<input name="username" class="form-control" id="input-3" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-4">كلمة السر</label>
										<input name="password" class="form-control" id="input-4" type="password">
									</div>
								</div>
                                
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-4">رقم الهاتف</label>
										<input name="phone" class="form-control" id="input-4" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-4">رقم الواتس</label>
										<input name="whatsapp" class="form-control" id="input-4" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-4">الرقم القومى</label>
										<input name="national_id" class="form-control" id="input-4" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-4">الجنسية</label>
										<input name="nationality" class="form-control" id="input-4" type="text">
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label for="input-4">البريد الالكترونى</label>
										<input name="email" class="form-control" id="input-4" type="text">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="input-5">عنوان ولى الأمر</label>
										<textarea name="address" class="form-control" id="input-5" type="text"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.guardians')}}" class="btn btn-primary btn-orange"> الغاء</a>
									<button type="submit" class="btn btn-blue btn-blue addButton">حفظ</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
	</section>
</div>
<!-- Content page End -->
@endsection