<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('ext_css')
    <style>
    .page-header {
        margin-top: 0px;
    }
    </style>
</head>
<body class="bg-light">
    <div id="app">
        @include('layouts.partials.nav')

        <div class="container" style="width:auto;overflow-x:auto;">
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('ext_js')
    @yield('script')
    <script>
        var header = $('h2.page-header').contents();
        str = '';
        mainText = header.filter(function () {
                // return type of text
                return this.nodeType === 3;
            })[0];
        str += mainText.data.trim();

        if (mainText.nextSibling) {
            // next siblings should be a small tag text
            str += " - "+mainText.nextSibling.innerText;
        }
        $('title').prepend(str+" - ");
    </script>
</body>
<footer>
    <br>
    <br>
    </footer>
</html>
