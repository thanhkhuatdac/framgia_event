<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static"
    data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">{{ trans('register.title') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row gap-20">
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-facebook btn-block mb-5-xs">
                    {{ trans('register.fb') }}
                </button>
            </div>
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-google-plus btn-block">
                    {{ trans('register.goole') }}
                </button>
            </div>
            <div class="col-md-12">
                <div class="login-modal-or">
                    <div><span>or</span></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label>{{ trans('register.username') }}</label>
                    <input class="form-control" placeholder="{{ trans('register.username_place') }}" type="text">
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label>{{ trans('register.email') }}</label>
                    <input class="form-control" placeholder="{{ trans('register.email_place') }}" type="text">
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label>{{ trans('register.password') }}</label>
                    <input class="form-control" placeholder="{{ trans('register.password_place') }}" type="text">
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label>{{ trans('register.confirm') }}</label>
                    <input class="form-control" placeholder="{{ trans('register.confirm_place') }}" type="text">
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="checkbox-block">
                    <input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox"
                        value="First Choice" type="checkbox">
                    <label class="" for="register_accept_checkbox">{{ trans('register.term1') }} &amp; {{ trans('register.term2') }} <a href="#">{{ trans('register.term3') }}</a></label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="login-box-box-action">
                    {{ trans('register.already') }}
                    <a data-toggle="modal" href="#loginModal">
                        {{ trans('register.login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary">
            {{ trans('register.register') }}
        </button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">
            {{ trans('register.close') }}
        </button>
    </div>
</div>
