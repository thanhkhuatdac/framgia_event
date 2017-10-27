@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('js/create-event.js') }}
@endpush
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
                        {{ trans('dashboard_create_event.step1') }}
                    </h4>
                    <p class="mmt-15 mb-20"></p>
                    <form class="post-form-wrapper" action="{{ route('userDashboardPostCreateNewEvent', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row gap-20">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{ trans('dashboard_create_event.subject') }}
                                        <a href="#create-subject" id="toggle-create-subject">
                                            &nbsp;<i class="fa fa-plus"></i>
                                            {{ trans('dashboard_create_event.new') }}
                                        </a>
                                    </label>
                                    <select id="select-subjects" name="subject" class="form-control">
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="new_subject" id="input-new-subject" class="form-control" value=""/>

                                    <a href="#remove-subject" id="toggle-remove-subject">
                                        <i id="remove-subject" class="fa fa-trash"></i>
                                    </a>
                                    <div class="spaceY40"></div>
                                    <div id="create-subject">
                                        <input type="text" id="new-subject" class="form-control" placeholder="{{ trans('dashboard_create_event.newSubjectName') }}">
                                        <button type="button" id="btn-add-new-subject" class="btn btn-primary">{{ trans('dashboard_create_event.add') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-6 col-md-5">
                                <div class="form-group">
                                    <label>
                                        {{ trans('dashboard_create_event.title') }}
                                    </label>
                                    <input type="text" name="title" class="form-control" placeholder="{{ trans('dashboard_create_event.titlePlace') }}" required>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-10 col-md-8">
                                <div class="form-group bootstrap-fileinput-style-01">
                                    <label>
                                        {{ trans('dashboard_create_event.intro') }}
                                    </label>
                                    <textarea name="description" class="form-control" placeholder="{{ trans('dashboard_create_event.introPlace') }}" rows="6" required></textarea>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-10 col-md-8">
                                <div class="form-group bootstrap-fileinput-style-01">
                                    <label>
                                        {{ trans('dashboard_create_event.image') }}
                                    </label>
                                    <input type="file" name="image" id="featured-image" required>
                                    <span class="font12 font-italic">
                                        {{ trans('dashboard_create_event.imageReq') }}
                                    </span>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-10 col-md-8">
                                <div class="form-group bootstrap-fileinput-style-01">
                                    <label>
                                        {{ trans('dashboard_create_event.galeryImages') }}
                                    </label>
                                    <input type="file" name="albums[]" multiple id="form-photos" required>
                                    <span class="font12 font-italic">
                                        {{ trans('dashboard_create_event.imageReq') }}
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <div class="clear"></div>
                            <div class="clear mb-10"></div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('dashboard_create_event.save') }}
                                </button>
                                <button type="reset" class="btn btn-primary btn-border">
                                    {{ trans('dashboard_create_event.cancel') }}
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
