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
                                        <i class="fa fa-gift"></i>@if (Config::get('app.locale') == 'en') Edit @else تعديل @endif
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
                                    @foreach($users as $user)
                                    <form class="form-horizontal" action="{{ route('admin.user.edit' , ['id' => $user->id]) }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" name="s_id" value="{{ $user->id }}">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="users" id="storage" >
                                                        <input type="hidden" name="image" value="{{$user->image}}" id="img" >
                                                        <input type="file" name="image" id="image">
                                                        <img src="{{asset('storage/uploads/users').'/'.$user->image}}"/>
                                                    </div><!-- End Choose-Img -->
                                                    <div class="upload-action">
                                                        <button class="btn green btn-sm btn-outline" type="button" id="upload-btn">
                                                            Upload Image
                                                        </button>
                                                        <div class="progress">
                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                            </div>
                                                        </div>
                                                        <h3 id="status"></h3>
                                                        <p id="loaded_n_total"></p><br>
                                                    </div><!--End upload-action-->
                                                </div><!-- End Form-Group -->
                                            </div><!-- End col -->
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
                                                                        <option selected value="{{ $user->active }}">@if($user->active == 1)
                                                                                        Active
                                                                        @elseif($user->active == 0)
                                                                                        Not Active
                                                                        @endif 
                                                                        </option>
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
                                                                        <option selected value="{{ $user->type }}">@if($user->type == 'admin')
                                                                                        Admin
                                                                        @elseif($user->type == 'editor')
                                                                                        Editor
                                                                        @endif 
                                                                        </option>
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
                                                                <input value="{{$user->name}}" type="text" name="name" class="form-control" placeholder="Name..."> 
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
                                                                <input value="{{$user->username}}" type="text" name="username" class="form-control" placeholder="UserName..."> 
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
                                                                <input value="{{$user->email}}" type="email" name="email" class="form-control" placeholder="Email..."> 
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
                                                                <input type="password" value="{{$user->recover}}" name="password" class="form-control" placeholder="Password..."> 
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
                                                                <input value="{{$user->country}}" type="text" name="country" class="form-control" placeholder="Country..."> 
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
                                                                <input value="{{$user->facebook}}" type="text" name="facebook" class="form-control" placeholder="Facebook..."> 
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
                                                                <input value="{{$user->twitter}}" type="text" name="twitter" class="form-control" placeholder="Twitter..."> 
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
                                                                <input value="{{$user->google}}" type="text" name="google" class="form-control" placeholder="Google..."> 
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
                                                                <input value="{{$user->instagram}}" type="text" name="instagram" class="form-control" placeholder="Instagram..."> 
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
                                                                <input value="{{$user->phone}}" type="text" name="phone" class="form-control" placeholder="Phone..."> 
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
                                                                <input value="{{$user->address}}" type="text" name="address" class="form-control" placeholder="Address..."> 
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
                                    </form>
                                    @endforeach
                                    @else
                                    @foreach($users as $user)
                                    <form class="form-horizontal" action="{{ route('admin.user.edit' , ['id' => $user->id]) }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" name="s_id" value="{{ $user->id }}">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="users" id="storage" >
                                                        <input type="hidden" name="image" value="{{$user->image}}" id="img" >
                                                        <input type="file" name="image" id="image">
                                                        <img src="{{asset('storage/uploads/users').'/'.$user->image}}"/>
                                                    </div><!-- End Choose-Img -->
                                                    <div class="upload-action">
                                                        <button class="btn green btn-sm btn-outline" type="button" id="upload-btn">
                                                            تحميل صورة
                                                        </button>
                                                        <div class="progress">
                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                            </div>
                                                        </div>
                                                        <h3 id="status"></h3>
                                                        <p id="loaded_n_total"></p><br>
                                                    </div><!--End upload-action-->
                                                </div><!-- End Form-Group -->
                                            </div><!-- End col -->
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
                                                                        <option selected value="{{ $user->active }}">@if($user->active == 1)
                                                                                        فعال
                                                                        @elseif($user->active == 0)
                                                                                        غير فعال
                                                                        @endif 
                                                                        </option>
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
                                                                        <option selected value="{{ $user->type }}">@if($user->type == 'admin')
                                                                                        أدمن
                                                                        @elseif($user->type == 'editor')
                                                                                        محرر
                                                                        @endif 
                                                                        </option>
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
                                                                <input value="{{$user->name}}" type="text" name="name" class="form-control" placeholder="الاسم..."> 
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
                                                                <input value="{{$user->username}}" type="text" name="username" class="form-control" placeholder="اسم المستخدم..."> 
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
                                                                <input value="{{$user->email}}" type="email" name="email" class="form-control" placeholder="البريد الالكترونى..."> 
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
                                                                <input value="{{$user->country}}" type="text" name="country" class="form-control" placeholder="الدولة..."> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">فيس بوك :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input value="{{$user->facebook}}" type="text" name="facebook" class="form-control" placeholder="فيس بوك..."> 
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
                                                                <input value="{{$user->twitter}}" type="text" name="twitter" class="form-control" placeholder="تويتر..."> 
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
                                                                <input value="{{$user->google}}" type="text" name="google" class="form-control" placeholder="جوجل..."> 
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
                                                                <input value="{{$user->instagram}}" type="text" name="instagram" class="form-control" placeholder="انستجرام..."> 
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
                                                                <input value="{{$user->phone}}" type="text" name="phone" class="form-control" placeholder="الهاتف..."> 
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
                                                                <input value="{{$user->address}}" type="text" name="address" class="form-control" placeholder="العنوان..."> 
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
                                    </form>
                                    @endforeach
                                    @endif
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection