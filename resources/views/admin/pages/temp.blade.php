@extends('admin.layouts.master')
@section('title')
@if (Config::get('app.locale') == 'en') Profile @else الصفحة الشخصية  @endif
@endsection
@section('content')      
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title">@if (Config::get('app.locale') == 'en') Admin Profile @else الصفحة الشخصية  @endif
                    </h1>              
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> {{Auth::guard('admins')->user()->name}} </div>
                                        <div class="profile-usertitle-job"> {{Auth::guard('admins')->user()->type}} </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <div class="margin-top-20 profile-desc-link" style="margin-left: 80px;">
                                        <a href="{{Auth::guard('admins')->user()->website}}"><i class="fa fa-globe"></i></a>
                                        <a href="{{Auth::guard('admins')->user()->twitter}}"><i class="fa fa-twitter"></i></a>
                                        <a href="{{Auth::guard('admins')->user()->facebook}}"><i class="fa fa-facebook"></i></a>
                                        <a href="{{Auth::guard('admins')->user()->google}}"><i class="fa fa-google"></i></a>
                                        <a href="{{Auth::guard('admins')->user()->instagram}}"><i class="fa fa-instagram"></i></a>
                                        </div><br><br>
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                                <!-- PORTLET MAIN -->
                                <div class="portlet light ">
                                    <!-- STAT -->
                                    <!-- END STAT -->
                                    <div>
                                        <h4 class="profile-usertitle" >@if (Config::get('app.locale') == 'en') About @else نبذة مختصرة @endif</h4>
                                        <span class="profile-desc-text"> {{Auth::guard('admins')->user()->about}} </span>
                                        <div class="margin-top-20 profile-desc-link">
                                            <a href="{{Auth::guard('admins')->user()->website}}"><i class="fa fa-globe"></i></a>
                                            <a href="{{Auth::guard('admins')->user()->twitter}}"><i class="fa fa-twitter"></i></a>
                                            <a href="{{Auth::guard('admins')->user()->facebook}}"><i class="fa fa-facebook"></i></a>
                                            <a href="{{Auth::guard('admins')->user()->google}}"><i class="fa fa-google"></i></a>
                                            <a href="{{Auth::guard('admins')->user()->instagram}}"><i class="fa fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">@if (Config::get('app.locale') == 'en') Profile Data @else البيانات الشخصية  @endif</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">@if (Config::get('app.locale') == 'en') Profile Data @else البيانات الشخصية  @endif</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">@if (Config::get('app.locale') == 'en') Change Avatar  @else تغيير الصورة @endif</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">@if (Config::get('app.locale') == 'en') Change Password  @else تغيير كلمة السر @endif</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form action="{{ route('admin.profile.edit') }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') Name @else الاسم @endif</label>
                                                                <input type="text" value="{{Auth::guard('admins')->user()->name}}" class="form-control" name="name" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') Mobile Number @else رقم الموبايل @endif</label>
                                                                <input type="text" value="{{Auth::guard('admins')->user()->mobile}}" class="form-control" name="mobile" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') E-mail @else البريد الالكترونى @endif</label>
                                                                <input type="text" class="form-control" rows="3" value="{{Auth::guard('admins')->user()->email}}" name="email"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label"> @if (Config::get('app.locale') == 'en') About @else نبذة مختصرة @endif</label>
                                                                <textarea class="form-control" rows="3" name="about">{{Auth::guard('admins')->user()->about}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') Website Url @else رابط الموقع @endif</label>
                                                                <input type="text" value="{{Auth::guard('admins')->user()->website}}" class="form-control" name="website" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') Facebook Url @else رابط الفيسبوك @endif</label>
                                                                <input type="text" value="{{Auth::guard('admins')->user()->facebook}}" class="form-control" name="facebook" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') Twitter Url @else رابط تويتر @endif</label>
                                                                <input type="text" value="{{Auth::guard('admins')->user()->twitter}}" class="form-control" name="twitter" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') Google+ Url @else رابط جوجل @endif</label>
                                                                <input type="text" value="{{Auth::guard('admins')->user()->google}}" class="form-control" name="google" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') Instagram Url @else رابط انستغرام @endif</label>
                                                                <input type="text" value="{{Auth::guard('admins')->user()->instagram}}" class="form-control" name="instagram" /> 
                                                            </div>
                                                            <div class="margiv-top-10">
                                                                <button type="submit" class="btn green @if (Config::get('app.locale') == 'en') addBTN @else addButton @endif"> @if (Config::get('app.locale') == 'en') Save Changes  @else حفظ التغييرات @endif </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <p>   </p>
                                                        <form action="{{ route('admin.profile.image') }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new">   @if (Config::get('app.locale') == 'en') Select Image  @else أدرج صورة @endif </span>
                                                                            <span class="fileinput-exists"> @if (Config::get('app.locale') == 'en') Change  @else تغيير @endif </span>
                                                                            <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                                            <input type="hidden" value="users" id="storage" >
                                                                            <input type="hidden" name="image" value="{{Auth::guard('admins')->user()->image}}" id="img" >
                                                                            <input type="file" name="image" id="image">
                                                                        </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> @if (Config::get('app.locale') == 'en') Remove  @else حذف @endif  </a><br><br>
                                                                        <button class="btn default" type="button" id="upload-btn">@if (Config::get('app.locale') == 'en') Upload Image  @else تحميل صورة@endif
                                                                        </button><hr>
                                                                        <div class="progress">
                                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                                            </div>
                                                                        </div>
                                                                        <h3 id="status"></h3>
                                                                        <p id="loaded_n_total"></p><br><hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <button type="submit" class="btn green @if (Config::get('app.locale') == 'en') addBTN @else addButton @endif">  @if (Config::get('app.locale') == 'en') Save Changes  @else حفظ التغييرات @endif</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <form action="{{ route('admin.profile.pass') }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label class="control-label">@if (Config::get('app.locale') == 'en') New Password  @else كلمة السر الجديدة @endif</label>
                                                                <input type="password" class="form-control" name="password1" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label"> @if (Config::get('app.locale') == 'en') Re-type New Password  @else أعد كتابة كلمة السر @endif</label>
                                                                <input type="password" class="form-control" name="password2" /> </div>
                                                            <div class="margin-top-10">
                                                                <button type="submit" class="btn green @if (Config::get('app.locale') == 'en') addBTN @else addButton @endif">@if (Config::get('app.locale') == 'en') Change Password  @else تغيير كلمة السر @endif</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
                                                    <div class="tab-pane" id="tab_1_4">
                                                        <form action="#">
                                                            <table class="table table-light table-hover">
                                                                <tr>
                                                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios11" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios11" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!--end profile-settings-->
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn red"> Save Changes </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PRIVACY SETTINGS TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                </div>
@endsection