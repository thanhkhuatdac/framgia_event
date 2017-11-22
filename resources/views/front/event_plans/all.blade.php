@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('js/search-events.js') }}
@endpush
@section('content')

<div class="breadcrumb-image-bg bg-default subject-title-bg">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <h2>{{ trans('subjects_index.allEvents') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="filter-full-width-wrapper">
    <form class="" action="" method="post">
        <div class="filter-full-primary">
            <div class="container">
                <div class="filter-full-primary-inner">
                    <div class="form-holder">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="filter-item bb-sm no-bb-xss">
                                    <div class="input-group input-group-addon-icon no-border no-br-sm">
                                        <span class="input-group-addon input-group-addon-icon bg-white">
                                            <label>
                                                <i class="fa fa-search"></i>
                                                {{ trans('subjects_index.search') }}
                                            </label>
                                        </span>
                                        <input type="text" class="form-control"
                                            id="autocompleteTagging" value=""
                                            data-url="{{ route('searchEvents') }}"
                                            placeholder="{{ trans('subjects_index.searchPlace') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="pt-30 pb-50">
    <div class="container">
        <div class="trip-guide-wrapper">
            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs" id="search-result">
                <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                    @foreach($eventPlans as $eventPlan)
                        <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                            <div class="trip-guide-item bg-light-primary">
                                <div class="trip-guide-image">
                                    {{ Html::image(config('asset.image_path.event_plan') . $eventPlan->image, $eventPlan->name) }}
                                </div>
                                <div class="trip-guide-content bg-white">
                                    <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}">
                                        <h3>{{ $eventPlan->title }}</h3>
                                    </a>
                                    <p class="related-content">
                                        {{ limit_characters($eventPlan->content, 177) }}
                                    </p>
                                </div>
                                <div class="trip-guide-bottom">
                                    <div class="trip-guide-person bg-white clearfix">
                                        <div class="image">
                                            {{ Html::image(config('asset.image_path.user_ava') . $eventPlan->user->image, $eventPlan->user->name, array('class' => 'img-circle')) }}
                                        </div>
                                        <p class="name">
                                            <a href="{{ route('userProfile', $eventPlan->user->id) }}">
                                                {{ $eventPlan->user->name }}
                                            </a>
                                        </p>
                                        <p>&nbsp;</p>
                                    </div>
                                    <p>&nbsp;</p>
                                    <div class="trip-guide-meta row gap-10">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="rating-item">
                                                <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="{{ $eventPlan->total_rate }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gap-10">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="trip-guide-price">
                                                {{ trans('subjects_index.price') }}
                                                <span class="number">
                                                    {{ convert_vnd($eventPlan->amount) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right">
                                            <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}"
                                                    class="btn btn-primary">
                                                {{ trans('subjects_index.details') }}
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
        <div class="pager-wrappper clearfix">
            <div class="pager-innner">
                <div class="clearfix">
                    <nav class="pager-center">
                        {{ $eventPlans->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
