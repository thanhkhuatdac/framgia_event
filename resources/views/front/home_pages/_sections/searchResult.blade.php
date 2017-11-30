@foreach($subjects as $subject)
    <a href="{{ route('allEventPlans', $subject->slug) }}">
        <li class="list-group-item">{{ $subject->title }}</li>
    </a>
@endforeach
