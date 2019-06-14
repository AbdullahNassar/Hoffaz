@extends('admin.layouts.master')
@section('title')
@if (Config::get('app.locale') == 'en') Users @else المستخدمون @endif
@endsection
@section('content')
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">@if (Config::get('app.locale') == 'en') Home @else الرئيسة  @endif</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>@if (Config::get('app.locale') == 'en') Users @else المستخدمون @endif</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> @if (Config::get('app.locale') == 'en') Add New User @else اضافة مستخدم جديد @endif
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    @if (Config::get('app.locale') == 'en')
                                    <form class="form-horizontal" action="{{route('admin.user.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-body">
                                            <div class="row">   
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail">
                                                                <img src="http://www.placehold.it/790x290/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" > </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> .Select  Image. </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                                    <input type="hidden" value="users" id="storage" >
                                                                    <input type="hidden" name="image" id="img" >
                                                                    <input type="file" name="image" id="image">
                                                                </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a><br><br>
                                                                <button class="btn default" type="button" id="upload-btn">Upload Image
                                                                </button><hr>
                                                                <div class="progress">
                                                                    <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h3 id="status"></h3>
                                                                <p id="loaded_n_total"></p><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End col -->
                                            </div>
                                            <div class="row">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Activation :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-gift"></i>
                                                                </span>
                                                                <select class="form-control" name="active">
                                                                        <option>Select Status...</option>
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Not Active</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Membership Type :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-gift"></i>
                                                                </span>
                                                                <select class="form-control" name="type">
                                                                        <option>          </option>
                                                                        <option value="admin">Admin</option>
                                                                        <option value="editor">Editor</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Name :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="name" class="form-control" placeholder="Name..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">UserName :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="username" class="form-control" placeholder="UserName..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="email" name="email" class="form-control" placeholder="Email..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Password :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="password" name="password" class="form-control" placeholder="Password..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Address :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <textarea rows="10" name="address" class="form-control" placeholder="Address..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Facebook :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="facebook" class="form-control" placeholder="Facebook..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Twitter :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="twitter" class="form-control" placeholder="Twitter..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Google :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="google" class="form-control" placeholder="Google..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Instagram :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="instagram" class="form-control" placeholder="Instagram..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Phone :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="phone" class="form-control" placeholder="Phone..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Country :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="country" class="form-control" placeholder="Country..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Details :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <textarea rows="10" name="details" class="form-control" placeholder="Details..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-5 col-md-7">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.users')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                    @else
                                    <form class="form-horizontal" action="{{route('admin.user.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-body">
                                            <div class="row"> 
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail">
                                                                <img src="http://www.placehold.it/790x290/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> .أدرج صورة. </span>
                                                                    <span class="fileinput-exists"> تغيير </span>
                                                                    <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                                    <input type="hidden" value="users" id="storage" >
                                                                    <input type="hidden" name="image" id="img" >
                                                                    <input type="file" name="image" id="image">
                                                                </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> حذف </a><br><br>
                                                                <button class="btn default" type="button" id="upload-btn">تحميل الصورة
                                                                </button><hr>
                                                                <div class="progress">
                                                                    <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h3 id="status"></h3>
                                                                <p id="loaded_n_total"></p><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End col -->
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">التفعيل :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-gift"></i>
                                                                </span>
                                                                <select class="form-control" name="active">
                                                                        <option>          </option>
                                                                        <option value="1">فعال</option>
                                                                        <option value="0">غير فعال</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">النوع :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-gift"></i>
                                                                </span>
                                                                <select class="form-control" name="type">
                                                                        <option>         </option>
                                                                        <option value="admin">أدمن</option>
                                                                        <option value="editor">محرر</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">الاسم :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="name" class="form-control" placeholder="الاسم..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">اسم المستخدم :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="username" class="form-control" placeholder="اسم المستخدم..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">البريد الالكترونى :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="email" name="email" class="form-control" placeholder="البريد الالكترونى..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">كلمة السر :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="password" name="password" class="form-control" placeholder="كلمة السر..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">العنوان :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <textarea rows="10" name="address" class="form-control" placeholder="العنوان..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">فيسبوك :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="facebook" class="form-control" placeholder="فيسبوك..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">تويتر :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="twitter" class="form-control" placeholder="تويتر..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">جوجل :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="google" class="form-control" placeholder="جوجل..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">انستجرام :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="instagram" class="form-control" placeholder="انستجرام..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">الهاتف :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="phone" class="form-control" placeholder="الهاتف..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">الدولة :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" name="country" class="form-control" placeholder="الدولة..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">التفاصيل :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <textarea rows="10" name="details" class="form-control" placeholder="التفاصيل..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-5 col-md-7">
                                                    <button type="submit" class="btn green addButton">حفظ</button>
                                                    <a href="{{route('admin.users')}}" type="button" class="btn  grey-salsa btn-outline">أغلق</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                    @endif
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection