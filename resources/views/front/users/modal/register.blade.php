@if ($errors->has('name') || $errors->has('r_email')
    || $errors->has('r_password')
    || $errors->has('password_confirmation') || $errors->has('phone')
    || $errors->has('role') || old('name') != null || old('r_email') != null
    || old('phone') != null)

    @push('scripts')
        {{ Html::script('js/register-modal.js') }}
    @endpush
@endif
<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static"
    data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">{{ trans('register.title') }}</h4>
    </div>
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row gap-20">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>{{ trans('register.username') }}</label>
                        <input id="name" class="form-control" placeholder="{{ trans('register.username_place') }}" type="text" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('r_email') ? ' has-error' : '' }}">
                        <label>{{ trans('register.email') }}</label>
                        <input id="email" class="form-control" placeholder="{{ trans('register.email_place') }}" type="text" name="r_email" value="{{ old('r_email') }}">
                        @if ($errors->has('r_email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('r_email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('r_password') ? ' has-error' : '' }}">
                        <label>{{ trans('register.password') }}</label>
                        <input id="password" class="form-control" placeholder="{{ trans('register.password_place') }}" type="password" name="r_password">
                        @if ($errors->has('r_password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('r_password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>{{ trans('register.confirm') }}</label>
                        <input id="password-confirm" class="form-control" placeholder="{{ trans('register.confirm_place') }}" type="password" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label>{{ trans('register.phone') }}</label>
                        <input id="phone" class="form-control" placeholder="{{ trans('register.phone_place') }}" type="text" name="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                        <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}" id="register-role">
                        <span>{{ trans('register.role') }}</span>
                        <input type="radio" id="freelancer-role" name="role" value="freelancer" class="form-control" checked="checked">
                        <label for="freelancer-role">{{ trans('register.freelancer') }}</label>
                        <input type="radio" id="customer-role" name="role"  value="customer" class="form-control">
                        <label for="customer-role">{{ trans('register.customer') }}</label>
                        @if ($errors->has('role'))
                        <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                        </span>
                        @endif
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
            <button type="submit" class="btn btn-primary">
            {{ trans('register.register') }}
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">
            {{ trans('register.close') }}
            </button>
        </div>
    </form>
</div>
