<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/theme.min.css') }}">
    <title>404 error</title>
</head>

<body class="bg-white">
<!-- Error page -->
<div class="container min-vh-100 d-flex justify-content-center
      align-items-center">
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-12">
            <!-- content -->
            <div class="text-center">
                <div class="mb-3">
                    <!-- img -->
                    <img src="{{ asset('assets/admin/images/error/404-error-img.png') }}" alt="" class="img-fluid">
                </div>
                <!-- text -->
                <h1 class="display-4 fw-bold">Оопс... Страница не найдена.</h1>

                <a href="{{ route('site.home') }}" class="btn btn-primary">На главную</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>
