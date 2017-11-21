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
                    <h4 class="section-title">
                        {{ trans('request_create_new.title') }}
                    </h4>
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <p class="mmt-15 mb-20"></p>
                    <form class="post-form-wrapper" action="{{ route('postCreateRequestEvent', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row gap-20">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{ trans('request_create_new.subject') }}
                                    </label>
                                    <select id="select-subjects" name="subject" class="form-control">
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-6 col-md-5">
                                <div class="form-group">
                                    <label>
                                        {{ trans('request_create_new.eventTitle') }}
                                    </label>
                                    <input type="text" name="title" class="form-control" placeholder="{{ trans('request_create_new.titlePlace') }}" required>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-10 col-md-8">
                                <div class="form-group bootstrap-fileinput-style-01">
                                    <label>
                                        {{ trans('request_create_new.intro') }}
                                    </label>
                                    <textarea name="description" class="form-control" placeholder="{{ trans('request_create_new.introPlace') }}" rows="6" required></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="clear"></div>
                            <div class="clear mb-10"></div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('request_create_new.save') }}
                                </button>
                                <button type="reset" class="btn btn-primary btn-border">
                                    {{ trans('request_create_new.cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
