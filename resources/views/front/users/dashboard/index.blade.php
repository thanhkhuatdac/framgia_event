@extends('front.main_layouts.master')
@section('content')

<div class="spaceY70"></div>
@include('front.users._sections.user_header')
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            @include('front.users._sections.dashboard_menu')
            <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
                <div class="dashboard-wrapper">
                    <h4 class="section-title">{{ trans('dashboard_index.hello') }}
                        {{ $user->name }}</h4>
                    <p class="mmt-15 mb-20">
                        {{ trans('dashboard_index.lastLoged') }}
                        <span class="text-primary"></span>
                    </p>
                    <div class="admin-empty-dashboard">
                        <div class="icon">
                            <i class="ion-ios-book-outline"></i>
                        </div>
                        <h4>{{ trans('dashboard_index.---') }}</h4>
                        <a href="#" class="btn btn-primary">
                            {{ trans('dashboard_index.createEvent') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
