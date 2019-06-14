<!DOCTYPE html>
<html lang="ar">
    <head>
        <!-- Meta Tags
        ========================== -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for form layouts" name="description" />
        <meta content="" name="author" />
        <meta name="csrf_token" content="{{csrf_token()}}">


        <!-- Site Title
        ========================== -->
        <title>@yield('title')</title>
        
        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" href="{{asset('assets/admin/img/logo-mini.png')}}">

        
        <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/datatables.css')}}">
        

        <link rel="stylesheet" href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{asset('assets/admin/plugins/iCheck/all.css')}}">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{asset('assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{asset('assets/admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('assets/admin/css/select2.css')}}">  

        

        
        <link href="{{asset('assets/admin/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/admin/css/float-labels.css')}}">

        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}" id="stylesheet">

        

        

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="sidebar-mini">
    
        <div class="wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            @yield('content')
        </div>

        @yield('modals')
        @yield('templates')

        <!-- common edit modal with ajax for all project -->
        <div id="common-modal" class="modal fade" role="dialog">
                    <!-- modal -->
        </div>

        <!-- delete with ajax for all project -->
        <div id="delete-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                    </div>
        </div>
        <script id="template-modal" type="text/html" >
                    <div class = "modal-content" >
                        <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                        <div class = "modal-header" >
                            <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                            <h4 class = "modal-title bold" >هل تريد مسح العنصر ؟</h4>
                        </div>
                        <div class = "modal-body" >
                            <p >يرجى العلم بأنه سيتم حذف العنصر بكل ما يتعلق به من بيانات</p>
                        </div>
                        <div class = "modal-footer" >
                            <a
                                href = "{url}"
                                id = "delete" class = "btn btn-danger" >
                                <li class = "fa fa-trash" > </li> مسح
                            </a>

                            <button type = "button" class = "btn btn-default" data-dismiss = "modal" >
                                <li class = "fa fa-times" > </li> أغلق</button >
                        </div>
                    </div>
        </script>
                
        @include('admin.templates.alerts')
        @include('admin.templates.delete-modal')

        <form action="#" id="csrf">{!! csrf_field() !!}</form>

        <!-- Scripts
            ========================== -->
            @if(Route::currentRouteName() == 'admin.home') 
        <script src="{{asset('assets/admin/js/jQuery-2.1.4.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
        
        <!-- fullscreen -->
        <script src="{{asset('assets/admin/js/screenfull.js')}}"></script>

        <!-- text-rotator -->
        <script src="{{asset('assets/admin/js/morphext.js')}}"></script>

        <script src="{{asset('assets/admin/js/float-labels.js')}}"></script>
        <script>floatlabels = new FloatLabels( '.form-1');</script>

        <!-- Tanseeq App -->
        
        <script src="{{asset('assets/admin/js/app.min.js')}}"></script>
        
        <script>

        $(document).ready(function() {
          $('#advanced-check').change(function() {
            $('#advanced-search').toggle();
          });
        });  

        </script>


        

        <script src="{{asset('assets/admin/plugins/nicescroll/jquery.nicescroll.min.js')}}"></script>
        
        <script type="text/javascript">
          /* Nice Scroll
          ===============================*/
          $(document).ready(function () {
              
              "use strict";
              
              $("html").niceScroll({
                  scrollspeed: 60,
                  mousescrollstep: 35,
                  cursorwidth: 5,
                  cursorcolor: '#f3834e',
                  cursorborder: 'none',
                  background: 'rgb(27, 30, 36)',
                  cursorborderradius: 3,
                  autohidemode: false,
                  cursoropacitymin: 0.1,
                  cursoropacitymax: 1,
                  zindex: "999",
                  horizrailenabled: false
              });
            
          });
        </script>
        <script src="{{asset('assets/admin/plugins/bootstrap-sweetalert/sweetalert.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/js/ui-sweetalert.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/js/process.js')}}" type="text/javascript"></script> 
        

<script>
      $('#center').on('change',function(e){
        console.log(e);
        $('#course').empty();
          $('#student').empty();
          $('#material').empty();
        var student_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-student?student_id=' + student_id, function(data){

        $('#student').append('<option>             </option>')
        $.each(data, function(index, studentObj){

            $('#student').append('<option value="'+studentObj.student_id+'">'+studentObj.student_name+'</option>')
        });
        })
      })

      $('#student').on('change',function(e){
        console.log(e);

        var material_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-material?material_id=' + material_id, function(data){
          
          $('#material').empty();
          $('#material').append('<option>             </option>')
          $.each(data, function(index, materialObj){

            $('#material').append('<option value="'+materialObj.material_id+'">'+materialObj.material_name+'</option>')
          });
        })
      })

      $('#material').on('change',function(e){
        console.log(e);

        var percent_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-percent?percent_id=' + percent_id, function(data){
          
          $.each(data, function(index, percentObj){

            $('#percent').append('<tr><td>'+percentObj.percent_name+'</td><td><input name="p'+percentObj.id+'" type="text" size="3" placeholder="'+percentObj.grade+'" required></td></tr>')
          });
        })
      })
</script>

<script>
      $('#centers').on('change',function(e){
        console.log(e);

        var courses_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-courses?courses_id=' + courses_id, function(data){
          
          $('#courses').empty();
          $('#students').empty();
          $('#materials').empty();
          $('#courses').append('<option>             </option>')
          $.each(data, function(index, courseObj){
            
            $('#courses').append('<option value="'+courseObj.id+'">'+courseObj.course_name+'</option>')
          });
          
        })
      })

      $('#courses').on('change',function(e){
        console.log(e);

        var students_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-students?students_id=' + students_id, function(data){
          
          $('#students').empty();
          $('#materials').empty();
          $('#students').append('<option>             </option>')
          $.each(data, function(index, studentObj){
            $('#students').append('<option value="'+studentObj.id+'">'+studentObj.student_name+'</option>')
          });
        })
      })

      $('#students').on('change',function(e){
        console.log(e);

        var materials_id = e.target.value;

        

        $.get('../Hoffaz/admin/ajax-smaterial?materials_id=' + materials_id, function(data){

          $('#per').empty();
          var sum = 0;
          var count = 0;
          $.each(data, function(index, materialObj){
            sum = sum + Number(materialObj.total);
            count = count + 1;
            $('#per').append('<tr><td>'+materialObj.material_name+'</td><td>'+materialObj.total+'</td><td>'+materialObj.percent+'</td><td>'+materialObj.date+'</td><td><button class="btn btn-blue" id="button'+materialObj.id+'" data-toggle="modal" data-target="#modal-default">تفاصيل</button></td></tr>')
            $('#button'+materialObj.id+'').on('click',function(e){
              console.log(e);
              var p_id = materialObj.id;
              console.log(p_id);
              $.get('../Hoffaz/admin/ajax-spercent?p_id=' + p_id, function(data){
          
              $('#percents').empty();
              $('#percents').append('<tr><td>البند</td><td>الدرجة</td></tr>')
              $.each(data, function(index, percentObj){

                $('#percents').append('<tr><td>'+percentObj.percent_name+'</td><td>'+percentObj.grade+'</td></tr>')
              });
            })
            })
          });
          var total = sum / count;
          var percent = "";
          if(total >= 85 && total <= 100){
            percent = "امتياز";
          }
          if(total >= 75 && total <= 85){
            percent = "جيد جدا";
          }
          if(total >= 65 && total <= 75){
            percent = "جيد";
          }
          if(total >= 50 && total <= 65){
            percent = "مقبول";
          }
          if(total >= 45 && total <= 50){
            percent = "ضعيف";
          }
          if(total < 45){
            percent = "راسب";
          }
          $('#per').append('<tr><td>تقييم المادة = </td><td>'+total+'</td><td> التقدير = </td><td>'+percent+'</td></tr>')
        
        })

        $.get('../Hoffaz/admin/ajax-materials?materials_id=' + materials_id, function(data){
          
          $('#materials').empty();
          $('#materials').append('<option>             </option>')

          $.each(data, function(index, materialObj){

            $('#materials').append('<option value="'+materialObj.material_id+'">'+materialObj.material_name+'</option>')
            
          });
        })
      })

      $('#materials').on('change',function(e){
        console.log(e);

        var percents_id = e.target.value;
        var student_id = $('#students').val();

        $.get('../Hoffaz/admin/ajax-percents?percents_id=' + percents_id+'&student_id=' + student_id, function(data){

          $('#per').empty();
          $('#per').append('<tr><td>المادة</td><td>الدرجة</td><td>التقدير</td><td>التاريخ</td><td>عرض</td></tr>')
          var sum = 0;
          var count = 0;
          $.each(data, function(index, materialObj){
            sum = sum + Number(materialObj.total);
            count = count + 1;
            $('#per').append('<tr><td>'+materialObj.material_name+'</td><td>'+materialObj.total+'</td><td>'+materialObj.percent+'</td><td>'+materialObj.date+'</td><td><button class="btn btn-blue"  data-toggle="modal" data-target="#modal-default" id="button'+materialObj.id+'">تفاصيل</button></td></tr>')
            $('#button'+materialObj.id+'').on('click',function(e){
              console.log(e);
              var p_id = materialObj.id;
              $.get('../Hoffaz/admin/ajax-spercent?p_id=' + p_id, function(data){

                $('#percents').empty();
                $('#percents').append('<tr><td>البند</td><td>الدرجة</td></tr>')
                $.each(data, function(index, percentObj){

                  $('#percents').append('<tr><td>'+percentObj.percent_name+'</td><td>'+percentObj.grade+'</td></tr>')
                });
              })
            })
          });
          var total = sum / count;
          var percent = "";
          if(total >= 85 && total <= 100){
            percent = "امتياز";
          }
          if(total >= 75 && total <= 85){
            percent = "جيد جدا";
          }
          if(total >= 65 && total <= 75){
            percent = "جيد";
          }
          if(total >= 50 && total <= 65){
            percent = "مقبول";
          }
          if(total >= 45 && total <= 50){
            percent = "ضعيف";
          }
          if(total < 45){
            percent = "راسب";
          }
          $('#per').append('<tr><td>تقييم المادة = </td><td>'+total+'</td><td> التقدير = </td><td>'+percent+'</td></tr>')
        })
      })

      $('#from').on('change',function(e){
        console.log(e);

        var from = $('#from');
        var search = from.val();

        $.get('../Hoffaz/admin/ajax-from?from=' + search, function(data){

          $('#per').empty();
          $('#per').append('<tr><td>المادة</td><td>الدرجة</td><td>التقدير</td><td>التاريخ</td><td>عرض</td></tr>')
          $.each(data, function(index, materialObj){

            $('#per').append('<tr><td>'+materialObj.material_name+'</td><td>'+materialObj.total+'</td><td>'+materialObj.percent+'</td><td>'+materialObj.date+'</td><td><button class="btn btn-blue"  data-toggle="modal" data-target="#modal-default" id="button'+materialObj.id+'">تفاصيل</button></td></tr>')
            $('#button'+materialObj.id+'').on('click',function(e){
              console.log(e);
              var p_id = materialObj.id;
              $.get('../Hoffaz/admin/ajax-spercent?p_id=' + p_id, function(data){

                $('#percents').empty();
                $('#percents').append('<tr><td>البند</td><td>الدرجة</td></tr>')
                $.each(data, function(index, percentObj){

                  $('#percents').append('<tr><td>'+percentObj.percent_name+'</td><td>'+percentObj.grade+'</td></tr>')
                });
              })
            })
          });
        })
      })

      $('#to').on('change',function(e){
        console.log(e);
        var from = $('#from').val();
        var to = $('#to').val();

        $.get('../Hoffaz/admin/ajax-to?to=' + to +'&from=' + from, function(data){

          $('#per').empty();
          $('#per').append('<tr><td>المادة</td><td>الدرجة</td><td>التقدير</td><td>التاريخ</td><td>عرض</td></tr>')
          $.each(data, function(index, materialObj){

            $('#per').append('<tr><td>'+materialObj.material_name+'</td><td>'+materialObj.total+'</td><td>'+materialObj.percent+'</td><td>'+materialObj.date+'</td><td><button class="btn btn-blue"  data-toggle="modal" data-target="#modal-default" id="button'+materialObj.id+'">تفاصيل</button></td></tr>')
            $('#button'+materialObj.id+'').on('click',function(e){
              console.log(e);
              var p_id = materialObj.id;
              $.get('../Hoffaz/admin/ajax-spercent?p_id=' + p_id, function(data){

                $('#percents').empty();
                $('#percents').append('<tr><td>البند</td><td>الدرجة</td></tr>')
                $.each(data, function(index, percentObj){

                  $('#percents').append('<tr><td>'+percentObj.percent_name+'</td><td>'+percentObj.grade+'</td></tr>')
                });
              })
            })
          });
        })
      })
