<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1"
    data-backdrop="static" data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">{{ trans('forgot_pass.title') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row gap-20">
            <div class="col-sm-12 col-md-12">
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label>{{ trans('forgot_pass.email') }}</label>
                    <input class="form-control" placeholder="{{ trans('forgot_pass.email_place') }}" type="text">
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="checkbox-block">
                    <input id="forgot_password_checkbox" name="forgot_password_checkbox" class="checkbox"
                        value="First Choice" type="checkbox">
                    <label class="" for="forgot_password_checkbox">
                        {{ trans('forgot_pass.generate') }}
                    </label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="login-box-box-action">
                    {{ trans('forgot_pass.return') }} <a data-toggle="modal" href="#loginModal">{{ trans('forgot_pass.login') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary">
            {{ trans('forgot_pass.restore') }}
        </button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">
            {{ trans('forgot_pass.close') }}
        </button>
    </div>
</div>
