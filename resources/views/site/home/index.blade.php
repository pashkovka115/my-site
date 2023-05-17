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
										<button class="nav-link" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><span data-bg-img="{{ asset('assets/site/img/icons/1.webp') }}"></span></button>
										<button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><span data-bg-img="{{ asset('assets/site/img/icons/1.webp') }}"></span></button>
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
														<a href="shop-single.html">
															<img class="w-100" src="{{ 'storage/' . $product->img_announce }}" alt="Image-HasTech">
														</a>
														@endif
														<div class="product-action">
															<div class="addto-wrap">
																<a class="add-cart" href="shop-cart.html">
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
																<a class="add-quick-view" href="javascript:void(0);">
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
															<h4 class="title"><a href="shop-single.html">{{ $product->name }}</a></h4>
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
										{{--<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/1.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">1. New and sale badge product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 110.00 </span>
																<span class="price-old">Tk 130.00</span>
															</div>
															<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/11.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">10. This is the large title for testing large title and there is an image for testing</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 19.00 </span>
																<span class="price-old">Tk 21.00</span>
															</div>
															<p>A long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal...</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/10.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">11. Product with video</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 39.00 </span>
															</div>
															<p>As opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for...</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/2.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">2. New badge product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 80.00 </span>
															</div>
															<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/3.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">3. Variable product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 40.00 </span>
																<span class="price-old">Tk 85.00</span>
															</div>
															<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/4.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">4. Soldout product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 19.00 </span>
																<span class="price-old">Tk 29.00</span>
															</div>
															<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/5.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">5. Simple product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 50.00 </span>
															</div>
															<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/6.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">6. Variable with soldout product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 55.00 </span>
																<span class="price-old">Tk 75.00</span>
															</div>
															<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/7.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">7. Sample affiliate product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 29.00 </span>
															</div>
															<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										</div>--}}
										@foreach($products as $product)
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														@if($product->img_announce)
														<a href="shop-single.html">
															<img class="w-100" src="{{ 'storage/' . $product->img_announce }}" alt="Image-HasTech">
														</a>
														@endif
														{{-- todo: Акция
														<div class="ht-countdown ht-countdown-style" data-date="4/24/2022"></div>--}}
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">{{ $product->name }}</a></h4>
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
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										{{--<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/9.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">9. Without shortcode product</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 79.00 </span>
															</div>
															<p>we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that...</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/12.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">Demo product title</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 29.00 </span>
															</div>
															<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/5.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">Demo product title</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 50.00 </span>
															</div>
															<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/13.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">Demo product title</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 80.00 </span>
															</div>
															<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										<div class="col-12">
											<!--== Start Shop Item ==-->
											<div class="product-item product-item-list">
												<div class="inner-content">
													<div class="product-thumb">
														<a href="shop-single.html">
															<img class="w-100" src="assets/img/shop/14.jpg" alt="Image-HasTech">
														</a>
													</div>
													<div class="product-desc">
														<div class="product-info">
															<h4 class="title"><a href="shop-single.html">Demo product title</a></h4>
															<div class="star-content">
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="prices">
																<span class="price">Tk 19.00 </span>
																<span class="price-old">Tk 21.00</span>
															</div>
															<p>A long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal...</p>
															<div class="product-action">
																<div class="addto-wrap">
																	<a class="add-cart" href="shop-cart.html">
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
																	<a class="add-quick-view" href="javascript:void(0);">
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
										</div>--}}
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
	<aside class="product-quick-view-modal">
		<div class="product-quick-view-inner">
			<div class="product-quick-view-content">
				<button type="button" class="btn-close">
					<span class="close-icon"><i class="fa fa-close"></i></span>
				</button>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<div class="thumb">
							<img src=" <?= asset('assets/site') ?>/img/shop/quick-view1.jpg" alt="Alan-Shop">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<div class="content">
							<h4 class="title">3. Variable product</h4>
							<div class="prices">
								<del class="price-old">$85.00</del>
								<span class="price">$70.00</span>
							</div>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
							<div class="quick-view-select">
								<div class="quick-view-select-item">
									<label for="forSize" class="form-label">Size:</label>
									<select class="form-select" id="forSize" required>
										<option selected value="">s</option>
										<option>m</option>
										<option>l</option>
										<option>xl</option>
									</select>
								</div>
								<div class="quick-view-select-item">
									<label for="forColor" class="form-label">Color:</label>
									<select class="form-select" id="forColor" required>
										<option selected value="">red</option>
										<option>green</option>
										<option>blue</option>
										<option>yellow</option>
										<option>white</option>
									</select>
								</div>
							</div>
							<div class="action-top">
								<div class="pro-qty">
									<input type="text" id="quantity2" title="Quantity" value="1" />
								</div>
								<button class="btn btn-black">Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="canvas-overlay"></div>
	</aside>
@endsection

@section('script_bottom')
	<script>
		let tab_class = 'active';
		let panel_class = 'show';

		let tab_grid = document.querySelector('#nav-grid-tab');
		let nav_grid = document.querySelector('#nav-grid');
		let tab_list = document.querySelector('#nav-list-tab');
		let nav_list = document.querySelector('#nav-list');

		if (localStorage.getItem('grid') === null){
			localStorage.setItem('grid', 'yes');
			localStorage.setItem('list', 'no');
		}

		if (localStorage.getItem('grid') === 'yes'){
			tab_grid.classList.add(tab_class);
			nav_grid.classList.add(tab_class);
			nav_grid.classList.add(panel_class);

			tab_list.classList.remove(tab_class);
			nav_list.classList.remove(tab_class);
			nav_list.classList.remove(panel_class);

			localStorage.setItem('grid', 'yes');
			localStorage.setItem('list', 'no');
		}
		else if (localStorage.getItem('grid') === 'no'){
			tab_grid.classList.remove(tab_class);
			nav_grid.classList.remove(tab_class);
			nav_grid.classList.remove(panel_class);

			tab_list.classList.add(tab_class);
			nav_list.classList.add(tab_class);
			nav_list.classList.add(panel_class);

			localStorage.setItem('grid', 'no');
			localStorage.setItem('list', 'yes');
		}

		tab_grid.addEventListener('click', function (){
			localStorage.setItem('grid', 'yes');
			localStorage.setItem('list', 'no');
		});

		tab_list.addEventListener('click', function (){
			localStorage.setItem('grid', 'no');
			localStorage.setItem('list', 'yes');
		});


	</script>
@endsection
