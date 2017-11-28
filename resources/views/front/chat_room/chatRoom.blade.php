@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('js/box-chat.js') }}
@endpush
@section('content')

<div class="breadcrumb-image-bg detail-breadcrumb"
    style="background-image:url({{ asset(config('asset.image_path.event_plan') .
        'default-bg-title.jpg') }});">
    <div class="container">
        <div class="page-title detail-header-02">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <h2>{{ trans('chat_room.title') }}</h2>
                    <span class="labeling text-white mt-17">
                        <span>{{ trans('chat_room.decoration') }}</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrapper text-left">
            <ol class="breadcrumb"></ol>
        </div>
    </div>
</div>
<div class="multiple-sticky hidden-sm hidden-xs">
    <div class="multiple-sticky-inner">
        <div class="multiple-sticky-container container">
            <div class="multiple-sticky-item clearfix">
                <ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
                    <li>
                        <a href="#detail-content-sticky-nav-01">
                            &nbsp;
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="content-wrapper">
                    <div id="detail-content-sticky-nav-01">
                        <h2 class="font-lg">
                            {{ trans('chat_room.boxChat') }}
                        </h2>
                        <div class="bt mt-10 mb-10"></div>
                        <div class="mb-10"></div>
                        <div class="content-chat-room">
                            <ul id="show-messages-chat-room" class="list-group"></ul>
                        </div>
                        <div class="mb-10"></div>
                        <div class="bb"></div>
                    </div>
                    <div id="detail-content-sticky-nav-05">
                        <div class="review-wrapper">
                            <div id="box-chat-room-frm" class="box-chat-room-frm"
                                data-send-message="{{ route('userSendMessage', Auth::user()->id) }}"
                                data-load-typing="{{ route('loadTyping', Auth::user()->id) }}"
                                data-remove-typing="{{ route('removeTyping', Auth::user()->id) }}">
                                <form name="frm-add-message" method="POST" action="">
                                    <div class="row">
                                        <div class="clear"></div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    {{ trans('chat_room.yourMessage') }}
                                                </label>
                                                <textarea class="form-control form-control-sm" name="chat_content" id="chat-room-content" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="clear mb-3"></div>
                                        <div class="col-sm-12 col-md-8">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                id="btn-send-message">
                                                {{ trans('chat_room.send') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4">
                <aside class="sidebar-wrapper">
                    <h2 class="font-lg">
                        {{ trans('chat_room.onlineMembers') }}
                    </h2>
                    <div class="hash-tag-wrapper clearfix mt-10 ml-10 ml-0-sm"
                        id="list-users-online"
                        data-load-user-online="{{ route('loadUserOnline', Auth::user()->id) }}"
                        data-load-user-offline="{{ route('loadUserOffline', Auth::user()->id) }}">
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div>

@endsection
