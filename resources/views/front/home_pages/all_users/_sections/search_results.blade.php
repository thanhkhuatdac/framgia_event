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
