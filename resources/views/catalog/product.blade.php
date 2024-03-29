@extends('layouts.main')

@section('title', $product->name)

@section('content')
<main id="main" class="main-site">
		<div class="container">
			<x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
				route('category', ['slug' => $category->slug]) => $category->name,
            ]) !!}" page-name="{{ $product->name }}" />
			<div class="row">
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail product">
						<div class="detail-media product-thumnail">
							@if ($product->specificPrice)
        					    <div class="group-flash">
        					        @if ($product->specificPrice->reduction_type == 'percentage')
        					            <span class="flash-item sale-label">&minus;{{ $product->specificPrice->reduction }}%</span>
        					        @else
        					            <span class="flash-item sale-label">&minus;@price($product->specificPrice->reduction)</span>
        					        @endif
        					    </div>
        					@endif
							<div class="product-gallery">
							  <ul class="slides">
							    <li data-thumb="{{ asset('storage/images/p/' . $product->id . '/' . $product->cover) }}">
							    	<img src="{{ asset('storage/images/p/' . $product->id . '/' . $product->cover) }}" alt="{{ $product->name }}" />
							    </li>
								@foreach ($product->images as $image)
							    	<li data-thumb="{{ asset('storage/images/p/' . $product->id . '/' . $image) }}">
							    		<img src="{{ asset('storage/images/p/' . $product->id . '/' . $image) }}" alt="{{ $product->name }}" />
							    	</li>
								@endforeach
							  </ul>
							</div>
						</div>
						<div class="detail-info">
							<div class="product-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <a href="#" class="count-review">(05 review)</a>
                            </div>
							@if ($product->reference)
								<div class="reference">{{ __('Reference:') }} <span>{{ $product->reference }}</span></div>
							@endif
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <div class="short-desc">{!! $product->short_description !!}</div>
                            <div class="wrap-social">
                            	<a class="link-socail" href="#"><img src="{{ asset('images/social-list.png') }}" alt=""></a>
                            </div>
                            @if ($product->specificPrice)
        					    <div class="wrap-price"><ins><p class="product-price">@price($product->regular_price)</p></ins> <del><p class="product-price">@price($product->old_price)</p></del></div>
        					@else
        					    <div class="wrap-price"><span class="product-price">@price($product->regular_price)</span></div>
        					@endif
                            <div class="stock-info in-stock">
                                <p class="availability">{{ __('Availability:') }} <b>{{ __($product->quantity ? 'In Stock' : 'Out Stock') }}</b></p>
                            </div>
							<form class="add-to-cart-form" action="{{ route('cart.store') }}" method="POST">
								<input type="hidden" name="product-id" value="{{ $product->id }}" >
                            	<div class="quantity">
                            		<span>{{ __('Quantity:') }}</span>
									<div class="quantity-input">
										<input type="text" name="product-quantity" value="1" data-max="120" pattern="[0-9]*" >
										<a class="btn btn-reduce" href="#"></a>
										<a class="btn btn-increase" href="#"></a>
									</div>
								</div>
								<div class="wrap-butons">
									<button class="btn add-to-cart">
										{{ __('Add to Cart') }}
										<span {!! Cart::has($product->id) ? 'style="display: flex;"' : '' !!}><i class="fa fa-check"></i></span>
									</button>
                            	    <div class="wrap-btn">
                            	        <a href="#" class="btn btn-compare">{{ __('Add Compare') }}</a>
                            	        <a href="#" class="btn btn-wishlist">{{ __('Add Wishlist') }}</a>
                            	    </div>
								</div>
							</form>
						</div>
						<div class="advance-info">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item active">{{ __('Description') }}</a>
								<a href="#add_infomation" class="tab-control-item">{{ __('Addtional Infomation') }}</a>
								<a href="#review" class="tab-control-item">{{ __('Reviews') }}</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item active" id="description">{!! $product->description !!}</div>
								<div class="tab-content-item " id="add_infomation">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>Weight</th><td class="product_weight">1 kg</td>
											</tr>
											<tr>
												<th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
											</tr>
											<tr>
												<th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="tab-content-item " id="review">
									<div class="wrap-review-form">
										<div id="comments">
											<h2 class="woocommerce-Reviews-title">01 review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span></h2>
											<ol class="commentlist">
												<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
													<div id="comment-20" class="comment_container"> 
														<img alt="" src="{{ asset('images/author-avata.webp') }}" height="80" width="80">
														<div class="comment-text">
															<div class="star-rating">
																<span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
															</div>
															<p class="meta"> 
																<strong class="woocommerce-review__author">admin</strong> 
																<span class="woocommerce-review__dash">–</span>
																<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >Tue, Aug 15,  2017</time>
															</p>
															<div class="description">
																<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
															</div>
														</div>
													</div>
												</li>
											</ol>
										</div><!-- #comments -->
										<div id="review_form_wrapper">
											<div id="review_form">
												<div id="respond" class="comment-respond"> 
													<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
														<p class="comment-notes">
															<span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
														</p>
														<div class="comment-form-rating">
															<span>Your rating</span>
															<p class="stars">
																<label for="rated-1"></label>
																<input type="radio" id="rated-1" name="rating" value="1">
																<label for="rated-2"></label>
																<input type="radio" id="rated-2" name="rating" value="2">
																<label for="rated-3"></label>
																<input type="radio" id="rated-3" name="rating" value="3">
																<label for="rated-4"></label>
																<input type="radio" id="rated-4" name="rating" value="4">
																<label for="rated-5"></label>
																<input type="radio" id="rated-5" name="rating" value="5" checked="checked">
															</p>
														</div>
														<p class="comment-form-author">
															<label for="author">Name <span class="required">*</span></label> 
															<input id="author" name="author" type="text" value="">
														</p>
														<p class="comment-form-email">
															<label for="email">Email <span class="required">*</span></label> 
															<input id="email" name="email" type="email" value="" >
														</p>
														<p class="comment-form-comment">
															<label for="comment">Your review <span class="required">*</span>
															</label>
															<textarea id="comment" name="comment" cols="45" rows="8"></textarea>
														</p>
														<p class="form-submit">
															<input name="submit" type="submit" id="submit" class="submit" value="Submit">
														</p>
													</form>
												</div><!-- .comment-respond-->
											</div><!-- #review_form -->
										</div><!-- #review_form_wrapper -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget widget-our-services ">
						<div class="widget-content">
							<ul class="our-services">
								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Free Shipping</b>
											<span class="subtitle">On Oder Over $99</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-gift" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Special Offer</b>
											<span class="subtitle">Get a gift!</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-reply" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Order Return</b>
											<span class="subtitle">Return within 7 days</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div><!-- Categories widget-->
					@if ($populars)
						<div class="widget mercado-widget widget-product">
							<h2 class="widget-title">{{ __('Popular Products') }}</h2>
							<div class="widget-content">
								<ul class="products">
									@foreach ($populars as $popular)
										<li class="product-item">
											<div class="product product-widget-style">
												<div class="thumbnnail">
													<a href="{{ route('product', ['slug' => $popular->slug]) }}" title="{{ $popular->name }}">
														<figure><img src="{{ asset('storage/images/p/' . $popular->id . '/' . $popular->cover) }}" alt="{{ $popular->name }}"></figure>
													</a>
												</div>
												<div class="product-info">
													<a href="{{ route('product', ['slug' => $popular->slug]) }}" class="product-name"><span>{{ $popular->name }}</span></a>
													<div class="wrap-price"><span class="product-price">@price($product->regular_price)</span></div>
												</div>
											</div>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
					@endif
				</div><!--end sitebar-->
				@if ($product->related)
					<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="wrap-show-advance-info-box style-1 box-in-site">
							<h3 class="title-box">{{ __('Related Products') }}</h3>
							<div class="wrap-products">
								<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
									@foreach ($product->related as $related)
										<div class="product product-style-2 equal-elem ">
											<div class="product-thumnail">
												<a href="{{ route('product', ['slug' => $related->slug]) }}" title="{{ $related->name }}">
													<figure><img src="{{ asset('storage/images/p/' . $related->id . '/' . $related->cover) }}" width="214" height="214" alt="{{ $related->name }}"></figure>
												</a>
												<div class="group-flash">
													<span class="flash-item new-label">new</span>
													<span class="flash-item sale-label">sale</span>
													<span class="flash-item bestseller-label">Bestseller</span>
												</div>
												<div class="wrap-btn">
													<a href="#" class="function-link">quick view</a>
												</div>
											</div>
											<div class="product-info">
												<a href="#" class="product-name"><span>{{ $related->name }}</span></a>
												<div class="wrap-price"><span class="product-price">@price($product->regular_price)</span></div>
												<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
											</div>
										</div>
									@endforeach
								</div>
							</div><!--End wrap-products-->
						</div>
					</div>
				@endif
			</div><!--end row-->
		</div><!--end container-->
	</main>
@endsection