</script>
<script>
      $('#cent').on('change',function(e){
        console.log(e);

        var group_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-group?group_id=' + group_id, function(data){
          
          $('#group').empty();

          $('#group').append('<option>             </option>')
          $.each(data, function(index, groupObj){
            
            $('#group').append('<option value="'+groupObj.id+'">'+groupObj.course_name+'</option>')
          });
          
        })
      })

      $('#group').on('change',function(e){
        console.log(e);

        var student_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-student?student_id=' + student_id, function(data){
          $('#absent').empty();
          $('#absent').append('<tr><td>الطالب</td><td>الحالة</td><td></td></tr>')
          $.each(data, function(index, groupObj){
            if(groupObj.status == 1){
              $('#absent').append('<tr><td>'+groupObj.student_name+'</td><td><input name="ab'+groupObj.student_id+'" type="checkbox" checked> حاضر</td><td><input type="hidden" name="st'+groupObj.student_id+'" value="'+groupObj.student_id+'"></td></tr>')
            }else{
              $('#absent').append('<tr><td>'+groupObj.student_name+'</td><td><input name="ab'+groupObj.student_id+'" type="checkbox"> حاضر</td><td><input type="hidden" name="st'+groupObj.student_id+'" value="'+groupObj.student_id+'"></td></tr>')
            }
          });
        })
      })
</script>

<script>
      $('#cen').on('change',function(e){
        console.log(e);

        var group_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-group?group_id=' + group_id, function(data){
          
          $('#groups').empty();

          $('#groups').append('<option>             </option>')
          $.each(data, function(index, groupObj){
            
            $('#groups').append('<option value="'+groupObj.id+'">'+groupObj.course_name+'</option>')
          });
          
        })
      })
</script>



<script>
      $('#dto').on('change',function(e){
        console.log(e);

        var dfrom = $('#dfrom').val();
        var dto = $('#dto').val();

        var center = $('#cen').val();
        var course = $('#groups').val();
        $('#absents').empty();
        var col = '';
        $.get('../Hoffaz/admin/ajax-dates?dto=' + dto +'&dfrom=' + dfrom+'&center=' + center+'&course=' + course, function(data){
          col += '<tr>';
          col += '<td>الطالب</td>';
          $.each(data, function(index, dateObj){
            col += '<td>'+dateObj.date+'</td>';
          });
          col += '</tr>';
          $('#absents').append(col);
        })
        
        $.get('../Hoffaz/admin/ajax-studs?dto=' + dto +'&dfrom=' + dfrom+'&center=' + center+'&course=' + course, function(data){
          var row = '';
          $.each(data, function(index, groupObj){
            var s_id = groupObj.student_id;
            $.get('../Hoffaz/admin/ajax-dto?dto=' + dto +'&dfrom=' + dfrom+'&center=' + center+'&course=' + course+'&s_id=' + s_id, function(data){
              row += '<tr>';
              row += '<td>'+groupObj.student_name+'</td>';
              var r = '';
              $.each(data, function(index, statusObj){
                if(statusObj.status == 1){
                  r += '<td>حاضر</td>';
                }else{
                  r += '<td>غائب</td>';
                }
              });
              row += r;
              row += '</tr>';
              $('#absents').append(row);
              console.log(row);
              row = '';
            })
          });
        })
      })
</script>
<script>
      $('#center_pay').on('change',function(e){
        console.log(e);
        $('#course_pay').empty();
        $('#date').empty();
        $('#amount').empty();
        $('#remain').empty();
        $('#refund').empty();
        $('#price').empty();
        $('#student_pay').empty();
        var course_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-pcourse?course_id=' + course_id, function(data){

        $('#course_pay').append('<option>             </option>')
        $.each(data, function(index, courseObj){
            
            $('#course_pay').append('<option value="'+courseObj.id+'">'+courseObj.course_name+'</option>')
          });
        })
      })

      $('#course_pay').on('change',function(e){
        console.log(e);
        $('#date').empty();
        $('#amount').empty();
        $('#remain').empty();
        $('#refund').empty();
        $('#price').empty();
        $('#student_pay').empty();
        var student_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-pstudent?student_id=' + student_id, function(data){
          
          $('#student_pay').empty();
          $('#student_pay').append('<option>             </option>')
          $.each(data, function(index, studentObj){
            $('#student_pay').append('<option value="'+studentObj.id+'">'+studentObj.student_name+'</option>')
          });
        })
      })

      $('#student_pay').on('change',function(e){
        console.log(e);
        $('#date').empty();
        $('#amount').empty();
        $('#remain').empty();
        $('#refund').empty();
        $('#price').empty();
        var student_id = e.target.value;
        var price = 0;
        var total = 0;
        
        $.get('../Hoffaz/admin/ajax-materialprice?student_id=' + student_id, function(data){
          
          $.each(data, function(index, materialObj){
            price += Number(materialObj.price);
          });
          
          document.getElementById("price").innerHTML = '<h5>مصروفات المواد الدراسية  : <strong>'+price+'</strong></h5>';
          console.log(price);
          $.get('../Hoffaz/admin/ajax-date?student_id=' + student_id, function(data){
          
            $.each(data, function(index, matObj){
              document.getElementById("date").innerHTML = '<h5> آخر شهر تم دفعه : <strong>'+matObj.month+'/'+matObj.year+'</strong></h5>';
              if(matObj.amount > 0 && matObj.amount < price){
                document.getElementById("amount").innerHTML = '<h5> المبلغ المدفوع : <strong>'+matObj.amount+'</strong></h5>';
                total = (-2 * Number(matObj.remain)) + Number(matObj.remain);
                document.getElementById("remain").innerHTML = '<h5> المبلغ المتبقى : <strong>'+total+'</strong></h5>';
              }
              if(matObj.amount == price && matObj.remain < price){
                document.getElementById("amount").innerHTML = '<h5>آخر مبلغ تم دفعه : <strong>'+matObj.amount+'</strong></h5>';
                document.getElementById("refund").innerHTML = '<h5>الرصيد المتبقي : <strong>'+matObj.remain+'</strong></h5>';
              }
            });
          })

        })
        
      })

      $('#year').on('change',function(e){
        console.log(e);
        $('#proc').empty();
        var year = e.target.value;
        var student = $('#student_pay');
        var student_id = student.val();

        $.get('../Hoffaz/admin/ajax-process?year=' + year+'&student_id=' + student_id, function(data){
          $('#proc').append('<tr><td>التاريخ</td><td>المبلغ</td></tr>')
          $.each(data, function(index, pObj){
            $('#proc').append('<tr><td>'+pObj.date+'</td><td>'+pObj.amount+'</td></tr>')
          });
        })
      })

      $('#mon').on('change',function(e){
        console.log(e);
        $('#proc').empty();
        var month = e.target.value;
        var year = $('#year');
        var year_id = year.val();
        var student = $('#student_pay');
        var student_id = student.val();

        $.get('../Hoffaz/admin/ajax-month?year_id=' + year_id+'&student_id=' + student_id+'&month=' + month, function(data){
          $('#proc').append('<tr><td>التاريخ</td><td>المبلغ</td></tr>')
          $.each(data, function(index, pObj){
            $('#proc').append('<tr><td>'+pObj.date+'</td><td>'+pObj.amount+'</td></tr>')
          });
        })
      })

</script>

<script>
      $('#center_pays').on('change',function(e){
        console.log(e);
        $('#course_pays').empty();
        $('#student_pays').empty();
        var course_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-pcourse?course_id=' + course_id, function(data){

        $('#course_pays').append('<option>             </option>')
        $.each(data, function(index, courseObj){
            
            $('#course_pays').append('<option value="'+courseObj.id+'">'+courseObj.course_name+'</option>')
          });
        })
      })

      $('#course_pays').on('change',function(e){
        console.log(e);
        $('#student_pays').empty();
        var student_id = e.target.value;

        $.get('../Hoffaz/admin/ajax-pstudent?student_id=' + student_id, function(data){
          
          $('#student_pays').empty();
          $('#student_pays').append('<option>             </option>')
          $.each(data, function(index, studentObj){
            $('#student_pays').append('<option value="'+studentObj.id+'">'+studentObj.student_name+'</option>')
          });
        })
      })

      $('#years').on('change',function(e){
        console.log(e);
        $('#process').empty();
        var year = e.target.value;
        var student = $('#student_pays');
        var student_id = student.val();
        
        $.get('../Hoffaz/admin/ajax-process?year=' + year+'&student_id=' + student_id, function(data){
          $('#process').append('<tr><td>التاريخ</td><td>المبلغ</td></tr>')
          var total = 0;
          $.each(data, function(index, pObj){
              var c = Number(pObj.amount);
            total = total + c;
            $('#process').append('<tr><td>'+pObj.date+'</td><td>'+pObj.amount+'</td></tr>')
          });
          $('#process').append('<tr><td>اجمالى المدفوع : </td><td>'+total+'</td></tr>')
        })
      })

      $('#month').on('change',function(e){
        console.log(e);
        $('#process').empty();
        var month = e.target.value;
        var year = $('#years');
        var year_id = year.val();
        var student = $('#student_pays');
        var student_id = student.val();

        $.get('../Hoffaz/admin/ajax-month?year_id=' + year_id+'&student_id=' + student_id+'&month=' + month, function(data){
          var total = 0;
          $('#process').append('<tr><td>التاريخ</td><td>المبلغ</td></tr>')
          $.each(data, function(index, pObj){
              var c = Number(pObj.amount);
            total = total + c;
            $('#process').append('<tr><td>'+pObj.date+'</td><td>'+pObj.amount+'</td></tr>')
          });
          $('#process').append('<tr><td>اجمالى المدفوع : </td><td>'+total+'</td></tr>')
        })
      })

</script>


<script>
  $('#teacher_salary').on('change',function(e){
    $('#salary').empty();
    $('#days_salary').empty();
    $('#minus_salary').empty();
    $('#hours_salary').empty();
    $('#bonus_salary').empty();
    $('#parts_salary').empty();
    console.log(e);
    var month = $('#month_salary').val();
    var year = $('#year_salary').val();
    var teacher = e.target.value;
    $.get('../Hoffaz/admin/ajax-salary?teacher=' + teacher, function(data){
      console.log(data);
      $.each(data, function(index, salaryObj){
        $("#salary").attr({
            "value" : salaryObj.salary
        });
        $("#thour").attr({
            "value" : salaryObj.hours
        });
      });
    })
  })

  $('#month_salary').on('change',function(e){
    $('#salary').empty();
    $('#days_salary').empty();
    $('#minus_salary').empty();
    $('#hours_salary').empty();
    $('#bonus_salary').empty();
    $('#parts_salary').empty();
    console.log(e);
    var teacher = $('#teacher_salary').val();
    var year = $('#year_salary').val();
    var month = e.target.value;
    $.get('../Hoffaz/admin/ajax-parts?teacher=' + teacher+'&year=' + year+'&month=' + month, function(data){
      var tr = 0;
      $.each(data, function(index, partObj){
        tr = tr + partObj.part;
      });
      $("#parts_salary").attr({
        "value" : tr
      });
    })
    $.get('../Hoffaz/admin/ajax-days?teacher=' + teacher+'&year=' + year+'&month=' + month, function(data){
      console.log(data);
      var count = 0;
      $.each(data, function(index, salaryObj){
        count = count + 1;
      });
      $("#days_salary").attr({
        "value" : count
      });
      var thour = $("#thour").val();
    var salary = $("#salary").val();    
    var days = count;
    var salary_hour = Math.floor((salary/30)/thour);
    var day = Math.floor((salary/30) * days);
    
    $.get('../Hoffaz/admin/ajax-attendSalary?teacher=' + teacher+'&year=' + year+'&month=' + month, function(data){
      var result1 = 0;
      var result2 = 0;
      $.each(data, function(index, sObj){
        var a = sObj.attends;
        var b = sObj.leaves;
            
            var first = a.split(":")
            var second = b.split(":")
                
                var xx;
                var yy;
                
                if(parseInt(first[0]) < parseInt(second[0])){          
                    
                    if(parseInt(first[1]) < parseInt(second[1])){
                        
                        yy = parseInt(first[1]) + 60 - parseInt(second[1]);
                        xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
                    
                    }else{
                      yy = parseInt(first[1]) - parseInt(second[1]);
                      xx = parseInt(first[0]) + 24 - parseInt(second[0]);
                    }
                  
                
                
                }else if(parseInt(first[0]) == parseInt(second[0])){
                
                  if(parseInt(first[1]) < parseInt(second[1])){
                        
                        yy = parseInt(first[1]) + 60 - parseInt(second[1]);
                        xx = parseInt(first[0]) + 24 - 1 - parseInt(second[0]);
                    
                    }else{
                      yy = parseInt(first[1]) - parseInt(second[1]);
                      xx = parseInt(first[0]) - parseInt(second[0]);
                    }
                
                }else{
                    
                    
                  if(parseInt(first[1]) < parseInt(second[1])){
                        
                        yy = parseInt(first[1]) + 60 - parseInt(second[1]);
                        xx = parseInt(first[0]) - 1 - parseInt(second[0]);
                    
                    }else{
                      yy = parseInt(first[1]) - parseInt(second[1]);
                      xx = parseInt(first[0]) - parseInt(second[0]);
                    }
                
                
                }
            
            if(xx < 10)
                xx = "0" + xx;
                
            
            if(yy < 10)
                yy = "0" + yy;
          
            var rr = xx + ":" + yy;
            if(xx > thour){
              result1 = xx - thour;
            }

            if(xx < thour){
              result2 = thour - xx ;
            }
        
      });
              $("#hours_salary").attr({
                "value" : result1
              });
              var h = (result1 * salary_hour);
              $("#bonus_salary").attr({
                "value" : h
              });
              var hh = (result2 * salary_hour);
              $("#minus_salary").attr({
                "value" : hh
              });
    })
    })
  })
</script>
        @elseif(Route::currentRouteName() == 'admin.store' || Route::currentRouteName() == 'admin.reports.salaries' || Route::currentRouteName() == 'admin.jobs' || Route::currentRouteName() == 'admin.reports.attend' || Route::currentRouteName() == 'admin.reports.absent' || Route::currentRouteName() == 'admin.reports.counts' || Route::currentRouteName() == 'admin.reports.grades' || Route::currentRouteName() == 'admin.students' || Route::currentRouteName() == 'admin.students.count' || Route::currentRouteName() == 'admin.teachers' || Route::currentRouteName() == 'admin.guardians' || Route::currentRouteName() == 'admin.materials' || Route::currentRouteName() == 'admin.centers' || Route::currentRouteName() == 'admin.courses' || Route::currentRouteName() == 'admin.levels' || Route::currentRouteName() == 'admin.transportations') 
        <script src="{{asset('assets/admin/js/jQuery-2.1.4.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://nightly.datatables.net/responsive/js/dataTables.responsive.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tables').DataTable( {
                  "language":{
                    "decimal":        "",
                    "emptyTable":     "لا يوجد بيانات",
                    "info": "عرض صفحة _PAGE_ من _PAGES_ صفحات",
                    "infoEmpty":      "عرض مدخلات من 0 الى 0 ",
                    "infoFiltered":   "(محدد من _MAX_ عنصر)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "عرض مدخلات القائمة",
                    "loadingRecords": "...تحميل",
                    "processing":     "...تنفيذ",
                    "search":         ":ابحث",
                    "zeroRecords":    "لا يوجد نتائج للبحث",
                    "paginate": {
                        "first":      "الأول",
                        "last":       "الأخير",
                        "next":       "التالى",
                        "previous":   "السابق"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                  },
                    dom: 'Bfrtip',
                    columnDefs: [
                        {
                            targets: 1,
                            className: 'noVis'
                        }
                    ],
                    buttons: [
                        {
                            text: 'نسخ',
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [ ':visible' ]
                            }
                        },
                        {
                          text: 'اكسل',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                          text: 'طباعة',
                            extend: 'print',
                            messageTop: '',
                            exportOptions: {
                                columns: [ ':visible' ]
                            }
                        },
                        {
                          
                          extend: 'colvis',
                          className: 'btn-orange',
                          text: 'تحديد الأعمدة'
                        }
                        
                    ]
                } );
            } );
        </script>
        
        

        <!-- fullscreen -->
        <script src="{{asset('assets/admin/js/screenfull.js')}}"></script>

        <!-- text-rotator -->
        <script src="{{asset('assets/admin/js/morphext.js')}}"></script>

        


        <!-- Tanseeq App -->
        
        <script src="{{asset('assets/admin/js/app.min.js')}}"></script>

        
        <script src="{{asset('assets/admin/plugins/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script type="text/javascript">
          /* Nice Scroll
          ===============================*/
          $(document).ready(function () {
              
              "use strict";
              
              $("html").niceScroll({
                  scrollspeed: 60,
                  mousescrollstep: 35,
                  cursorwidth: 5,
                  cursorcolor: '#f3834e',
                  cursorborder: 'none',
                  background: 'rgb(27, 30, 36)',
                  cursorborderradius: 3,
                  autohidemode: false,
                  cursoropacitymin: 0.1,
                  cursoropacitymax: 1,
                  zindex: "999",
                  horizrailenabled: false
              });
            
          });
        </script>
        <script src="{{asset('assets/admin/js/process.js')}}" type="text/javascript"></script>

      @else
        <script data-require="jquery@*" data-semver="2.1.4" src="{{asset('assets/admin/js/jQuery-2.1.4.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>

        <!-- Select2 -->
        <script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
        
        <!-- fullscreen -->
        <script src="{{asset('assets/admin/js/screenfull.js')}}"></script>

        <!-- text-rotator -->
        <script src="{{asset('assets/admin/js/morphext.js')}}"></script>

        <script src="{{asset('assets/admin/js/float-labels.js')}}"></script>
        <script>floatlabels = new FloatLabels( '.form-1');</script>

        <!-- Tanseeq App -->
        
        <script src="{{asset('assets/admin/js/app.min.js')}}"></script>
        
        <script>

        $(document).ready(function() {
          $('#advanced-check').change(function() {
            $('#advanced-search').toggle();
          });
        });  

        </script>


        

        <script src="{{asset('assets/admin/plugins/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script type="text/javascript">
          /* Nice Scroll
          ===============================*/
          $(document).ready(function () {
              
              "use strict";
              
              $("html").niceScroll({
                  scrollspeed: 60,
                  mousescrollstep: 35,
                  cursorwidth: 5,
                  cursorcolor: '#f3834e',
                  cursorborder: 'none',
                  background: 'rgb(27, 30, 36)',
                  cursorborderradius: 3,
                  autohidemode: false,
                  cursoropacitymin: 0.1,
                  cursoropacitymax: 1,
                  zindex: "999",
                  horizrailenabled: false
              });
            
          });
        </script>
        <script src="{{asset('assets/admin/plugins/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/bootstrap-sweetalert/sweetalert.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/js/ui-sweetalert.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
        
        <script src="{{asset('assets/admin/js/process.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/js/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/js/main2.js')}}" type="text/javascript"></script>
        
        <script>
          function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            }
          }
          $("#imgInp").change(function() {
            readURL(this);
          });
        </script>

        
        @endif
    </body>
</html>