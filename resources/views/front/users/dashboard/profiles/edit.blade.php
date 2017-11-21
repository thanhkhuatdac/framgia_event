@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('assets/bootstrap-fileinput/js/fileinput.min.js') }}
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
                    <h4 class="section-title">{{ trans('edit_profile.title') }}</h4>
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('updated'))
                        <div class="alert alert-success">
                            {{ session('updated') }}
                        </div>
                    @endif
                    <form class="post-form-wrapper" action="{{ route('postEditProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row gap-20">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group bootstrap-fileinput-style-01">
                                    <label>{{ trans('edit_profile.photo') }}</label>
                                    <input type="file" name="image" id="form-register-photo">
                                    <span class="font12 font-italic">
                                        {{ trans('edit_profile.photoReq') }}
                                    </span>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('edit_profile.name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('edit_profile.phone') }}</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('edit_profile.address') }}</label>
                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-sm-6 col-md-7">
                                <div class="form-group">
                                    <label>{{ trans('edit_profile.description') }}</label>
                                    <textarea rows="7" class="form-control" name="description">{{ $user->description }}</textarea>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-sm-6 col-md-7">
                                <div class="form-group">
                                    <label>{{ trans('edit_profile.facebook') }}</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $facebook }}">
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-sm-6 col-md-7">
                                <div class="form-group">
                                    <label>{{ trans('edit_profile.instagram') }}</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ $instagram }}">
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-sm-6 col-md-7">
                                <div class="form-group">
                                    <label>{{ trans('edit_profile.twitter') }}</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ $twitter }}">
                                </div>
                            </div>
                            <div class="clear mb-10"></div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('edit_profile.save') }}
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
