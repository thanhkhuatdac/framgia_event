<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ Html::favicon(config('asset.image_path.logo_fav') . '/favicon-trungquandev.png') }}

    {{ Html::style('assets/bootstrap/dist/css/bootstrap.css') }}
    {{ Html::style('assets/font-awesome/css/font-awesome.css') }}
    {{ Html::style('assets/AlertifyJS/build/css/alertify.css') }}
    {{ Html::style('assets/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
    {{ Html::style('css/main.css') }}
    {{ Html::style('css/plugin.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/my-custom.css') }}
</head>
<body class="home transparent-header">
    {{-- <div id="introLoader" class="introLoading"></div> --}}
    <div class="container-wrapper">

        @include('front.main_layouts.header_menu')

        <div class="main-wrapper scrollspy-container">
            @yield('content')
        </div>

        @include('front.main_layouts.footer')
    </div>
    <div id="back-to-top">
       <a href="#"><i class="ion-ios-arrow-up"></i></a>
    </div>

    @if(!Auth::check())
        @include('front.users.modal.login')
        @include('front.users.modal.register')
        @include('front.users.modal.forgotPass')
    @endif

    {{ Html::script('assets/jquery/dist/jquery.min.js') }}
    {{ Html::script('js/core-plugins.js') }}
    {{ Html::script('js/customs.js') }}
    {{ Html::script('assets/jquery-flexdatalist/jquery.flexdatalist.js') }}
    {{ Html::script('assets/AlertifyJS/build/alertify.js') }}
    {{ Html::script('assets/moment/min/moment.min.js') }}
    {{ Html::script('assets/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('assets/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('js/my-custom.js') }}

    @stack('scripts')
    @yield('script')
</body>
</html>
