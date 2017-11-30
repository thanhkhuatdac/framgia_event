{{ Html::image(config('asset.image_path.user_ava') . $user->image) }}
<span class="user-name">{{ $user->name }}</span>
<div class="clearfix"></div>
<span class="message-content">{{ $content }}</span>
