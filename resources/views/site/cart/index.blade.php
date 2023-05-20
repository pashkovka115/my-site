@extends('site.layouts.default')

@section('content')
  <section class="product-area shopping-cart-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="shopping-cart-wrap">
            <div class="cart-table table-responsive">
              <table class="table">
                <thead>
                <tr>
                  <th class="pro-thumbnail">Изображение</th>
                  <th class="pro-title">Наименование</th>
                  <th class="pro-price">Цена</th>
                  <th class="pro-quantity">Количество</th>
                  <th class="pro-subtotal">Всего</th>
                  <th class="pro-remove">Удалить</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{ route('site.cart.update') }}" method="post">
                  @csrf
                  @php $total_sum = 0; @endphp
                  @foreach($products as $product)
                    <tr>
                      <td class="pro-thumbnail">
                        <a href="{{ route('site.product.show', ['slug' => $product->associatedModel->slug]) }}"
                           target="_blank">
                          @if($product->associatedModel->img_announce)
                            <img src="storage/{{ $product->associatedModel->img_announce }}"
                                 alt="{{ $product->associatedModel->name }}">
                          @else
                            <a href="{{ route('site.product.show', ['slug' => $product->associatedModel->slug]) }}"
                               target="_blank">Ссылка</a>
                          @endif
                        </a>
                      </td>
                      <td class="pro-title">
                        <h4 class="title">
                          <a href="{{ route('site.product.show', ['slug' => $product->associatedModel->slug]) }}">
                            {{ $product->name }}
                          </a>
                        </h4>
                        <span>m / gold</span>
                      </td>
                      <td class="pro-price">
                        <span class="amount">{{ \App\Servises\CurrencyConversion::convert($product->price) }}</span>
                      </td>
                      <td class="pro-quantity">
                        @php //dd($product) @endphp
                        <div class="pro-qty">
                          <input type="hidden" name="cart[{{ $loop->index }}][product_id]" value="{{ $product->id }}">
                          <input type="text" id="quantity" name="cart[{{ $loop->index }}][quantity]" title="Quantity"
                                 value="{{ $product->quantity }}">
                        </div>
                      </td>
                      <td class="pro-subtotal">
                        @php
                          $item_sum = $product->price * $product->quantity;
                          $total_sum += $item_sum;
                        @endphp
                        <span class="subtotal-amount">{{ \App\Servises\CurrencyConversion::convert($item_sum) }}</span>
                      </td>
                      <td class="pro-remove">
                        <a class="remove" href="#/"><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="cart-buttons">
                  <button type="submit" name="count" class="theme-default-button">Пересчитать корзину</button>
                  <button type="submit" name="go_shopping" class="theme-default-button">Продолжить покупки</button>
                  <button type="submit" name="clear_cart" class="theme-default-button">Очистить корзину</button>
                </div>
              </div>
            </div>
            </form>
            <div class="row">
              <div class="col-12">
                <div class="cart-payment">
                  <div class="row">
                    <div class="col-lg-6">
                      {{--<div class="culculate-shipping">
                        <h4 class="title">Get shipping estimatesss</h4>
                        <div class="culculate-shipping-form">
                          <form action="#">
                            <div class="form-row">
                              <div class="col-12">
                                <div class="form-group">
                                  <label class="sr-only" for="address_country" class="form-label">Address Country</label>
                                  <select id="address_country" class="form-select" aria-label="Address Country">
                                    <option selected>---</option>
                                    <option value="1">Afghanistan</option>
                                    <option value="2">Albania</option>
                                    <option value="3">Anguilla</option>
                                    <option value="4">Antigua & Barbuda</option>
                                    <option value="5">Argentina</option>
                                    <option value="6">Armenia</option>
                                    <option value="7">Aruba</option>
                                    <option value="8">Ascension Island</option>
                                    <option value="9">Australia</option>
                                    <option value="10">Austria</option>
                                    <option value="11">Azerbaijan</option>
                                    <option value="12">Bahamas</option>
                                    <option value="13">Bahrain</option>
                                    <option value="14">Bangladesh</option>
                                    <option value="15">Barbados</option>
                                    <option value="16">Belarus</option>
                                    <option value="17">Belgium</option>
                                    <option value="18">Belize</option>
                                    <option value="19">Benin</option>
                                    <option value="20">Brazil</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label class="sr-only" for="address_zip" class="form-label">Zip/Postal Code</label>
                                  <input type="text" class="form-control" id="address_zip" placeholder="Zip/Postal Code">
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <a class="btn-calculate-shop" href="#/">Calculate shipping</a>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>--}}
                    </div>
                    <div class="col-lg-6">
                      <div class="cart-total">
                        <h4 class="title">Итого</h4>
                        <table>
                          <tbody>
                          <tr class="order-total">
                            <th>Количество</th>
                            <td><span class="amount">{{ $total_quantity }}</span></td>
                          </tr>
                          <tr class="order-total">
                            <th>Сумма</th>
                            <td>
                              <span
                                  class="amount">{{ \App\Servises\CurrencyConversion::convert($total_sum) }}<span></span></span>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                        <div class="proceed-to-checkout">
                          <form action="" method="post">
                            @csrf
                            <input type="hidden" name="total_qty" value="{{ $total_quantity }}">
                            <input type="hidden" name="total_sum" value="{{ $total_sum }}">
                            <button type="submit" class="shop-checkout-button">Перейти к оформлению заказа</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script_bottom')
  @parent

@endsection
