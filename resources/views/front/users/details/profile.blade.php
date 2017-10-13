@extends('front.main_layouts.master')
@section('content')

<div class="spaceY70"></div>
@include('front.users._sections.user_header')
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
                <h4 class="section-title">
                    {{ trans('user_detail_profile.profile') }}
                </h4>
                <p class="lead">{{ $user->description }}</p>
                <div class="bt mt-30 mb-30"></div>
                <ul class="featured-list-with-h">
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <h5><i class="ti-user text-primary mr-5"></i>
                                    {{ trans('user_detail_profile.score') }}
                                </h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                <span class="pl-sm"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <h5><i class="ti-world text-primary mr-5"></i>
                                {{ trans('user_detail_profile.events') }}</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                <span class="pl-sm"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <h5><i class="ti-map-alt text-primary mr-5"></i>
                                {{ trans('user_detail_profile.services') }}</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                <span class="pl-sm"></span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="mb-30"></div>
            </div>
            <div id="sidebar-sticky" class="col-xs-12 col-sm-5 col-md-4 mt-20">
                <div class="ml-10 ml-0-xs mb-10">
                    <a href="guide-payment.html" class="btn btn-primary btn-lgg btn-block btn-border">{{ trans('user_detail_profile.bookMe') }}</a>
                </div>
                <aside class="sidebar-wrapper with-box-shadow">
                    <div class="sidebar-booking-box">
                        <div class="sidebar-booking-header clearfix">
                            <div class="price">
                                {{ trans('user_detail_profile.contactMe') }}
                            </div>
                        </div>
                        <div class="sidebar-booking-inner">
                            <form class="fast-contact-wrapper">
                                <div class="row">
                                    <div class="col-xss-12 col-xs-6 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>
                                                {{ trans('user_detail_profile.yourName') }} {{ trans('user_detail_profile.required') }}
                                            </label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-xss-12 col-xs-6 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>
                                                {{ trans('user_detail_profile.yourEmail') }} {{ trans('user_detail_profile.required') }}
                                            </label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>{{ trans('user_detail_profile.message') }}</label>
                                            <textarea class="form-control" rows="6"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-block mt-5">
                                    {{ trans('user_detail_profile.submit') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection
