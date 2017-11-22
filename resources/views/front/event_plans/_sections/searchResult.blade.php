<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
    @foreach($eventPlans as $eventPlan)
        <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
            <div class="trip-guide-item bg-light-primary">
                <div class="trip-guide-image">
                    {{ Html::image(config('asset.image_path.event_plan') . $eventPlan->image, $eventPlan->name) }}
                </div>
                <div class="trip-guide-content bg-white">
                    <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}">
                        <h3>{{ $eventPlan->title }}</h3>
                    </a>
                    <p class="related-content">
                        {{ limit_characters($eventPlan->content, 177) }}
                    </p>
                </div>
                <div class="trip-guide-bottom">
                    <div class="trip-guide-person bg-white clearfix">
                        <div class="image">
                            {{ Html::image(config('asset.image_path.user_ava') . $eventPlan->user->image, $eventPlan->user->name, array('class' => 'img-circle')) }}
                        </div>
                        <p class="name">
                            <a href="{{ route('userProfile', $eventPlan->user->id) }}">
                                {{ $eventPlan->user->name }}
                            </a>
                        </p>
                        <p>&nbsp;</p>
                    </div>
                    <p>&nbsp;</p>
                    <div class="trip-guide-meta row gap-10">
                        <div class="col-xs-6 col-sm-6">
                            <div class="rating-item">
                                <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="{{ $eventPlan->total_rate }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row gap-10">
                        <div class="col-xs-12 col-sm-6">
                            <div class="trip-guide-price">
                                {{ trans('subjects_index.price') }}
                                <span class="number">
                                    {{ convert_vnd($eventPlan->amount) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}"
                                    class="btn btn-primary">
                                {{ trans('subjects_index.details') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
