@extends('admin.layouts.master') 
@section('title')
 الحلقات 
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold">اضافة حلقة جديد</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
						<form class="form-1 fl-form" action="{{route('admin.courses.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-1">اسم الحلقة</label>
										<input name="name" class="form-control" id="input-1" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-2">الحد الأقصى لعدد طلاب الحلقة</label>
										<input name="max_num" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="select-3">المركز</label>
										<select id="select-3" name="center_id" class="form-control">@foreach($centers as $center)
											<option value="{{$center->id}}">{{$center->center_name}}</option>@endforeach</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="select-4">المرحلة</label>
										<select id="select-4" name="level_id" class="form-control">@foreach($levels as $level)
											<option value="{{$level->id}}">{{$level->level_name}}</option>@endforeach</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="input-5">المواعيد</label>
										<textarea name="time" class="form-control" id="input-5" type="text"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5> مواد الحلقة</h5>
										@foreach($materials as $material)
										<label class="checkbox-inline">{{$material->material_name}}</label>
										<input class="minimal" name="m{{$loop->index + 1}}" type="checkbox" value="{{$material->id}}">@endforeach
                                    </div>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.courses')}}" class="btn btn-primary btn-orange"> الغاء</a>
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