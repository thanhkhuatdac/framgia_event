<li class="clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="review-header">
                <h6>
                    {{ $comment->user->name }}
                </h6>
                <span class="review-date">
                    ({{ $comment->created_at->format('H:i, d/m/Y') }})
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="review-content">
                <p>
                    {{ $comment->content }}
                </p>
            </div>
            <hr>
        </div>
    </div>
</li>
