@extends('site.layouts.default')

@section('content')
<section class="product-area product-information-area">
  <div class="container">
    <div class="product-information">
      <div class="row">
        <div class="col-lg-7">
          {{--<div class="edit-checkout-head">
            <div class="header-logo-area">
              <a href="index.html">
                <img class="logo-main" src="assets/img/logo.png" alt="Logo">
              </a>
            </div>
            <div class="breadcrumb-area">
              <ul>
                <li><a class="active" href="shop-cart.html">Cart</a><i class="fa fa-angle-right"></i></li>
                <li class="active">Information<i class="fa fa-angle-right"></i></li>
                <li>Shipping<i class="fa fa-angle-right"></i></li>
                <li>Payment</li>
              </ul>
            </div>
          </div>--}}
          <form action="{{ route('site.order.store') }}" method="post">
            @csrf
          <div class="edit-checkout-information">
            <h4 class="title">Покупатель</h4>
            @guest
              <div class="edit-checkout-form">
                <div class="row row-gutter-12">

                  <div class="col-lg-12">
                    <div class="form-floating">
                      <input type="text" name="customer_name" class="form-control" id="floatingInput01Grid" placeholder="address" value="{{ old('customer_name') }}">
                      <label for="floatingInput01Grid">Имя</label>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-floating">
                      <input type="email" name="customer_email" class="form-control" id="floatingInput02Grid" placeholder="address" value="{{ old('customer_email') }}">
                      <label for="floatingInput02Grid">Email (для авторизации/регистрации)</label>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-floating">
                      <input type="password" name="customer_password" class="form-control" id="floatingInput03Grid" placeholder="address" value="{{ old('customer_password') }}">
                      <label for="floatingInput03Grid">Пароль (для авторизации/регистрации)</label>
                    </div>
                  </div>

                </div>
              </div>
            @else
              <div class="logged-in-information">
                @if(auth()->user()->avatar)
                <div class="thumb" data-bg-img="/storage/{{ auth()->user()->avatar }}"></div>
                @endif
                <p>
                  <span class="name">{{ auth()->user()->name }}</span>
                  <span>({{ auth()->user()->email }})</span>
                  <a href="{{ route('logout') }}">Выйти</a>
                </p>
              </div>
            @endguest


            {{--<div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
              <label class="form-check-label" for="inlineCheckbox1">Согласен с условиями отправки товара</label>
            </div>--}}
            <div class="edit-checkout-form">
              <h4 class="title">Получатель</h4>

              <div class="row row-gutter-12">
                <div class="col-lg-12">
                  <div class="form-floating">
                    <input type="text" name="family" class="form-control" id="floatingInputGrid" placeholder="name" value="{{ old('family') }}">
                    <label for="floatingInputGrid">Фамилия</label>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="floatingInput2Grid" placeholder="name" value="{{ old('name') }}">
                    <label for="floatingInput2Grid">Имя</label>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-floating">
                    <input type="text" name="otchectvo" class="form-control" id="floatingInput3Grid" placeholder="name" value="{{ old('otchectvo') }}">
                    <label for="floatingInput3Grid">Отчество (если есть)</label>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-floating">
                    <input type="text" name="street" class="form-control" id="floatingInput4Grid" placeholder="address" value="{{ old('street') }}">
                    <label for="floatingInput4Grid">Улица</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating">
                    <input type="text" name="house" class="form-control" id="floatingInput5Grid" placeholder="address" value="{{ old('house') }}">
                    <label for="floatingInput5Grid">Дом</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating">
                    <input type="text" name="house_number" class="form-control" id="floatingInput6Grid" placeholder="address" value="{{ old('house_number') }}">
                    <label for="floatingInput6Grid">Квартира (если есть)</label>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput7Grid" placeholder="address" value="{{ old('email') }}">
                    <label for="floatingInput7Grid">Email (для общения со службой поддержки)</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating">
                    <select name="country" class="form-select form-control" id="floatingInput8rid" aria-label="Floating label select example">
                      <option selected>Россия</option>
                      <option value="other_country">В другую страну по договорённости</option>
                    </select>
                    <div class="field-caret"></div>
                    <label for="floatingInput8rid">Страна</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating">
                    <input type="text" name="zip_code" class="form-control" id="floatingInput9Grid" placeholder="address" value="">
                    <label for="floatingInput9Grid">Индекс получателя</label>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-floating">
                    <textarea name="comment" class="form-control" id="floatingInput10Grid" placeholder="address">{{ old('comment') }}</textarea>
                    <label for="floatingInput10Grid">Комментарий к заказу</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="btn-box">
                    <button type="submit" class="btn-shipping">Заказать и оплатить</button>
{{--                    <a class="btn-shipping" href="shop.html">В каталог</a>--}}
{{--                    <a class="btn-return" href="cart.html">В корзину</a>--}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="col-lg-5">
          <div class="shipping-cart-subtotal-wrapper">
            <div class="shipping-cart-subtotal">
              @foreach($items as $item)
              <div class="shipping-cart-item">
                <div class="thumb">
                  @isset($item->attributes['img'])
                  <img src="/storage/{{ $item->attributes['img'] }}" alt="">
                  @endisset
                  <span class="quantity">{{ $item->quantity }}</span>
                </div>
                <div class="content">
                  <h4 class="title">{{ $item->name }}</h4>
{{--                  <span class="info">m / gold</span>--}}
                  <span class="price">{{ \App\Servises\CurrencyConversion::convert($item->price * $item->quantity) }}</span>
                </div>
              </div>
              @endforeach
              <div class="shipping-subtotal">
                <p><span>Сумма</span><span><strong>{{ \App\Servises\CurrencyConversion::convert($total_summ) }}</strong></span></p>
                <p><span>Количество</span><span><strong>{{ $total_qty }}</strong></span></p>
              </div>
              <div class="shipping-subtotal">
                <p><span>Доставка</span><span>---</span></p>
              </div>
              <div class="shipping-total">
                <p class="total">Всего</p>
                <p class="price">{{ \App\Servises\CurrencyConversion::convert($total_summ) }}</p>
{{--                <p class="price"><span class="usd">USD</span>$149.50</p>--}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
