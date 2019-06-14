@extends('admin.layouts.master')
@section('title')
@if (Config::get('app.locale') == 'en') Subscribers @else المشتركون @endif
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
                                <span>@if (Config::get('app.locale') == 'en') Send Mail @else أرسل بريد الكترونى @endif</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>@if (Config::get('app.locale') == 'en') Send Mail @else أرسل بريد الكترونى @endif
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="{{route('sendMail')}}" class="form-horizontal" method="post">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            
                                            <div class="form-group">
                                                @php $count = 1; @endphp
                                                @foreach($subscribers as $subscriber)
                                                <div class="col-md-3">
                                                    <div class="input-group" style="margin-bottom: 15px;">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        
                                                        <input type="text" class="form-control" value="{{$subscriber->email}}" name="email" required >
                                                        
                                                    </div>
                                                </div>
                                                @php $count = $count+1; @endphp
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">@if (Config::get('app.locale') == 'en') Content @else المحتوى @endif :</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-microphone"></i>
                                                        </span>
                                                        <textarea rows="30" class="form-control" name="content" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                @if (Config::get('app.locale') == 'en')
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Send</button>
                                                    <a href="{{route('admin.subscribers')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                                @else
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">أرسل</button>
                                                    <a href="{{route('admin.subscribers')}}" type="button" class="btn  grey-salsa btn-outline">أغلق</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection