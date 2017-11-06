<li class="clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="review-header">
                <h6>
                    {{ $review->user->name }}
                </h6>
                <span class="review-date">
                    ({{ $review->created_at->format('H:i, d/m/Y') }})
                </span>
                <div class="rating-item">
                    <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o"
                        data-fractions="2" data-readonly
                        value="{{ $review->rate }}" />
                </div>
                <div class="link-reply">
                    <a href="#" class="btn btn-primary" id="{{ $review->id }}">
                        {{ trans('event_plans_index.Reply') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="review-content">
                <p>
                    {{ $review->content }}
                </p>
                <hr>
            </div>
            <hr>
            <div id="replies-review-{{ $review->id }}">
                @foreach($review->comments as $replied)
                    <div class="review-replied">
                        <div class="review-replied-header">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-9">
                                    <strong>
                                        {{ $replied->user->name}}
                                    </strong>
                                    <span class="review-date">
                                        ({{ $replied->created_at->format('H:i, d/m/Y') }})
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3 text-right text-left-xs">
                                </div>
                            </div>
                        </div>
                        <div class="review-replied-content">
                            <p>{{ $replied->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="frm-reply-review">
                <form id="frm-reply-{{ $review->id }}" action="" method="post" accept-charset="utf-8">
                    <input type="hidden" id="input-review-id-{{ $review->id }}" value="{{ $review->id }}">
                    <label>{{ trans('event_plans_index.Reply') }}</label>
                    <br>
                    <div class="content-reply">
                        <textarea class="form-control form-control-sm" id="rep-content-{{ $review->id }}"></textarea>
                    </div>
                    <div class="btn-submit-reply">
                        <button type="submit" class="btn btn-primary" id="{{ $review->id }}">
                            {{ trans('event_plans_index.Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</li>
