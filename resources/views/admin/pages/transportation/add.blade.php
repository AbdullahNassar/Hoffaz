@extends('admin.layouts.master') 
@section('title')
المواصلات 
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold">اضافة مواصلة جديدة</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
						<form class="form-1 fl-form" action="{{route('admin.transportations.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-2">محطة الوصول</label>
										<input name="arrival" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-3">محطة الانطلاق</label>
										<input name="launch" class="form-control" id="input-3" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="select-3">المركز</label>
										<select id="select-3" name="center" class="form-control">@foreach($centers as $center)
											<option value="{{$center->id}}">{{$center->center_name}}</option>@endforeach</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-2">رقم الاوتوبيس</label>
										<input name="bus" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-3">قيمة الاشتراك</label>
										<input name="price" class="form-control" id="input-3" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="select-3">المشرف</label>
										<select id="select-3" name="manager" class="form-control">
                                            @foreach($teachers as $teacher)
											<option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>الأيام</h4>
                                        <label class="checkbox-inline">السبت</label>
                                        <input class="minimal" name="sat" type="checkbox" >
                                        <label class="checkbox-inline">الأحد</label>
                                        <input class="minimal" name="sun" type="checkbox" >
                                        <label class="checkbox-inline">الاثنين</label>
                                        <input class="minimal" name="mon" type="checkbox" >
                                        <label class="checkbox-inline">الثلاثاء</label>
                                        <input class="minimal" name="tue" type="checkbox" >
                                        <label class="checkbox-inline">الأربعاء</label>
                                        <input class="minimal" name="wed" type="checkbox" >
                                        <label class="checkbox-inline">الخميس</label>
                                        <input class="minimal" name="thu" type="checkbox" >
                                        <label class="checkbox-inline">الجمعة</label>
                                        <input class="minimal" name="fri" type="checkbox" >
                                    </div>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.transportations')}}" class="btn btn-orange"> الغاء</a>
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