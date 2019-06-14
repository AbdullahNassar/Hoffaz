@extends('admin.layouts.master') 
@section('title')
 المواد 
@endsection
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold">اضافة بنود المواد</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
						<form class="form-1 fl-form" action="{{route('admin.percent.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="select-4">المادة</label>
                                        <select id="select-4" name="material_id" class="form-control" data-placeholder="اختر طالب" style="width: 100%; text-align: right;">
                                            <option>المادة</option>
                                            @foreach($materials as $material)
                                                <option value="{{$material->id}}">{{$material->material_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-1">اسم البند</label>
										<input name="name" class="form-control" id="input-1" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-1">درجة البند</label>
										<input name="grade" class="form-control" id="input-1" type="number">
									</div>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.materials')}}" class="btn btn-primary btn-orange"> الغاء</a>
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