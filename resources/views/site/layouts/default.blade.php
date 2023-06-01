@include('site.parts.header')
<!--== Start Preloader Content ==-->
<div class="preloader-wrap">
    <div class="preloader">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!--== End Preloader Content ==-->

<!--== Start Top Notification Wrapper ==-->
{{--<div class="top-notification-bar">
    <div class="container">
        <div class="row">
            <div class="notification-entry text-center col-12">
                <p>All featured product 50% off <a href="#">Shop Now</a></p>
                <button class="notification-close-btn">X</button>
            </div>
        </div>
    </div>
</div>--}}
<!--== End Top Notification Wrapper ==-->

<!--== Start Header Wrapper ==-->
<header class="header-area header-default sticky-header">
    <div class="container">
        <div class="row align-items-center justify-content-between position-relative">
            <div class="col">
                <div class="header-logo-area">
                    <a href="{{ route('site.home') }}">
                        <img class="logo-main" src=" <?= asset('assets/site') ?>/img/logo.png" alt="Логотип: Мастерские Смирнова"/>
                        <img class="logo d-none" src=" <?= asset('assets/site') ?>/img/logo-light.png" alt="Логотип: Мастерские Смирнова"/>
                    </a>
                </div>
            </div>
            {{--				@include('site.parts.top_menu')--}}
            {{--                <x-menu></x-menu>--}}
            {{--Верхнее меню--}}
            {!! \App\Servises\Menu::name('Верхнее меню'); !!}
            <div class="col">
                <div class="header-action-area">
                    {{--<ul class="header-action">
                        <li class="currency-menu">
                            <?php $code = session('currency', \App\Models\Currency::baseCode()) ?>
                            <?php if ($code){ ?>
                            <a class="title" href="javascript:;">{{ $code }}</a>
                            <?php } ?>
                            <ul class="currency-dropdown">
                                <li class="currency">
                                    <ul>
                                        @foreach(\App\Models\Currency::all() as $currency)
                                            <li class="@if($currency->base) active @endif">
                                                <a href="{{ route('site.currency', ['currencyCode' => $currency->code]) }}">{{ $currency->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>--}}
                    <ul class="header-action">
                        <li class="user-menu">
                            <a class="title" href="javascript:;"><i class="fa fa-user-o"></i></a>
                            <ul class="user-dropdown">
                                <li class="user">
                                    <ul>
                                        @guest
                                        <li><a href="{{ route('login') }}">Войти</a></li>
                                        @endguest
                                        @auth
                                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                                        @endauth
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="header-action">
                        <div class="header-mini-cart">
                            <button class="mini-cart-toggle">
                                <i class="icon bardy bardy-shopping-cart"></i>
                                @isset($_COOKIE[\App\Servises\Site::cartId()])
                                <span class="number">{{ \Cart::session($_COOKIE[\App\Servises\Site::cartId()])->getTotalQuantity() }}</span>
                                @endisset
                            </button>
                            <div class="mini-cart-dropdown">
                                <h4 class="cart-title">Your cart</h4>
                                <div class="cart-item-wrap">
                                    <div class="cart-item">
                                        <div class="thumb">
                                            <a href="#/"><img class="w-100"
                                                              src=" <?= asset('assets/site') ?>/img/shop/cart/mini1.jpg"
                                                              alt="Image-HasTech"></a>
                                            <a class="remove" href="javascript:void(0);"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#/">5. Simple product</a></h5>
                                            <span>1 x Tk 50.00</span>
                                        </div>
                                    </div>
                                    <div class="cart-item">
                                        <div class="thumb">
                                            <a href="#/"><img class="w-100"
                                                              src=" <?= asset('assets/site') ?>/img/shop/cart/mini2.jpg"
                                                              alt="Image-HasTech"></a>
                                            <a class="remove" href="javascript:void(0);"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#/">2. New badge product - m / gold</a></h5>
                                            <span>1 x Tk 80.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mini-cart-footer">
                                    <h4>Subtotal: <span class="total">Tk 130.00</span></h4>
                                    <div class="cart-btn">
                                        <a href="{{ route('site.cart') }}">Корзина</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-action d-block d-lg-none text-end">
                        <button class="btn-menu" type="button"><i class="zmdi zmdi-menu"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--== End Header Wrapper ==-->

@include('site.parts.javascript_message')

<main class="main-content">
    @if($__env->yieldContent('breadcrumbs'))
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="page-header-content">
                            <{{$name_lavel ?? 'h2'}}
                                class="title" data-aos="fade-down"
                            data-aos-duration="1200">@yield('page_title')</{{$name_lavel ?? 'h2'}}>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1000">
                            <ul class="breadcrumb">
                                @foreach($breads as $link => $text)
                                    @if($link != '')
                                        <li><a href="{!! $link !!}">{{ $text }}</a></li>
                                        <li class="breadcrumb-sep">-</li>
                                    @else
                                        <li>{{ $text }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--== End Page Header Area Wrapper ==-->
    @endif
        @if ($errors->any())
            <div class="alert alert-danger msg">
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (\Session::has('success'))
            <div class="alert alert-success msg">
                <ul>
                    <li class="text-center">{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        <script>
            setTimeout(function (){
                let messages = document.querySelectorAll('.msg');
                messages.forEach(function (el){
                    el.style.display = 'none';
                });
            }, 5000);
        </script>

    @yield('content')
</main>
@include('site.parts.footer')
