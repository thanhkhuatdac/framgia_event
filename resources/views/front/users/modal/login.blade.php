@if ($errors->has('email') || old('email') != null || Session::has('updatedPass'))
    @push('scripts')
        {{ Html::script('js/login-modal.js') }}
    @endpush
@endif
<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
    data-backdrop="static" data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">{{ trans('login.title') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row gap-20">
            <div class="col-sm-6 col-md-6">
                <a href="{{route('socialRedirect', 'facebook')}}">
                <button class="btn btn-facebook btn-block mb-5-xs">
                    {{ trans('login.fb') }}
                </button>
                </a>
            </div>
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-google-plus btn-block">
                    {{ trans('login.google') }}
                </button>
            </div>
            <div class="col-md-12">
                <div class="login-modal-or">
                    <div><span>{{ trans('login.or') }}</span></div>
                </div>
            </div>
            @if(Session::has('updatedPass'))
                <div class="alert alert-success">
                    {{ session('updatedPass') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>{{ trans('login.email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{ trans('login.email_place') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>{{ trans('login.password') }}</label>
                        <input id="password" name="password" class="form-control" placeholder="{{ trans('login.password_place') }}" type="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="checkbox-block">
                        <input id="remember_me_checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="" for="remember_me_checkbox">
                            {{ trans('login.remember') }}
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="login-box-link-action">
                        <a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">   {{ trans('login.forgot') }}
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="login-box-box-action">
                            {{ trans('login.noAccount') }}
                        <a data-toggle="modal" href="#registerModal">
                            {{ trans('login.register') }}
                        </a>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button type="submit" class="btn btn-primary">{{ trans('login.login') }}</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">
            {{ trans('login.close') }}
        </button>
    </div>
    </form>
</div>
