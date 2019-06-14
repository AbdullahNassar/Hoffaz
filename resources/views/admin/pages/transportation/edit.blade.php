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
						<h3 class="box-title"><span class="semi-bold">تعديل المواصلات</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
          @foreach($transportations as $transportation)
						<form class="form-1 fl-form" action="{{ route('admin.transportations.edit' , ['id' => $transportation->id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-2">محطة الوصول</label>
										<input name="arrival" value="{{$transportation->arrival}}" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-3">محطة الانطلاق</label>
										<input name="launch" value="{{$transportation->launch}}" class="form-control" id="input-3" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="select-3">المركز</label>
										<select id="select-3" name="center" class="form-control">
                        <option value="{{$transportation->center_id}}" selected>{{$transportation->center_name}}</option>
                      @foreach($centers as $center)
											  <option value="{{$center->id}}">{{$center->center_name}}</option>
                      @endforeach
                    </select>
									</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label for="input-2">رقم الاوتوبيس</label>
										<input name="bus" value="{{$transportation->bus}}" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-3">قيمة الاشتراك</label>
										<input name="price" value="{{$transportation->price}}" class="form-control" id="input-3" type="text">
									</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label for="select-3">المشرف</label>
										<select id="select-3" name="manager" class="form-control">
                        <option value="{{$transportation->manager_id}}" selected>{{$transportation->teacher_name}}</option>
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
                    <input class="minimal" name="sat" type="checkbox" @if($transportation->sat == 1) checked @endif>
                    <label class="checkbox-inline">الأحد</label>
                    <input class="minimal" name="sun" type="checkbox" @if($transportation->sun == 1) checked @endif>
                    <label class="checkbox-inline">الاثنين</label>
                    <input class="minimal" name="mon" type="checkbox" @if($transportation->mon == 1) checked @endif>
                    <label class="checkbox-inline">الثلاثاء</label>
                    <input class="minimal" name="tue" type="checkbox" @if($transportation->tue == 1) checked @endif>
                    <label class="checkbox-inline">الأربعاء</label>
                    <input class="minimal" name="wed" type="checkbox" @if($transportation->wed == 1) checked @endif>
                    <label class="checkbox-inline">الخميس</label>
                    <input class="minimal" name="thu" type="checkbox" @if($transportation->thu == 1) checked @endif>
                    <label class="checkbox-inline">الجمعة</label>
                    <input class="minimal" name="fri" type="checkbox" @if($transportation->fri == 1) checked @endif>
                  </div>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.transportations')}}" class="btn btn-orange"> الغاء</a>
									<button type="submit" class="btn btn-blue addButton">حفظ</button>
								</div>
							</div>
						</form>
            @endforeach
					</div>
				</div>
			</div>
	</section>
</div>
<!-- Content page End -->
@endsection