@include('admin.parts.head')

<body class="bg-light">
<!-- container -->
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
            <div>
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @endforeach
            </div>
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        {{--                        <a href="#"><img src="" class="mb-2" alt=""></a>--}}
                        <p class="mb-6">Авторизация</p>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('auth.check') }}" method="post">
                        @csrf
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" required="">
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" id="password" class="form-control" name="password" required="">
                        </div>
                        <!-- Checkbox -->
                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                            <div class="form-check custom-checkbox">
                                <input type="checkbox" class="form-check-input" id="rememberme" name="remember">
                                <label class="form-check-label" for="rememberme">Запомнить меня</label>
                            </div>

                        </div>
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Войти</button>
                            </div>
                            <div class="d-md-flex justify-content-between mt-4">
                                <div class="mb-2 mb-md-0">
                                    <a href="#" class="fs-5">Зарегистрироваться</a>
                                </div>
                                <div>
                                    <a href="#" class="text-inherit fs-5">Забыл пароль?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.parts.footer')
