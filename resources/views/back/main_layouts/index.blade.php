<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ Html::favicon(config('asset.image_path.logo_fav') . '/favicon-trungquandev.png') }}
        <base href="{{ asset('') }}">
        {{ Html::style('assets/bootstrap/dist/css/bootstrap.css') }}
        {{ Html::style('assets/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('assets/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
        {{ Html::style('assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}
        {{ Html::style('assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}
        {{ Html::style('assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}
        {{ Html::style('assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}
        {{ Html::style('assets/iCheck/skins/flat/green.css') }}
        {{ Html::style('assets/switchery/dist/switchery.min.css') }}
        @yield('css')
        {{ Html::style('assets/gentelella-master-frontend/build/css/custom.min.css') }}
        {{ Html::style('css/my-custom.css') }}
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                @include('back.main_layouts.slide_menu')
                @include('back.main_layouts.header_menu')
                <div class="right_col" role="main">
                    @yield('content')
                </div>
                @include('back.main_layouts.footer')
            </div>
        </div>
        {{ Html::script('assets/jquery/dist/jquery.min.js') }}
        {{ Html::script('assets/bootstrap-min-only/bootstrap.min.js') }}
        {{ Html::script('assets/datatables.net/js/jquery.dataTables.min.js') }}
        {{ Html::script('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
        {{ Html::script('assets/datatables.net-buttons/js/dataTables.buttons.min.js') }}
        {{ Html::script('assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}
        {{ Html::script('assets/datatables.net-buttons/js/buttons.flash.min.js') }}
        {{ Html::script('assets/datatables.net-buttons/js/buttons.html5.min.js') }}
        {{ Html::script('assets/datatables.net-buttons/js/buttons.print.min.js') }}
        {{ Html::script('assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}
        {{ Html::script('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') }}
        {{ Html::script('assets/datatables.net-responsive/js/dataTables.responsive.min.js') }}
        {{ Html::script('assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}
        {{ Html::script('assets/datatables.net-scroller/js/dataTables.scroller.min.js') }}
        {{ Html::script('assets/iCheck/icheck.min.js') }}
        {{ Html::script('assets/switchery/dist/switchery.min.js') }}
        {{ Html::script('assets/pusher-js/dist/web/pusher.min.js') }}
        @yield('script')
        {{ Html::script('assets/gentelella-master-frontend/build/js/custom.js') }}
    </body>
</html>
