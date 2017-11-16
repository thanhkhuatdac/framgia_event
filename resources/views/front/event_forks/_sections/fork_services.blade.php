<div class="fork-service" id="fork-service-{{ $forkPlanService->id }}">
    <a href="javascript:void(0)" id="{{ $forkPlanService->id }}"
            data-url="{{ route('removeForkService',
            ['id' => Auth::user()->id, 'forkServiceId' => $forkPlanService->id]) }}">
        <i class="fa fa-close"></i>
    </a>
    <span class="service-name">
        {{ $service->name }}:
    </span>
    <strong class="service-price orange">
        {{ convert_vnd($service->price) }}
    </strong>
    <div class="clear"></div>
</div>
