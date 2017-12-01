<div class="review-replied">
    <div class="review-replied-header">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9">
                <strong>
                    <a href="{{ route('userProfile', $comment->user->id) }}">
                        {{ $comment->user->name}}
                    </a>
                </strong>
                <span class="review-date">
                    ({{ $comment->created_at->format('H:i, d/m/Y') }})
                </span>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 text-right text-left-xs">
            </div>
        </div>
    </div>
    <div class="review-replied-content">
        <p>{{ $comment->content }}</p>
    </div>
</div>
