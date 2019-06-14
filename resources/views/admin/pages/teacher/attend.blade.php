@extends('admin.layouts.master')
@section('title') 
تسجيل الحضور 
@endsection 
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="box transparent">
            <div class="box-header border">
              <h3 class="box-title"><span class="semi-bold">تسجيل الحضور</span></h3>
              <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
                <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <br>
			<form class="form-1 fl-form" action="{{route('admin.teachers.attend')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                {{ csrf_field() }}
				<div class="box-body">
                    <div class="row form-row">
                        <div class="col-md-6">
							<div class="form-group">
                                <h5>الموظف</h5>
								<select name="teacher" class="form-control select2">
                                    <option>             </option>
                                    @foreach($teachers as $teacher)
										<option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
                                <h5>الوقت</h5>
								<input name="time" type="time" value="{{$now->toTimeString()}}" class="form-control">
								<input name="day" type="hidden" value="{{(new DateTime($now))->format('l')}}" class="form-control">
								<input name="month" type="hidden" value="{{(new DateTime($now))->format('F')}}" class="form-control">
								<input name="year" type="hidden" value="{{(new DateTime($now))->format('Y')}}" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
                                <h5>التاريخ</h5>
								<input name="date" type="date" value="{{$now->toDateString()}}" class="form-control">
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