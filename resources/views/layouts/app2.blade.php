<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    @routes()
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('message.web') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.left_panel')

        <div id="right-panel" class="right-panel">

            @include('layouts.header')

            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>{{ __('message.title.dashboard') }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                @yield('page-title')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">

                @yield('content')

            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('script')

</body>
</html>
