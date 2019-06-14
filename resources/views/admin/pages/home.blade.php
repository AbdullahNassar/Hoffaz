@extends('admin.layouts.master')
@section('title')
حفاظ
@endsection
@section('content')
<!-- Content page Start -->
  <div class="content-wrapper">
    <section class="content">
    @if(Auth::guard('admins')->user()->type == 'admin')
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تسجيل تقييم الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form action="{{route('admin.grades.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                        <div class="box-body">
                        <div class="col-md-3">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="center" name="center_id" required>
                                <option >المركز</option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <h5>الطالب</h5>
                            <select class="form-control select2" id="student" name="student_id">
                                <option >الطالب</option>
                            </select>
                        </div>   
                        </div>
                        <div class="col-md-3">                   
                        <div class="form-group">
                            <h5>المادة</h5>
                            <select class="form-control select2" id="material" name="material_id">
                                <option >المادة</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <h5>تاريخ التقييم</h5>
                                <input name="date" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered text-center" id="percent">
                                <tbody>
                                    <tr>
                                        <th>البند</th>
                                        <th>الدرجة</th>
                                    </tr>
                                </tbody>
                        </table>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('admin.home')}}" class="btn btn-orange">  الغاء</a>
                            <button type="submit" class="btn btn-blue addButton">  حفظ</button>
                        </div>
                    </form>
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->
 
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تسجيل حضور الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form action="{{route('admin.absent.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                        <div class="box-body">
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="cent" name="center_id">
                                <option >المركز</option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الحلقة</h5>
                            <select class="form-control select2" id="group" name="course_id">
                                <option >الحلقة</option>
                            </select>
                        </div>     
                        </div>
                        <div class="col-md-4">                 
                        <div class="form-group">
                                <h5>تاريخ التقييم</h5>
                                <input name="date" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered text-center">
                                <tbody id="absent">
                                    <tr><td>الطالب</td><td>الحالة</td><td></td></tr>
                                    </tbody>
                                </table>
                        </table>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('admin.home')}}" class="btn btn-orange">  أغلق</a>
                            <button type="submit" class="btn btn-blue addButton">  حفظ</button>
                        </div>
                    </form>
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> دفع مديونيات الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form action="{{route('admin.payms.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                        <div class="box-body">
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="center_pay" name="center_id">
                                <option >            </option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الحلقة</h5>
                            <select class="form-control select2" id="course_pay" name="course_id">
                            </select>
                        </div>   
                        </div>
                        <div class="col-md-4">                   
                        <div class="form-group">
                                <h5>الطالب</h5>
                                <select class="form-control select2" id="student_pay" name="student_id">
                            </select>
                        </div>
                        </div>
                        
                        <div class="col-md-4">
                        <div class="form-group">
                                <h5>المبلغ</h5>
                                <input name="amount" type="number" class="form-control" placeholder="أدخل المبلغ المراد دفعه">
                        </div>
                        </div>
                        
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>السنة</h5>
                            <select name="year" id="year" class="form-control select2" data-placeholder="اختر السنة" style="width: 100%; text-align: right;">
                                <option>               </option>
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
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الشهر</h5>
                            <select name="month" id="mon" class="form-control select2" data-placeholder="اختر الشهر" style="width: 100%; text-align: right;">
                                <option>               </option>
                                <option value="1">يناير</option>
                                <option value="2">فبراير</option>
                                <option value="3">مارس</option>
                                <option value="4">ابريل</option>
                                <option value="5">مايو</option>
                                <option value="6">يونيو</option>
                                <option value="7">يوليو</option>
                                <option value="8">أغسطس</option>
                                <option value="9">سبتمبر</option>
                                <option value="10">أكتوبر</option>
                                <option value="11">نوفمبر</option>
                                <option value="12">ديسمبر</option>
                            </select>
                            <input name="date" type="hidden" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group" id="price">

                        </div>
                        <div class="form-group" id="date">

                        </div>
                        <div class="form-group" id="amount">

                        </div>
                        <div class="form-group" id="remain">

                        </div>
                        <div class="form-group" id="refund">

                        </div>
                        </div>
                        
                        <div class="col-md-12">
                            <a href="{{route('admin.home')}}" class="btn btn-orange">  الغاء</a>
                            <button type="submit" class="btn btn-blue addButton">  حفظ</button>
                        </div>
                    </form>
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <!--<div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تقارير عمليات الدفع</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                        <div class="box-body">
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="center_pays" name="center_id">
                                <option >            </option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الحلقة</h5>
                            <select class="form-control select2" id="course_pays" name="course_id">
                            </select>
                        </div>   
                        </div>
                        <div class="col-md-4">                   
                        <div class="form-group">
                                <h5>الطالب</h5>
                                <select class="form-control select2" id="student_pays" name="student_id">
                            </select>
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>السنة</h5>
                            <select name="year" id="years" class="form-control select2" data-placeholder="اختر السنة" style="width: 100%; text-align: right;">
                                <option>               </option>
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
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الشهر</h5>
                            <select name="month" id="month" class="form-control select2" data-placeholder="اختر الشهر" style="width: 100%; text-align: right;">
                                <option>               </option>
                                <option value="1">يناير</option>
                                <option value="2">فبراير</option>
                                <option value="3">مارس</option>
                                <option value="4">ابريل</option>
                                <option value="5">مايو</option>
                                <option value="6">يونيو</option>
                                <option value="7">يوليو</option>
                                <option value="8">أغسطس</option>
                                <option value="9">سبتمبر</option>
                                <option value="10">أكتوبر</option>
                                <option value="11">نوفمبر</option>
                                <option value="12">ديسمبر</option>
                            </select>
                            <input name="date" type="hidden" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <table class="table table-striped table-bordered text-center">
                                <tbody id="process">
                                    <tr><td>التاريخ</td><td>المبلغ</td></tr>
                                </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                  </div> 
                </div>
        </div> -->

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تقارير حضور الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <div class="box-body">
                    <div class="col-md-3"> 
                      <div class="form-group">
                      <h5>المركز</h5>
                        <select class="form-control select2" id="cen" name="center_id">
                            <option >المركز</option>
                            @foreach($centers as $center)
                                <option value="{{$center->id}}">{{$center->center_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="col-md-3"> 
                      <div class="form-group">
                      <h5>الحلقة</h5>
                        <select class="form-control select2" id="groups" name="course_id">
                            <option >الحلقة</option>
                        </select>
                      </div>      
                      </div>
                      <div class="col-md-3">                 
                      <div class="form-group">
                            <h5>من</h5>
                            <input id="dfrom" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      </div>
                      <div class="col-md-3"> 
                      <div class="form-group">
                            <h5>الى</h5>
                            <input id="dto" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      </div>
                      <div class="col-md-12"> 
                        <table class="table table-striped table-bordered text-center" id="tables">
                            <tbody id="absents">
                                <tr></tr>
                            </tbody>
                      </table>
                    </div>
                    
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تقارير درجات الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <div class="box-body">
                    <div class="col-md-4"> 
                      <div class="form-group">
                        <select class="form-control select2" id="centers" name="center_id">
                            <option >المركز</option>
                            @foreach($centers as $center)
                                <option value="{{$center->id}}">{{$center->center_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                        <select class="form-control select2" id="courses" name="course_id">
                            <option >الحلقة</option>
                        </select>
                      </div>     
                      </div>
                        <div class="col-md-4">                  
                      <div class="form-group">
                        <select class="form-control select2" id="students" name="student_id">
                            <option >الطالب</option>
                        </select>
                      </div>
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                      <h5>المادة</h5>
                        <select class="form-control select2" id="materials" name="material_id">
                            <option >المادة</option>
                        </select>
                      </div>
                      <!--<div class="form-group">
                      <h5>.</h5>
                      <button ng-click="exportToPdf()" class="btn btn-blue">PDF</button>
                      </div>
                      <div class="form-group">
                      <h5>.</h5>
                      <button ng-click="exportToExcel('#customers')" class="btn btn-blue">Excel</button>
                      </div>-->
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                            <h5>من</h5>
                            <input id="from" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                            <h5>الى</h5>
                            <input id="to" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      
                      </div>
                        <div class="col-md-12"> 
                        <table class="table table-striped table-bordered text-center" id="tables">
                            <thead><tr><th>المادة</th><th>الدرجة</th><th>التقدير</th><th>التاريخ</th><th>عرض</th></tr></thead>
                            <tbody id="per">
                                <tr>
                                    
                                </tr>
                            </tbody>
                      </table>
                    </div>
                    <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تفاصيل المادة</h4>
                        </div>
                        <div class="modal-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="percents">
                            <tbody>
                            <tr>
                                <th>البند</th>
                                <th>الدرجة</th>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-orange pull-left" data-dismiss="modal">اغلق</button>
                        </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> صرف رواتب الموظفين </h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form class="form-1 fl-form" action="{{route('admin.salaries.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
						<div class="box-body">
							<div class="row form-row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>المدرس</h5>
										<select name="teacher" id="teacher_salary" class="form-control select2" style="width: 100%; text-align: right;">
                                            <option>                </option>
                                            @foreach($teachers as $teacher)
											    <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>السنة</h5>
                                        <select name="year" id="year_salary" class="form-control select2" style="width: 100%; text-align: right;">
                                            <option>                </option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>الشهر</h5>
                                        <select name="month" id="month_salary" class="form-control select2" style="width: 100%; text-align: right;">
                                            <option>                </option>
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
                                <div class="col-md-4">
									<div class="form-group">
										<h5>الراتب الأساسى</h5>
										<input name="salary" id="salary" type="number" class="form-control" readonly>
                                        <input id="thour" type="hidden">
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>عدد ايام الحضور</h5>
										<input name="days" id="days_salary" type="number" class="form-control" readonly>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<h5>الخصومات</h5>
										<input name="minus" id="minus_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>الساعات الاضافية</h5>
										<input name="hours" id="hours_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>المبلغ الاضافى</h5>
										<input name="bonus" id="bonus_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>السلف</h5>
										<input name="parts" id="parts_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label class="checkbox-inline">تم صرف الراتب ؟</label>
										<input name="status" class="minimal" type="checkbox" class="form-control">
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
                                        <a href="{{route('admin.teachers')}}" class="btn btn-orange">  أغلق</a>
                                        <button type="submit" class="btn btn-blue addButton">حفظ</button>
									</div>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.box-body -->
					</form>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">الموظفين</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.teachers')}}"> <i class="fa fa-user-circle-o"></i>
                                <p>عرض بيانات الموظفين</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">الطلاب</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.students')}}"> <i class="fa fa-graduation-cap"></i>
                                <p>عرض بيانات الطلاب</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">أولياء الأمور</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.guardians')}}"> <i class="fa fa-users"></i>
                                <p>عرض بيانات أولياء الأمور</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">المواد الدراسية</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.materials')}}"> <i class="fa fa-leanpub"></i>
                                <p>عرض بيانات المواد الدراسية</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">المراكز</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.centers')}}"> <i class="fa fa-building"></i>
                                <p>عرض بيانات المراكز</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">المواصلات</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.transportations')}}"> <i class="fa fa-bus"></i>
                                <p>عرض بيانات المواصلات</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">الحلقات</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.courses')}}"> <i class="fa fa-pie-chart"></i>
                                <p>عرض بيانات الحلقات</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box no-border col-md-3">
                    <div class="tanseeq">
                        <div class="box-header">
                            <h3 class="box-title">المستويات</h3>
                            <div class="box-tools pull-right"> <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                                <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="{{route('admin.levels')}}"> <i class="fa fa-bar-chart"></i>
                                <p>عرض بيانات المستويات</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::guard('admins')->user()->type == 'teacher')
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تسجيل تقييم الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form action="{{route('admin.grades.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                        <div class="box-body">
                        <div class="col-md-3">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="center" name="center_id" required>
                                <option >المركز</option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <h5>الطالب</h5>
                            <select class="form-control select2" id="student" name="student_id">
                                <option >الطالب</option>
                            </select>
                        </div>   
                        </div>
                        <div class="col-md-3">                   
                        <div class="form-group">
                            <h5>المادة</h5>
                            <select class="form-control select2" id="material" name="material_id">
                                <option >المادة</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <h5>تاريخ التقييم</h5>
                                <input name="date" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered text-center" id="percent">
                                <tbody>
                                    <tr>
                                        <th>البند</th>
                                        <th>الدرجة</th>
                                    </tr>
                                </tbody>
                        </table>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('admin.home')}}" class="btn btn-orange">  الغاء</a>
                            <button type="submit" class="btn btn-blue addButton">  حفظ</button>
                        </div>
                    </form>
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->
 
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تسجيل حضور الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form action="{{route('admin.absent.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                        <div class="box-body">
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="cent" name="center_id">
                                <option >المركز</option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الحلقة</h5>
                            <select class="form-control select2" id="group" name="course_id">
                                <option >الحلقة</option>
                            </select>
                        </div>     
                        </div>
                        <div class="col-md-4">                 
                        <div class="form-group">
                                <h5>تاريخ التقييم</h5>
                                <input name="date" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered text-center">
                                <tbody id="absent">
                                    <tr><td>الطالب</td><td>الحالة</td><td></td></tr>
                                    </tbody>
                                </table>
                        </table>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('admin.home')}}" class="btn btn-orange">  أغلق</a>
                            <button type="submit" class="btn btn-blue addButton">  حفظ</button>
                        </div>
                    </form>
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تقارير حضور الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <div class="box-body">
                    <div class="col-md-3"> 
                      <div class="form-group">
                      <h5>المركز</h5>
                        <select class="form-control select2" id="cen" name="center_id">
                            <option >المركز</option>
                            @foreach($centers as $center)
                                <option value="{{$center->id}}">{{$center->center_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="col-md-3"> 
                      <div class="form-group">
                      <h5>الحلقة</h5>
                        <select class="form-control select2" id="groups" name="course_id">
                            <option >الحلقة</option>
                        </select>
                      </div>      
                      </div>
                      <div class="col-md-3">                 
                      <div class="form-group">
                            <h5>من</h5>
                            <input id="dfrom" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      </div>
                      <div class="col-md-3"> 
                      <div class="form-group">
                            <h5>الى</h5>
                            <input id="dto" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      </div>
                      <div class="col-md-12"> 
                        <table class="table table-striped table-bordered text-center" id="tables">
                            <tbody id="absents">
                                <tr></tr>
                            </tbody>
                      </table>
                    </div>
                    
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تقارير درجات الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <div class="box-body">
                    <div class="col-md-4"> 
                      <div class="form-group">
                        <select class="form-control select2" id="centers" name="center_id">
                            <option >المركز</option>
                            @foreach($centers as $center)
                                <option value="{{$center->id}}">{{$center->center_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                        <select class="form-control select2" id="courses" name="course_id">
                            <option >الحلقة</option>
                        </select>
                      </div>     
                      </div>
                        <div class="col-md-4">                  
                      <div class="form-group">
                        <select class="form-control select2" id="students" name="student_id">
                            <option >الطالب</option>
                        </select>
                      </div>
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                      <h5>المادة</h5>
                        <select class="form-control select2" id="materials" name="material_id">
                            <option >المادة</option>
                        </select>
                      </div>
                      <!--<div class="form-group">
                      <h5>.</h5>
                      <button ng-click="exportToPdf()" class="btn btn-blue">PDF</button>
                      </div>
                      <div class="form-group">
                      <h5>.</h5>
                      <button ng-click="exportToExcel('#customers')" class="btn btn-blue">Excel</button>
                      </div>-->
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                            <h5>من</h5>
                            <input id="from" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      </div>
                        <div class="col-md-4"> 
                      <div class="form-group">
                            <h5>الى</h5>
                            <input id="to" type="date" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                      </div>
                      
                      </div>
                        <div class="col-md-12"> 
                        <table class="table table-striped table-bordered text-center" id="tables">
                            <thead><tr><th>المادة</th><th>الدرجة</th><th>التقدير</th><th>التاريخ</th><th>عرض</th></tr></thead>
                            <tbody id="per">
                                <tr>
                                    
                                </tr>
                            </tbody>
                      </table>
                    </div>
                    <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تفاصيل المادة</h4>
                        </div>
                        <div class="modal-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="percents">
                            <tbody>
                            <tr>
                                <th>البند</th>
                                <th>الدرجة</th>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-orange pull-left" data-dismiss="modal">اغلق</button>
                        </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->
    @elseif(Auth::guard('admins')->user()->type == 'accountant')
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> دفع مديونيات الطلاب</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form action="{{route('admin.payms.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                        <div class="box-body">
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="center_pay" name="center_id">
                                <option >            </option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الحلقة</h5>
                            <select class="form-control select2" id="course_pay" name="course_id">
                            </select>
                        </div>   
                        </div>
                        <div class="col-md-4">                   
                        <div class="form-group">
                                <h5>الطالب</h5>
                                <select class="form-control select2" id="student_pay" name="student_id">
                            </select>
                        </div>
                        </div>
                        
                        <div class="col-md-4">
                        <div class="form-group">
                                <h5>المبلغ</h5>
                                <input name="amount" type="number" class="form-control" placeholder="أدخل المبلغ المراد دفعه">
                        </div>
                        </div>
                        
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>السنة</h5>
                            <select name="year" id="year" class="form-control select2" data-placeholder="اختر السنة" style="width: 100%; text-align: right;">
                                <option>               </option>
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
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الشهر</h5>
                            <select name="month" id="mon" class="form-control select2" data-placeholder="اختر الشهر" style="width: 100%; text-align: right;">
                                <option>               </option>
                                <option value="1">يناير</option>
                                <option value="2">فبراير</option>
                                <option value="3">مارس</option>
                                <option value="4">ابريل</option>
                                <option value="5">مايو</option>
                                <option value="6">يونيو</option>
                                <option value="7">يوليو</option>
                                <option value="8">أغسطس</option>
                                <option value="9">سبتمبر</option>
                                <option value="10">أكتوبر</option>
                                <option value="11">نوفمبر</option>
                                <option value="12">ديسمبر</option>
                            </select>
                            <input name="date" type="hidden" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group" id="price">

                        </div>
                        <div class="form-group" id="date">

                        </div>
                        <div class="form-group" id="amount">

                        </div>
                        <div class="form-group" id="remain">

                        </div>
                        <div class="form-group" id="refund">

                        </div>
                        </div>
                        
                        <div class="col-md-12">
                            <a href="{{route('admin.home')}}" class="btn btn-orange">  الغاء</a>
                            <button type="submit" class="btn btn-blue addButton">  حفظ</button>
                        </div>
                    </form>
                    </div>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> تقارير عمليات الدفع</h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                        <div class="box-body">
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>المركز</h5>
                            <select class="form-control select2" id="center_pays" name="center_id">
                                <option >            </option>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}">{{$center->center_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الحلقة</h5>
                            <select class="form-control select2" id="course_pays" name="course_id">
                            </select>
                        </div>   
                        </div>
                        <div class="col-md-4">                   
                        <div class="form-group">
                                <h5>الطالب</h5>
                                <select class="form-control select2" id="student_pays" name="student_id">
                            </select>
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>السنة</h5>
                            <select name="year" id="years" class="form-control select2" data-placeholder="اختر السنة" style="width: 100%; text-align: right;">
                                <option>               </option>
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
                        <div class="col-md-4">
                        <div class="form-group">
                            <h5>الشهر</h5>
                            <select name="month" id="month" class="form-control select2" data-placeholder="اختر الشهر" style="width: 100%; text-align: right;">
                                <option>               </option>
                                <option value="1">يناير</option>
                                <option value="2">فبراير</option>
                                <option value="3">مارس</option>
                                <option value="4">ابريل</option>
                                <option value="5">مايو</option>
                                <option value="6">يونيو</option>
                                <option value="7">يوليو</option>
                                <option value="8">أغسطس</option>
                                <option value="9">سبتمبر</option>
                                <option value="10">أكتوبر</option>
                                <option value="11">نوفمبر</option>
                                <option value="12">ديسمبر</option>
                            </select>
                            <input name="date" type="hidden" class="form-control" style="text-align: right;" value="{{$now->toDateString()}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <table class="table table-striped table-bordered text-center">
                                <tbody id="process">
                                    <tr><td>التاريخ</td><td>المبلغ</td></tr>
                                </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                  </div> 
                </div>
        </div> 

        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="box cases collapsed-box">
                    <div class="box-header">
                      <h3 class="box-title"><i class="fa fa-edit"></i> صرف رواتب الموظفين </h3>
                      <div class="box-tools pull-right">
                        <a class="btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></a>
                        <a class="btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <form class="form-1 fl-form" action="{{route('admin.salaries.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
						<div class="box-body">
							<div class="row form-row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>المدرس</h5>
										<select name="teacher" id="teacher_salary" class="form-control select2" style="width: 100%; text-align: right;">
                                            <option>                </option>
                                            @foreach($teachers as $teacher)
											    <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>السنة</h5>
                                        <select name="year" id="year_salary" class="form-control select2" style="width: 100%; text-align: right;">
                                            <option>                </option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>الشهر</h5>
                                        <select name="month" id="month_salary" class="form-control select2" style="width: 100%; text-align: right;">
                                            <option>                </option>
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
                                <div class="col-md-4">
									<div class="form-group">
										<h5>الراتب الأساسى</h5>
										<input name="salary" id="salary" type="number" class="form-control" readonly>
                                        <input id="thour" type="hidden">
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>عدد ايام الحضور</h5>
										<input name="days" id="days_salary" type="number" class="form-control" readonly>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<h5>الخصومات</h5>
										<input name="minus" id="minus_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>الساعات الاضافية</h5>
										<input name="hours" id="hours_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>المبلغ الاضافى</h5>
										<input name="bonus" id="bonus_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<h5>السلف</h5>
										<input name="parts" id="parts_salary" type="number" class="form-control" readonly>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label class="checkbox-inline">تم صرف الراتب ؟</label>
										<input name="status" class="minimal" type="checkbox" class="form-control">
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
                                        <a href="{{route('admin.teachers')}}" class="btn btn-orange">  أغلق</a>
                                        <button type="submit" class="btn btn-blue addButton">حفظ</button>
									</div>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.box-body -->
					</form>
                  </div> 
                </div><!-- /.col -->
        </div><!-- /.row -->
    @endif
        
    </section>
  </div>
  <!-- Content page End -->
@endsection