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
						<h3 class="box-title"><span class="semi-bold">تعديل بيانات الحلقة</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
          @foreach($groups as $group)
						<form class="form-1 fl-form" action="{{route('admin.courses.edit' , ['id' => $group->id])}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="input-1">اسم الحلقة</label>
										<input value="{{$group->course_name}}" name="name" class="form-control" id="input-1" type="text">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-2">الحد الأقصى لعدد طلاب الحلقة</label>
										<input name="max_num" value="{{$group->max_num}}" class="form-control" id="input-2" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="select-3">المركز</label>
										<select id="select-3" name="center_id" class="form-control">
                    <option value="{{$group->center_id}}" selected>{{$group->center_name}}</option>
                    @foreach($centers as $center)
											<option value="{{$center->id}}">{{$center->center_name}}</option>@endforeach</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="select-4">المرحلة</label>
										<select id="select-4" name="level_id" class="form-control">
                    <option value="{{$group->level_id}}" selected>{{$group->level_name}}</option>
                    @foreach($levels as $level)
											<option value="{{$level->id}}">{{$level->level_name}}</option>@endforeach</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="input-5">المواعيد</label>
										<textarea name="time" class="form-control" id="input-5" type="text">{{$group->time}}</textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5> مواد الحلقة</h5>
										@foreach($materials as $material)
										<label class="checkbox-inline">{{$material->material_name}}</label>
										<input class="minimal" name="m{{$loop->index + 1}}" type="checkbox" value="{{$material->id}}">@endforeach
                  </div>
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
                            <button class="btn btn-orange btndelet" data-url="{{ route('admin.coursematerial.delete' , ['id' => $mat->id]) }}" >
                                حذف
                            </button>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
								</div>
								<div class="col-md-12">
									<br> <a href="{{route('admin.courses')}}" class="btn btn-orange"> الغاء</a>
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