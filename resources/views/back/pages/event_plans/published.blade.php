@extends('back.main_layouts.index')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if(Session::has('unapproved'))
            <div class="alert alert-success">
                {{ session('unapproved') }}
            </div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ trans('back_published_event.publishedEventPlans') }}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" cellspacing="0" width="100%"
                    class="table table-striped table-bordered dt-responsive nowrap list-news">
                    <thead>
                        <tr>
                            <th>{{ trans('back_published_event.stt') }}</th>
                            <th>{{ trans('back_published_event.title') }}</th>
                            <th>{{ trans('back_published_event.user') }}</th>
                            <th>{{ trans('back_published_event.image') }}</th>
                            <th>{{ trans('back_published_event.date') }}</th>
                            <th class="nephritis">{{ trans('back_published_event.view') }}</th>
                            <th class="belizeHole">{{ trans('back_published_event.unapprove') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventPlans as $item)
                            <tr class="alignCenter">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    {{ Html::image(config('asset.image_path.event_plan') . $item->image,
                                        $item->image, array('class' => 'img-event-plan-dashboard')) }}
                                </td>
                                <td>{{ $item->created_at->format('H:i, d M Y') }}</td>
                                <td>
                                    <a href="{{ route('eventPlanIndex', $item->slug) }}" target="__blank">
                                        <i class="fa fa-eye nephritis"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('unapproveEvent', $item->id) }}">
                                        <i class="fa fa-close belizeHole"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
