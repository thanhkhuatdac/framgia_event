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
                    <h4 class="section-title">{{ trans('change_password.title') }}</h4>
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    <form class="post-form-wrapper" action="{{ route('postChangePassword', $user->id) }}"
                        method="POST">
                        {{ csrf_field() }}
                        <div class="row gap-20">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>
                                        {{ trans('change_password.currentPassword') }}
                                    </label>
                                    <input type="password" class="form-control" name="currentPassword"
                                        placeholder="{{ trans('change_password.currentPasswordPlace') }}">
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('change_password.newPassword') }}</label>
                                    <input type="password" class="form-control" name="newPassword"
                                        placeholder="{{ trans('change_password.newPasswordPlace') }}">
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>
                                        {{ trans('change_password.confirmPassword') }}
                                    </label>
                                    <input type="password" class="form-control" name="rePassword"
                                        placeholder="{{ trans('change_password.confirmPasswordPlace') }}">
                                </div>
                            </div>
                            <div class="clear mb-10"></div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('change_password.save') }}
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
