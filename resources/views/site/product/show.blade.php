@extends('site.layouts.default')

@section('window_title'){{ $item->title }}@endsection
@section('meta_keywords'){{ $item->meta_keywords }}@endsection
@section('meta_description'){{ $item->meta_description }}@endsection
@section('page_title'){{ $item->name }}@endsection

@section('content')
	<section class="product-area product-single-area">
		<div class="container">
			<div class="row flex-row-reverse">
				<div class="col-lg-12">
					<div class="product-single-item">
						<div class="row">
							<div class="col-lg-6">
								<div class="product-single-slider">
									<!--== Start Product Thumbnail Area ==-->
									@if($item->gallery->count())
									<div class="product-thumb">
										<div class="swiper-container single-product-thumb-slider">
											<div class="swiper-wrapper">
												@foreach($item->gallery as $img)
												<div class="swiper-slide">
													<div class="zoom zoom-hover">
														<a class="lightbox-image" data-fancybox="gallery" href="{{ asset('/storage/'.$img->src) }}">
															<img src="{{ asset('/storage/'.$img->src) }}" alt="Image-HasTech">
														</a>
													</div>
												</div>
												@endforeach
											</div>
										</div>
									</div>
									@endif
									<!--== End Product Thumbnail Area ==-->

									<!--== Start Product Nav Area ==-->
									<div class="swiper-container single-product-nav-slider product-nav">
										<div class="swiper-wrapper">
											@foreach($item->gallery as $img)
											<div class="swiper-slide">
												<img src="{{ $item->makeThumbnailFrom($img->src, '160x160') }}" alt="Image-HasTech">
											</div>
											@endforeach
										</div>

										<!--== Add Swiper navigation Buttons ==-->
										<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
										<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
									</div>
									<!--== End Product Nav Area ==-->
								</div>
							</div>
							<div class="col-lg-6">
								<!--== Start Product Info Area ==-->
								<div class="product-single-info">
									<{{ $item->name_lavel }} class="title">{{ $item->name }}</{{ $item->name_lavel }}>
									<div class="prices">
										<span class="price">{{ $item->price }}</span>
										@if($item->old_price)
										<span class="price-old">{{ $item->old_price }}</span>
										@endif
									</div>
									<div class="star-content">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									{!! $item->announce !!}
									<div class="product-select-action">
										@foreach($item->options as $option)
										<div class="select-item">
											<div class="select-size-wrap">
												<span>{{ $option->name }} :</span>
												@if($option->values->count())
												<ul>
													@foreach($option->values as $value)
													<li>{{ $value->name }}</li>
													@endforeach
												</ul>
												@endif
											</div>
										</div>
										@endforeach
									</div>
									<div class="product-action-simple">
										<div class="product-quick-action">
											<div class="product-quick-qty">
												<span>Quantity:</span>
												<div class="pro-qty">
													<input type="text" id="quantity" title="Quantity" value="1">
												</div>
											</div>
										</div>
										<div class="cart-wishlist-button">
											<a href="#" class="btn-cart add-cart" data-id="{{ $item->id }}">Добавить в корзину</a>
											<div class="product-wishlist">
												<a class="add-wishlist" href="wishlist.html">
                            <span class="icon">
                              <i class="bardy bardy-wishlist"></i>
                              <i class="hover-icon bardy bardy-wishlist"></i>
                            </span>
												</a>
											</div>
										</div>
										<div class="buy-now-btn">
											<button class="btn btn-Buy">Buy it now</button>
										</div>
									</div>
									<div class="product-action-bottom">
										<div class="social-sharing">
											<span>Share:</span>
											<div class="social-icons">
												<a href="#/"><i class="shopify-social-icon-facebook-rounded color"></i></a>
												<a href="#/"><i class="shopify-social-icon-twitter-rounded color"></i></a>
												<a href="#/"><i class="shopify-social-icon-googleplus-rounded color"></i></a>
												<a href="#/"><i class="shopify-social-icon-pinterest-rounded color"></i></a>
											</div>
										</div>
										<div class="text-info">
											<p>Guaranteed safe checkout</p>
										</div>
									</div>
								</div>
								<!--== End Product Info Area ==-->
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="product-review-tabs-content">
									<div class="nav nav-tabs product-tab-nav" id="ReviewTab" role="tablist">
										<button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" aria-controls="description" aria-selected="true">Описание</button>
									</div>
									<div class="tab-content product-tab-content" id="ReviewTabContent">
										<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
											<div class="product-description">
												{!! $item->description !!}
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
	<script src="{{ asset('assets/site/js/jquery-zoom.min.js') }}"></script>
	<script>
		// Images Zoom
		$('.zoom-hover').zoom();

		// Add to cart
		$('.add-cart').on('click', function (e){
			e.preventDefault();
			const $this = $(this);
			const id = $this.data('id');
			let qty = $this.parents().prev().find('input[id^=quantity]').val() ? $this.parents().prev().find('input[id^=quantity]').val() : 1;
			qty = parseInt(qty);

			$.ajax({
				url: "{{ route('site.cart.ajax.add') }}",
				type: 'POST',
				data: {id: id, qty: qty},
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}'
				},
				success: function (res){
					let number = parseInt($('button.mini-cart-toggle span.number').text());
					$('button.mini-cart-toggle span.number').text(number + qty);
					console.log(res)
				},
				error: function (res){
					console.log(res);
				}
			});
		});
	</script>
@endsection
