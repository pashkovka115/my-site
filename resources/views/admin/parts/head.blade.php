<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    <link href="{{ asset('assets/admin/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/libs/dropzone/dist/dropzone.css') }}"  rel="stylesheet">
    <link href="{{ asset('assets/admin/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/libs/prismjs/themes/prism-okaidia.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/style.css') }}">
    @yield('style_top')
    @yield('script_top')
    <title>@yield('title', 'Панель администратора')</title>
</head>
<body class="bg-light">
