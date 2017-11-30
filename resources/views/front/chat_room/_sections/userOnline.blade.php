<div class="GridLex-col-12_sm-12_xs-12" id="user-online-{{$user->id}}">
    <div class="user-long-sm-item bg-light border pl-15 pt-15 pr-15 pb-5 clearfix">
        <div class="image">
            <a href="{{ route('userProfile', $user->id) }}">
                {{ Html::image(config('asset.image_path.user_ava') .
                    $user->image, $user->name) }}
            </a>
        </div>
        <div class="content">
            <div class="block">
                @if(check_freelancer($user))
                    <span class="label label-info">{{ $user->role }}</span>
                @else
                    <span class="label label-warning">{{ $user->role }}</span>
                @endif
            </div>
            <h4>
                <a class="midnight-blue online-user"
                    href="{{ route('userProfile', $user->id) }}">
                    {{ $user->name }}
                </a>
            </h4>
            <ul class="user-meta">
                <li><i class="fa fa-map-marker"></i> {{ $user->address }}</li>
            </ul>
        </div>
    </div>
</div>
<div class="clear"></div>
