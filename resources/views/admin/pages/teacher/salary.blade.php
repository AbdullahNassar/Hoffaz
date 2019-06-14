@extends('admin.layouts.master')
@section('title') 
صرف سلفة 
@endsection 
@section('content')
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box transparent">
					<div class="box-header border">
						<h3 class="box-title"><span class="semi-bold">صرف سلفة</span></h3>
						<div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-chevron-down fa-minus"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
							<a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
							<a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<br>
					<form class="form-1 fl-form" action="{{route('admin.part.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
						<div class="box-body">
							<div class="row form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="select-1">الموظف</label>
										<select name="teacher" id="select-1" class="form-control" style="width: 100%; text-align: right;">
                                            @foreach($teachers as $teacher)
											    <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="select-2">السنة</label>
                                        <select name="year" id="select-2" class="form-control" style="width: 100%; text-align: right;">
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                            <option value="2036">2036</option>
                                            <option value="2037">2037</option>
                                            <option value="2038">2038</option>
                                            <option value="2039">2039</option>
                                            <option value="2040">2040</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="select-3">الشهر</label>
                                        <select name="month" id="select-3" class="form-control" style="width: 100%; text-align: right;">
											<option value="January">يناير</option>
                                            <option value="February">فبراير</option>
                                            <option value="March">مارس</option>
                                            <option value="April">ابريل</option>
                                            <option value="May">مايو</option>
                                            <option value="June">يونيو</option>
                                            <option value="July">يوليو</option>
                                            <option value="August">أغسطس</option>
                                            <option value="September">سبتمبر</option>
                                            <option value="October">أكتوبر</option>
                                            <option value="November">نوفمبر</option>
                                            <option value="December">ديسمبر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="input-1">السلفة</label>
										<input name="part" id="input-1" type="number" class="form-control">
									</div>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.box-body -->
						<div class="box-footer transparent"> <a href="{{route('admin.teachers')}}" class="btn btn-orange">  أغلق</a>
							<button type="submit" class="btn btn-blue addButton">حفظ</button>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
</div>
<!-- Content page End -->
@endsection