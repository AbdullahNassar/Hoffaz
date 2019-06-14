@extends('admin.layouts.master') 
@section('title')
بيانات المؤسسة 
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold">تعديل بيانات المؤسسة</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
                        <form class="form-1 fl-form" action="{{route('admin.org.edit')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                        {{ csrf_field() }}
                            <div class="row form-row">
								<div class="col-md-12">
									<div class="user-img-upload">
										<div class="fileUpload user-editimg">
											<span><i class="fa fa-camera"></i> تغيير</span>
											<input type='file' id="imgInp" class="upload" name="image" value="{{$org->image}}"/>
											<input type="hidden" value="org" name="storage" >
										</div>
										<img src="{{asset('storage/uploads/org').'/'.$org->logo}}" id="blah" class="img-circle" alt="">
										<p id="result"></p>
										<br>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-1">اسم المؤسسة</label>
										<input  value="{{$org->name}}" name="name" class="form-control" id="input-1" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-2">  رقم السجل التجارى</label>
										<input  value="{{$org->business_registration}}" name="business_registration" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-4">رقم البطاقة الضريبية</label>
										<input value="{{$org->tax_card}}" name="tax_card" class="form-control" id="input-4" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-3">رقم الهاتف</label>
										<input name="phone" id="input-3" value="{{$org->phone}}" type="text" class="form-control" placeholder="أدخل رقم الهاتف">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-7">رقم الفاكس</label>
										<input name="fax" id="input-7" value="{{$org->fax}}" type="text" class="form-control" placeholder="أدخل رقم الهاتف">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-6">البريد الالكترونى</label>
										<input value="{{$org->email}}" name="email" class="form-control" id="input-6" type="text">
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label for="input-8">الموقع الالكترونى</label>
										<input value="{{$org->website}}" name="website" class="form-control" id="input-8" type="text">
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label for="input-5">عنوان المؤسسة</label>
										<textarea name="address" class="form-control" id="input-5" type="text">{{$org->address}}</textarea>
									</div>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.home')}}" class="btn btn-orange"> الغاء</a>
									<button type="submit" class="btn btn-blue addButton">حفظ</button>
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