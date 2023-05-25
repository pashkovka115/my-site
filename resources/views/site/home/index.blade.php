@extends('site.layouts.default')

@section('content')
  <!--== Start Product Area Wrapper ==-->
  <section class="product-area product-grid-list-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="product-header-wrap">
            <div class="grid-list-option">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid"
                          type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><span
                      data-bg-img="{{ asset('assets/site/img/icons/1.webp') }}"></span></button>
                  <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list"
                          type="button" role="tab" aria-controls="nav-list" aria-selected="false"><span
                      data-bg-img="{{ asset('assets/site/img/icons/1.webp') }}"></span></button>
                </div>
              </nav>
            </div>
          </div>
          <div class="product-body-wrap">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                <div class="row">

                  @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4 col-xl-4">
                      <!--== Start Shop Item ==-->
                      <div class="product-item">
                        <div class="inner-content">
                          <div class="product-thumb">
                            @if($product->img_announce)
                              <a href="{{ route('site.product.show', ['slug' => $product->slug]) }}">
                                <img class="w-100" src="{{ 'storage/' . $product->img_announce }}" alt="Image-HasTech">
                              </a>
                            @endif
                            <div class="product-action">
                              <div class="addto-wrap">
                                <a class="add-cart"
                                   href="#"
                                   data-id="{{ $product->id }}"
                                >
                                  <span class="icon">
                                    <i class="bardy bardy-shopping-cart"></i>
                                    <i class="hover-icon bardy bardy-shopping-cart"></i>
                                  </span>
                                </a>
                                <a class="add-wishlist" href="wishlist.html">
                                  <span class="icon">
                                    <i class="bardy bardy-wishlist"></i>
                                    <i class="hover-icon bardy bardy-wishlist"></i>
                                  </span>
                                </a>
                                <a class="add-quick-view" href="#" onclick="showProductModal({{ $product->id }})">
                                  <span class="icon">
                                    <i class="bardy bardy-quick-view"></i>
                                    <i class="hover-icon bardy bardy-quick-view"></i>
                                  </span>
                                </a>
                              </div>
                            </div>
                            {{-- todo: Акция
                            <div class="ht-countdown ht-countdown-style" data-date="4/24/2022"></div>--}}
                          </div>
                          <div class="product-desc">
                            <div class="product-info">
                              <h4 class="title">
                                <a
                                  href="{{ route('site.product.show', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                              </h4>
                              {{-- todo: Рейтинг
                              <div class="star-content">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                              </div>--}}
                              <div class="prices">
                                <span class="price">{{ $product->price }}</span>
                                @if($product->old_price)
                                  <span class="price-old">{{ $product->old_price }}</span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--== End Shop Item ==-->
                    </div>
                  @endforeach

                </div>
                <!--== Start Pagination Wrap ==-->
                {{ $products->links() }}
                <!--== End Pagination Wrap ==-->
              </div>
              <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                <div class="row">
                  @foreach($products as $product)
                    <div class="col-12">
                      <!--== Start Shop Item ==-->
                      <div class="product-item product-item-list">
                        <div class="inner-content">
                          <div class="product-thumb">
                            @if($product->img_announce)
                              <a href="{{ route('site.product.show', ['slug' => $product->slug]) }}">
                                <img class="w-100" src="{{ 'storage/' . $product->img_announce }}" alt="Image-HasTech">
                              </a>
                            @endif
                            {{-- todo: Акция
                            <div class="ht-countdown ht-countdown-style" data-date="4/24/2022"></div>--}}
                          </div>
                          <div class="product-desc">
                            <div class="product-info">
                              <h4 class="title">
                                <a
                                  href="{{ route('site.product.show', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                              </h4>
                              {{-- todo: Рейтинг
                              <div class="star-content">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                              </div>--}}
                              <div class="prices">
                                <span class="price">{{ $product->price }}</span>
                                @if($product->old_price)
                                  <span class="price-old">{{ $product->old_price }}</span>
                                @endif
                              </div>
                              {!! $product->announce !!}
                              <div class="product-action">
                                <div class="addto-wrap">
                                  <a class="add-cart"
                                     href="#"
                                     data-id="{{ $product->id }}"
                                  >
                                    <span class="icon">
                                      <i class="bardy bardy-shopping-cart"></i>
                                      <i class="hover-icon bardy bardy-shopping-cart"></i>
                                    </span>
                                  </a>
                                  {{--	todo: wishlist.html	--}}
                                  <a class="add-wishlist" href="wishlist.html">
                                    <span class="icon">
                                      <i class="bardy bardy-wishlist"></i>
                                      <i class="hover-icon bardy bardy-wishlist"></i>
                                    </span>
                                  </a>
                                  <a class="add-quick-view" href="#" onclick="showProductModal({{ $product->id }})">
                                    <span class="icon">
                                      <i class="bardy bardy-quick-view"></i>
                                      <i class="hover-icon bardy bardy-quick-view"></i>
                                    </span>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--== End Shop Item ==-->
                    </div>
                  @endforeach
                </div>
                <!--== Start Pagination Wrap ==-->
                {{ $products->links() }}
                <!--== End Pagination Wrap ==-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Product Area Wrapper ==-->
