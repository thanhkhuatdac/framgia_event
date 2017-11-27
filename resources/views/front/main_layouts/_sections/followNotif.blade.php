<li class="notif">
    <span>
        {{ trans('follow_notif.user') }}
        <strong>
            <a class="white" href="{{ route('userProfile', $userFollowing->id) }}">
                {{ $userFollowing->name }}
            </a>
        </strong>
        {{ trans('follow_notif.follow') }}
    </span>
</li>
