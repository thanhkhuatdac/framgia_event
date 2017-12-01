@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('js/search-user.js') }}
@endpush
@section('content')

<div class="breadcrumb-image-bg bg-default subject-title-bg">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <h2>{{ trans('show_users.title') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="filter-full-width-wrapper">
    <form class="" action="" method="post">
        <div class="filter-full-primary">
            <div class="container">
                <div class="filter-full-primary-inner">
                    <div class="form-holder">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="filter-item bb-sm no-bb-xss">
                                    <div class="input-group input-group-addon-icon no-border no-br-sm">
                                        <span class="input-group-addon input-group-addon-icon bg-white">
                                            <label>
                                                <i class="fa fa-search"></i>
                                                {{ trans('show_users.search') }}
                                            </label>
                                        </span>
                                        <input type="text" class="form-control"
                                            id="search-users" value=""
                                            data-url-search="{{ route('searchAllUsers') }}"
                                            placeholder="{{ trans('show_users.searchPlace') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="user-item-wrapper-02">
                <div class="GridLex-gap-20">
                    <div class="GridLex-grid-noGutter-equalHeight" id="list-all-users">
                        @foreach($users as $user)
                            <div class="GridLex-col-3_sm-4_xs-6_xss-12">
                                <div class="user-item-02">
                                    <div class="image show-all-user">
                                        {{ Html::image(config('asset.image_path.user_ava') . $user->image) }}
                                    </div>
                                    <div class="block">
                                        @if(check_freelancer($user))
                                            <span class="label label-info">{{ $user->role }}</span>
                                        @else
                                            <span class="label label-warning">{{ $user->role }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-10"></div>
                                    <div class="content">
                                        <h4><a href="{{ route('userProfile', $user->id) }}">
                                            {{ $user->name }}
                                        </a></h4>
                                        <span class="labeling">
                                            <i class="fa fa-phone"></i>
                                            {{ $user->phone }}
                                        </span>
                                        <span class="labeling">
                                            <i class="fa fa-map-marker"></i>
                                            {{ $user->address }}
                                        </span>
                                    </div>
                                    <div class="ph-20 btn-view-user">
                                        <a href="{{ route('userProfile', $user->id) }}"
                                            class="btn btn-success btn-block">
                                            {{ trans('show_users.viewProfile') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pager-wrappper text-left clearfix bt mt-0 pt-20">
                        <div class="pager-innner">
                            <div class="clearfix">
                                <nav>
                                    {{ $users->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