@endsection

@section('modals')
  @foreach($products as $product)
    <aside class="product-quick-view-modal" data-product_id="{{ $product->id }}">
      <div class="product-quick-view-inner">
        <div class="product-quick-view-content">
          <button type="button" class="btn-close">
            <span class="close-icon"><i class="fa fa-close"></i></span>
          </button>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="thumb">
                @if($product->img_detail)
                  <img src="{{ asset('storage/' . $product->img_detail) }}" alt="Alan-Shop">
                @endif
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="content">
                <h4 class="title">{{ $product->name }}</h4>
                <div class="prices">
                  @if($product->old_price)
                    <del class="price-old">{{ $product->old_price }}</del>
                  @endif
                  <span class="price">{{ $product->price }}</span>
                </div>
                {!! $product->description !!}

                  <div class="product-select-action">
                      @foreach($product->options as $option)
                          <div class="select-item">
                              <div class="select-size-wrap">
                                  <b>{{ $option->name }} :</b>
                                  @if($option->values->count())
                                      <ul style="display: flex; justify-content: center;">
                                          @foreach($option->values as $value)
                                              <li style="margin-right: 10px">{{ $value->name }}</li>
                                          @endforeach
                                      </ul>
                                  @endif
                              </div>
                          </div>
                      @endforeach
                  </div>
                <div class="action-top">
                  <div class="pro-qty">
                    <input type="text" id="quantity{{ $loop->iteration }}" title="Quantity" value="1"/>
                  </div>
                  <a href="#"
                     class="btn btn-black add-cart"
                     data-id="{{ $product->id }}"
                  >В корзину</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="canvas-overlay"></div>
    </aside>
  @endforeach
@endsection

@section('script_bottom')
  @parent
  <script>
      // Add to cart
      $('.add-cart').on('click', function (e) {
          e.preventDefault();
          const $this = $(this);
          const id = $this.data('id');
          let qty = $this.prev().find('input[id^=quantity]').val() ? $this.prev().find('input[id^=quantity]').val() : 1;
          qty = parseInt(qty);

          $.ajax({
              url: "{{ route('site.cart.ajax.add') }}",
              type: 'POST',
              data: {id: id, qty: qty},
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              success: function (res) {
                  let number = parseInt($('button.mini-cart-toggle span.number').text());
                  $('button.mini-cart-toggle span.number').text(number + qty);

                  $('.btn-close').click();

                  let modalMessage = document.querySelector('#message');
                  modalMessage.querySelector('.modal-body h5').textContent = 'Добавлено';

                  let message = new bootstrap.Modal(modalMessage, {
                      keyboard: false
                  });
                  message.show();
                  setTimeout(function () {
                      message.hide();
                  }, 1000);

                  console.log(res)
              },
              error: function (res) {
                  console.log(res);
              }
          });
      });


      function showProductModal(productId) {
          let popupProduct = $('aside[data-product_id=' + productId + ']');
          // console.log(popupProduct)
          popupProduct.addClass('active');
          $("body").addClass("fix");

          $(".btn-close, .canvas-overlay").on('click', function () {
              popupProduct.removeClass('active');
              $("body").removeClass("fix");
          });
      }

      // Remember view style (grid or list)
      let tab_class = 'active';
      let panel_class = 'show';

      let tab_grid = document.querySelector('#nav-grid-tab');
      let nav_grid = document.querySelector('#nav-grid');
      let tab_list = document.querySelector('#nav-list-tab');
      let nav_list = document.querySelector('#nav-list');

      if (localStorage.getItem('grid') === null) {
          localStorage.setItem('grid', 'yes');
          localStorage.setItem('list', 'no');
      }

      if (localStorage.getItem('grid') === 'yes') {
          tab_grid.classList.add(tab_class);
          nav_grid.classList.add(tab_class);
          nav_grid.classList.add(panel_class);

          tab_list.classList.remove(tab_class);
          nav_list.classList.remove(tab_class);
          nav_list.classList.remove(panel_class);

          localStorage.setItem('grid', 'yes');
          localStorage.setItem('list', 'no');
      } else if (localStorage.getItem('grid') === 'no') {
          tab_grid.classList.remove(tab_class);
          nav_grid.classList.remove(tab_class);
          nav_grid.classList.remove(panel_class);

          tab_list.classList.add(tab_class);
          nav_list.classList.add(tab_class);
          nav_list.classList.add(panel_class);

          localStorage.setItem('grid', 'no');
          localStorage.setItem('list', 'yes');
      }

      tab_grid.addEventListener('click', function () {
          localStorage.setItem('grid', 'yes');
          localStorage.setItem('list', 'no');
      });

      tab_list.addEventListener('click', function () {
          localStorage.setItem('grid', 'no');
          localStorage.setItem('list', 'yes');
      });


  </script>
@endsection
