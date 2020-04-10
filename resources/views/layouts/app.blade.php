<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="\assets\css\app.min.css">
    <link rel="stylesheet" href="\assets\bundles\bootstrap-social\bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="\assets\css\style.css">
    <link rel="stylesheet" href="\assets\css\components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="\assets\css\custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='\assets\img\favicon.ico'>
</head>

<body>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="\assets\js\app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="\assets\js\scripts.js"></script>
<!-- Custom JS File -->
<script src="\assets\js\custom.js"></script>
@yield('js')

</body>
</html>







{{--
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
--}}
