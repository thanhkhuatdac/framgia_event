<li style="word-wrap: break-word; width: 300px; padding: 5px;">
    <span id="content-notif" style="word-wrap: break-word; width: 300px;">
        Sự kiện
        <a href="{{ route('forkEventPlan', [$eventFork->user->id ,$eventPlan->id]) }}">
            <strong>{{ $eventPlan->title }}</strong>
        </a>
        của bạn đã được
            <strong>{{ $eventFork->user->name }}</strong> Fork.
    </span>
</li>
