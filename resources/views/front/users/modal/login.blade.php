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
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label>{{ trans('login.username') }}</label>
                    <input class="form-control" placeholder="{{ trans('login.username_place') }}" type="text">
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label>{{ trans('login.password') }}</label>
                    <input class="form-control" placeholder="{{ trans('login.password_place') }}" type="text">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="checkbox-block">
                    <input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice"
                        type="checkbox">
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
        <button type="button" class="btn btn-primary">{{ trans('login.login') }}</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">
            {{ trans('login.close') }}
        </button>
    </div>
</div>
