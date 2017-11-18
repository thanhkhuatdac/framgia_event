@extends('front.main_layouts.master')
@section('content')

<div class="hero img-bg-01">
    <div class="container">
        <h1>{{ trans('home_pages.bannerTitle01') }}</h1>
        <form>
            <div class="form-group">
                <input type="text" placeholder="Eg: {{ trans('home_pages.wedding') }}, {{ trans('home_pages.birthday') }} ..." class="form-control flexdatalist"
                    data-data="data/countries.json" data-search-in='["name","capital"]'
                    data-visible-properties='["capital","name","continent"]' data-group-by="continent"
                    data-selection-required="true" data-focus-first-result="true" data-min-length="1"
                    data-value-property="iso2" data-text-property="{capital}, {name}"
                    data-search-contain="false" name="countries">
                <button class="btn"><i class="icon-magnifier"></i></button>
            </div>
        </form>
        <div class="top-search">
            <span class="font700">{{ trans('home_pages.topSearches') }}</span>
            <a href="javascript:void(0)">{{ trans('home_pages.wedding') }}</a>
            <a href="javascript:void(0)">{{ trans('home_pages.birthday') }}</a>
        </div>
    </div>
</div>
<div class="post-hero clearfix">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 mb-20-xs">
                <div class="horizontal-featured-icon-sm clearfix">
                    <div class="icon"><i class="ri ri-location"></i></div>
                    <div class="content">
                        <h6>{{ trans('home_pages.featured_01') }}</h6>
                        <span>
                            {{ trans('home_pages.featured_01_sub') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mb-20-xs">
                <div class="horizontal-featured-icon-sm clearfix">
                    <div class="icon"> <i class="ri ri-user"></i></div>
                    <div class="content">
                        <h6>{{ trans('home_pages.featured_02') }}</h6>
                        <span>
                        {{ trans('home_pages.featured_02_sub') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mb-20-xs">
                <div class="horizontal-featured-icon-sm clearfix">
                    <div class="icon"> <i class="ri ri-equal-circle"></i></div>
                    <div class="content">
                        <h6>{{ trans('home_pages.featured_03') }}</h6>
                        <span>
                        {{ trans('home_pages.featured_03_sub') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pt-70 pb-60 clearfix">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="section-title">
                <h2>{{ trans('home_pages.availableEvents') }}</h2>
            </div>
        </div>
    </div>
    <div class="mb-30">
        <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
            <div class="GridLex-grid-noGutter-equalHeight">
                <div class="GridLex-col-4_sm-4_xs-6_xss-12">
                    <div class="top-destination-item">
                        <a href="javascript:void(0)">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.subject') . 'wedding.jpeg') }}
                            </div>
                            <h4 class="uppercase">
                                <span>{{ trans('home_pages.wedding') }}</span>
                            </h4>
                        </a>
                    </div>
                </div>
                <div class="GridLex-col-4_sm-4_xs-6_xss-12">
                    <div class="top-destination-item">
                        <a href="javascript:void(0)">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.subject') . 'edm.jpeg') }}
                            </div>
                            <h4 class="uppercase">
                                <span>{{ trans('home_pages.edmParty') }}</span>
                            </h4>
                        </a>
                    </div>
                </div>
                <div class="GridLex-col-4_sm-4_xs-6_xss-12">
                    <div class="top-destination-item">
                        <a href="javascript:void(0)">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.subject') . 'travel.jpeg') }}
                            </div>
                            <h4 class="uppercase">
                                <span>{{ trans('home_pages.travel') }}</span>
                            </h4>
                        </a>
                    </div>
                </div>
                <div class="GridLex-col-4_sm-4_xs-6_xss-12">
                    <div class="top-destination-item">
                        <a href="javascript:void(0)">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.subject') . 'birthday.jpeg') }}
                            </div>
                            <h4 class="uppercase">
                                <span>{{ trans('home_pages.birthday') }}</span>
                            </h4>
                        </a>
                    </div>
                </div>
                <div class="GridLex-col-4_sm-4_xs-6_xss-12">
                    <div class="top-destination-item">
                        <a href="javascript:void(0)">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.subject') . 'chrismas.jpeg') }}
                            </div>
                            <h4 class="uppercase">
                                <span>{{ trans('home_pages.chrismas') }}</span>
                            </h4>
                        </a>
                    </div>
                </div>
                <div class="GridLex-col-4_sm-4_xs-6_xss-12">
                    <div class="top-destination-item">
                        <a href="javascript:void(0)">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.subject') . 'halloween.jpeg') }}
                            </div>
                            <h4 class="uppercase">
                                <span>{{ trans('home_pages.halloween') }}</span>
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white pt-70 pb-60 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="section-title">
                    <h2>{{ trans('home_pages.recommended') }}</h2>
                    <p class="lead">{{ trans('home_pages.recommended_sub') }}</p>
                </div>
            </div>
        </div>
        <div class="trip-guide-wrapper mb-30">
            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                <div class="GridLex-grid-noGutter-equalHeight">
                    @foreach($eventPlans as $eventPlan)
                        <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                            <div class="trip-guide-item">
                                <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}">
                                    <div class="trip-guide-image">
                                        {{ Html::image(config('asset.image_path.event_plan') .
                                            $eventPlan->image) }}
                                    </div>
                                    <div class="trip-guide-content">
                                        <h3>{{ $eventPlan->title }}</h3>
                                        <p class="related-content">
                                            {{ limit_characters($eventPlan->content, 177) }}
                                        </p>
                                    </div>
                                </a>
                                <div class="trip-guide-bottom">
                                    <div class="trip-guide-person clearfix">
                                        <div class="image">
                                            {{ Html::image(config('asset.image_path.user_ava') . $eventPlan->user->image, $eventPlan->user->name, array('class' => 'img-circle')) }}
                                        </div>
                                        <p class="name">{{ trans('home_pages.by') }}
                                            <a href="{{ route('userProfile', $eventPlan->user->id) }}">
                                                {{ $eventPlan->user->name }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="trip-guide-meta row gap-10">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="rating-item">
                                                <input type="hidden" class="rating"
                                                    data-filled="fa fa-star rating-rated"
                                                    data-empty="fa fa-star-o"
                                                    data-fractions="2" data-readonly
                                                    value="{{ $eventPlan->total_rate }}" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 text-right"></div>
                                    </div>
                                    <div class="row gap-10">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="trip-guide-price">
                                                    {{ trans('home_pages.referencePrice') }}
                                                <span class="block inline-block-xs">
                                                    {{ convert_vnd($eventPlan->amount) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                            <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}"
                                                class="btn btn-primary">
                                                {{ trans('home_pages.details') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix">
    <div class="container pt-70 pb-80">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="section-title">
                    <h2>{{ trans('home_pages.howItWorks') }}</h2>
                </div>
            </div>
        </div>
        <div class="GridLex-gap-30 GridLex-gap-20-mdd GridLex-gap-10-xs alt-number-color ">
            <div class="GridLex-grid-noGutter-equalHeight">
                <div class="GridLex-col-4_sm-4_xs-12">
                    <div class="how-it-work-item clearfix">
                        <div class="icon">
                            <i class="icon-note"></i>
                        </div>
                        <div class="content">
                            <span class="number">
                                {{ trans('home_pages.number01') }}
                            </span>
                            <h3> {{trans('home_pages.createEvent')}} </h3>
                        </div>
                    </div>
                </div>
                <div class="GridLex-col-4_sm-4_xs-12">
                    <div class="how-it-work-item clearfix">
                        <div class="icon">
                            <i class="icon-cloud-upload"></i>
                        </div>
                        <div class="content">
                            <span class="number">
                                {{ trans('home_pages.number02') }}
                            </span>
                            <h3>{{trans('home_pages.publishEvent')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="GridLex-col-4_sm-4_xs-12">
                    <div class="how-it-work-item clearfix">
                        <div class="icon">
                            <i class="icon-speech"></i>
                        </div>
                        <div class="content">
                            <span class="number">
                                {{ trans('home_pages.number03') }}
                            </span>
                            <h3>{{trans('home_pages.freelancerContact')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="featured-bg pt-80 pb-60 img-bg-02">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row gap-0">
                    <div class="col-xss-6 col-xs-6 col-sm-3">
                        <div class="counting-item">
                            <div class="icon">
                                <i class="icon-directions"></i>
                            </div>
                            <p class="number">{{ $eventPlanCount }}</p>
                            <p>{{ trans('home_pages.events') }}</p>
                        </div>
                    </div>
                    <div class="col-xss-6 col-xs-6 col-sm-3">
                        <div class="counting-item">
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                            <p class="number">{{ $freelancerCount }}</p>
                            <p>{{ trans('home_pages.freelancers') }}</p>
                        </div>
                    </div>
                    <div class="col-xss-6 col-xs-6 col-sm-3">
                        <div class="counting-item">
                            <div class="icon">
                                <i class="icon-envelope-letter"></i>
                            </div>
                            <p class="number">{{ $requestEventCount }}</p>
                            <p>{{ trans('home_pages.requests') }}</p>
                        </div>
                    </div>
                    <div class="col-xss-6 col-xs-6 col-sm-3">
                        <div class="counting-item">
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                            <p class="number">{{ $customerCount }}</p>
                            <p>{{ trans('home_pages.customers') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-70">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="fearured-join-item mb-0">
                    @if(!Auth::check())
                        <h2 class="alt-font-size">
                            {{ trans('home_pages.createYourAccount') }}
                        </h2>
                        <a data-toggle="modal" href="#registerModal" class="btn btn-primary btn-lg">
                            {{ trans('home_pages.joinUs') }}
                        </a>
                    @endif
                    @if(check_freelancer(Auth::user()))
                        <h2 class="alt-font-size">
                            {{ trans('home_pages.createYourEventPlan') }}
                        </h2>
                        <a data-toggle="modal" href="#registerModal" class="btn btn-primary btn-lg">
                            {{ trans('home_pages.create') }}
                        </a>
                    @endif
                    @if(check_customer(Auth::user()))
                        <h2 class="alt-font-size">
                            {{ trans('home_pages.createYourRequestEvent') }}
                        </h2>
                        <a data-toggle="modal" href="#registerModal" class="btn btn-primary btn-lg">
                            {{ trans('home_pages.create') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
