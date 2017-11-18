@extends('front.main_layouts.master')
@section('content')

<div class="breadcrumb-image-bg bg-default subject-title-bg">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <h2>{{ trans('request_show_all.title01') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
                <h4 class="section-title">{{ trans('request_show_all.title02') }}</h4>
                <p class="mmt-15 mb-20">&nbsp;</p>
                <div class="trip-list-wrapper no-bb-last">
                    @foreach($requestEvents as $requestEvent)
                        <div class="trip-list-item">
                            <div class="image-absolute">
                                <div class="image image-object-fit image-object-fit-cover">
                                    {{ Html::image(config('asset.image_path.request_event') . 'default-request-event.jpeg') }}
                                </div>
                            </div>
                            <div class="content">
                                <div class="GridLex-gap-20 mb-5">
                                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                        <div class="GridLex-col-6_sm-12_xs-12_xss-12">
                                            <div class="GridLex-inner">
                                                <a href="{{ route('requestEventIndex', [$requestEvent->id, $requestEvent->slug]) }}">
                                                    <h6>{{ $requestEvent->title }}</h6>
                                                </a>
                                                <span class="font-italic font14">&nbsp;</span>
                                            </div>
                                        </div>
                                        <div class="GridLex-col-3_sm-6_xs-7_xss-12">
                                            <div class="GridLex-inner line-1 font14 text-muted spacing-1">
                                                {{ trans('request_show_all.requestDate') }}
                                                <span class="block text-primary font16 font700 mt-1">
                                                    {{ $requestEvent->created_at->format('H:i, d/m/Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="GridLex-col-3_sm-6_xs-5_xss-12">
                                            <div class="GridLex-inner text-right text-left-xss dropdown">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('requestEventIndex', [$requestEvent->id, $requestEvent->slug]) }}" >
                                                    {{ trans('request_show_all.view') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pager-wrappper text-left clearfix bt mt-0 pt-20">
                    <div class="pager-innner">
                        <div class="clearfix">
                            <nav>
                                {{ $requestEvents->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 mt-20">
                <aside class="sidebar-wrapper">
                    <h5 class="section-title">{{ trans('request_show_all.tags') }}</h5>
                    <div class="hash-tag-wrapper clearfix">
                        <a href="#" class="hash-tag">{{ trans('request_show_all.wedding') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.birthday') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.party') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.music') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.edm') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.travel') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.flower') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.wine') }}</a>
                    </div>
                    <div class="mb-40"></div>
                    <h5 class="section-title">{{ trans('request_show_all.places') }}</h5>
                    <div class="hash-tag-wrapper clearfix">
                        <a href="#" class="hash-tag">{{ trans('request_show_all.vietNam') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.tokyo') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.paris') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.pattaya') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.bangkok') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.newYork') }}</a>
                        <a href="#" class="hash-tag">{{ trans('request_show_all.london') }}</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection
