@extends('admin.layouts.master')
@section('title')
@if (Config::get('app.locale') == 'en') Subscribers @else المشتركون @endif
@endsection
@section('content')
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">@if (Config::get('app.locale') == 'en') Home @else الرئيسة  @endif</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>@if (Config::get('app.locale') == 'en') Subscribers @else المشتركون @endif</span>
                            </li>
                        </ul>
                        <div class="col-md-2" style="float: right; margin-top: 5px;">
                            <div class="btn-group">
                                <a href="{{route('admin.subscriber.sendAll')}}" class="btn green btn-sm btn-outline sbold uppercase">
                                     @if (Config::get('app.locale') == 'en') Send Mail to all @else ارسل بريد للكل  @endif
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div><!-- End col -->
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>@if (Config::get('app.locale') == 'en') Subscribers @else المشتركون @endif
                                    </div>
                                    <div class="tools">
                                       <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                @if (Config::get('app.locale') == 'en')
                                                <tr>
                                                    <th>#</th>
                                                    <th>Email</th>
                                                    <th>Operations</th>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>#</th>
                                                    <th>البريد الاكترونى</th>
                                                    <th>العمليات</th>
                                                </tr>
                                                @endif
                                            </thead>
                                            
                                            <tbody>
                                                @foreach($subscribers as $subscriber)
                                                <tr>
                                                    <td class="sorting">
                                                        {{$subscriber->id}} 
                                                    </td>
                                                    <td>
                                                        {{$subscriber->email}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.subscriber.send' , ['id' => $subscriber->id]) }}" class="btn green btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i>@if (Config::get('app.locale') == 'en') Send Mail @else أرسل بريد الكترونى @endif</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!--End table-scrollable-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection