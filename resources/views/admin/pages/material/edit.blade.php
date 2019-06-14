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
						<h3 class="box-title"><span class="semi-bold">تعديل المادة</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>@foreach($materials as $material)
					<div class="box-body" style="display: block;">
						<form class="form-1 fl-form" action="{{route('admin.materials.edit' , ['id' => $material->id])}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								<div class="col-md-6">
									<h4>بيانات المادة</h4>
									<div class="form-group">
										<label for="input-1">اسم المادة</label>
										<input value="{{$material->material_name}}" name="name" class="form-control" id="input-1" type="text">
									</div>
									<div class="form-group">
										<label for="input-2">مصروفات المادة</label>
										<input value="{{$material->price}}" name="price" class="form-control" id="input-2" type="number">
									</div>
									<div class="form-group">
										<label for="input-4">درجة النجاح</label>
										<input value="{{$material->success}}" name="success" class="form-control" id="input-4" type="number">
									</div>
									<div class="form-group">
										<label for="select-4">المرحلة</label>
										<select id="select-4" name="level_id" class="form-control">
											<option value="{{$material->level_id}}" selected>{{$material->level_name}}</option>@foreach($levels as $level)
											<option value="{{$level->id}}">{{$level->level_name}}</option>@endforeach</select>
									</div>
								</div>
								<div class="col-md-6">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>التقدير</th>
												<th>النسبة</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>امتياز</td>
												<td>
													<input name="p1" value="{{$material->p1}}" type="text" size="3">%</td>
											</tr>
											<tr>
												<td>جيد جدا</td>
												<td>
													<input name="p2" value="{{$material->p2}}" type="text" size="3">%</td>
											</tr>
											<tr>
												<td>جيد</td>
												<td>
													<input name="p3" value="{{$material->p3}}" type="text" size="3">%</td>
											</tr>
											<tr>
												<td>مقبول</td>
												<td>
													<input name="p4" value="{{$material->p4}}" type="text" size="3">%</td>
											</tr>
											<tr>
												<td>ضعيف (<small>أقل من</small>)</td>
												<td>
													<input name="p5" value="{{$material->p5}}" type="text" size="3">%</td>
											</tr>
											</tfoot>
									</table>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5> مدرسين المادة</h5>
										@foreach($teachers as $teacher)
										<label class="checkbox-inline">{{$teacher->teacher_name}}</label>
										<input class="minimal" name="t{{$loop->index + 1}}" type="checkbox" value="{{$teacher->id}}">@endforeach</div>
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>الترتيب</th>
												<th>المدرس</th>
												<th>العمليات</th>
											</tr>
										</thead>
										<tbody>@foreach($teachs as $teach)
											<tr>
												<td>{{$loop->index + 1}}</td>
												<td>{{$teach->teacher_name}}</td>
												<td>
													<button class="btn btn-orange btndelet" data-url="{{ route('admin.tcourse.delete' , ['id' => $teach->id]) }}">حذف</button>
												</td>
											</tr>@endforeach</tfoot>
									</table>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5> حلقات المادة</h5>
										@foreach($courses as $course)
										<label class="checkbox-inline">{{$course->course_name}}</label>
										<input class="minimal" name="c{{$loop->index + 1}}" type="checkbox" value="{{$course->id}}">@endforeach</div>
								</div>
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>الترتيب</th>
											<th>الحلقة</th>
											<th>العمليات</th>
										</tr>
									</thead>
									<tbody>@foreach($cors as $cor)
										<tr>
											<td>{{$loop->index + 1}}</td>
											<td>{{$cor->course_name}}</td>
											<td>
												<button class="btn btn-orange btndelet" data-url="{{ route('admin.mcourse.delete' , ['id' => $cor->id]) }}">حذف</button>
											</td>
										</tr>@endforeach</tfoot>
								</table>
							</div>
							<div class="col-md-12">
								<br> <a href="{{route('admin.materials')}}" class="btn btn-orange"> الغاء</a>
								<button type="submit" class="btn btn-blue btn-blue addButton">حفظ</button>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold"> ملفات المادة</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<div class="box-body" style="display: block;">
						<form class="form-1 fl-form" action="{{route('admin.materialDoc.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">{{ csrf_field() }}
							<div class="row form-row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="file" name="image2" placeholder="حمل  ملف">
										<input type="hidden" name="material_id" value="{{$material->id}}">
									</div>
									<div class="form-group">
										<br> <a href="{{route('admin.home')}}" class="btn btn-primary btn-orange"> الغاء</a>
										<button type="submit" class="btn btn-blue btn-blue addButton">حفظ</button>
									</div>
								</div>
								<div class="col-md-6">
									<table class="table table-striped">
										<tbody>
											<tr>
												<th style="width: 10px">#</th>
												<th>الملف</th>
												<th>العمليات</th>
											</tr>@foreach($docs as $doc)
											<tr>
												<td>{{$loop->index + 1}}.</td>
												<td><a href=""><i class="fa fa-file-text"></i>    {{$doc->file}}</a>
												</td>
												<td>	<a href="{{asset('storage/uploads/materials').'/'.$doc->file}}" class="btn btn-blue">تحميل</a>
													<button type="submit" class="btn btn-orange btndelet" data-url="{{ route('admin.materialDoc.delete' , ['id' => $doc->id]) }}">حذف</button>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold"> بنود المادة</span></h3>
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
										<label for="input-1">اسم البند</label>
										<input name="name" class="form-control" id="input-1" type="text">
										<input name="material_id" value="{{$material->id}}" type="hidden">
									</div>
									<div class="form-group">
										<label for="input-1">درجة البند</label>
										<input name="grade" class="form-control" id="input-1" type="number">
									</div>
									<div class="form-group">
										<br> <a href="{{route('admin.materials')}}" class="btn btn-primary btn-orange"> الغاء</a>
										<button type="submit" class="btn btn-blue btn-blue addButton">حفظ</button>
									</div>
								</div>
								<div class="col-md-6">
								<table class="table table-striped">
										<tbody>
											<tr>
												<th style="width: 10px">#</th>
												<th>البند</th>
												<th>الدرجة</th>
												<th>العمليات</th>
											</tr>@foreach($percents as $per)
											<tr>
												<td>{{$loop->index + 1}}.</td>
												<td>
													{{$per->percent_name}}
												</td>
												<td>
													{{$per->grade}}
												</td>
												<td>
													<button type="submit" class="btn btn-orange btndelet" data-url="{{ route('admin.percent.delete' , ['id' => $per->id]) }}">حذف</button>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
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