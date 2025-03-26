@extends('Layout.app')
@section('content')
<!-- top Products -->
<div class="ads-grid_shop">
	<div class="shop_inner_inf">
		<!-- tittle heading -->
		<!-- //tittle heading -->
		<!-- product left -->
		<div class="side-bar col-md-3">
			<div class="search-hotel">
				<h3 class="agileits-sear-head">Search Here..</h3>
				<form action="#" method="post">
					<input type="search" placeholder="Product name..." name="search" required="">
					<input type="submit" value=" ">
				</form>
			</div>
			<!-- price range -->
			<div class="range">
				<h3 class="agileits-sear-head">Price range</h3>
				<ul class="dropdown-menu6">
					<li>

						<div id="slider-range"></div>
						<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
					</li>
				</ul>
			</div>
			<!-- //price range -->
			<!--preference -->
			<div class="left-side">
				<h3 class="agileits-sear-head">Danh Mục</h3>
				<ul>
					@foreach ($categories as $cat)
					<li>
						<input type="checkbox" onclick="load('{{ $cat->id }}')" class="checked">
						<span class="span">{{ $cat->name }}</span>
					</li>
					@endforeach
					
					
				</ul>
			</div>
			<!-- // preference -->
			<!-- discounts -->
			<div class="left-side">
				<h3 class="agileits-sear-head">Khuyến mãi</h3>
				<ul>
					<li>
						<input type="checkbox" class="checked">
						<span class="span">5% or More</span>
					</li>
					<li>
						<input type="checkbox" class="checked">
						<span class="span">10% or More</span>
					</li>
					<li>
						<input type="checkbox" class="checked">
						<span class="span">20% or More</span>
					</li>
					<li>
						<input type="checkbox" class="checked">
						<span class="span">30% or More</span>
					</li>
					<li>
						<input type="checkbox" class="checked">
						<span class="span">50% or More</span>
					</li>
					<li>
						<input type="checkbox" class="checked">
						<span class="span">60% or More</span>
					</li>
				</ul>
			</div>
			<!-- //discounts -->
			<!-- reviews -->
			<div class="customer-rev left-side">
				<h3 class="agileits-sear-head">Đánh giá khách hàng</h3>
				<ul>
					<li>
						<a href="~/#">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<span>5.0</span>
						</a>
					</li>
					<li>
						<a href="~/#">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<span>4.0</span>
						</a>
					</li>
					<li>
						<a href="~/#">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<span>3.5</span>
						</a>
					</li>
					<li>
						<a href="~/#">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<span>3.0</span>
						</a>
					</li>
					<li>
						<a href="~/#">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<span>2.5</span>
						</a>
					</li>
				</ul>
			</div>
			<!-- //reviews -->
			

		</div>
		<!-- //product left -->
		<!-- product right -->
		<div class="left-ads-display col-md-9">
			<div class="wrapper_top_shop">
				<div class="col-md-6 shop_left">
					<img src="{{ asset('images/banner3.jpg') }}" alt="">
					<h6>40% off</h6>
				</div>
				<div class="col-md-6 shop_right">
					<img src="{{ asset('images/banner2.jpg') }}" alt="">
					<h6>50% off</h6>
				</div>
				<div class="clearfix"></div>
				<!-- product-sec1 -->
				<div class="product-sec1" id="showProducts">
					<!--/mens-->
					@foreach ($products as $pro)
					<div class="col-md-4 product-men">
						<div class="product-shoe-info shoe">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<img height="400px" src="{{ asset('images/'.$pro->image) }}" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href ="{{ route('shop.product', $pro->id) }}" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product">
									<h4>
										<a href ="{{ route('shop.product', $pro->id) }}">{{ $pro->name }}</a>
									</h4>
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<div class="grid-price ">
													<span class="money ">{{ number_format($pro->price, 0, ',', '.') }} VNĐ</span>
												</div>
											</div>
											<ul class="stars">
												<li><a href="~/#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="~/#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="~/#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="~/#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												<li><a href="~/#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											</ul>
										</div>
										<div class="shoe single-item hvr-outline-out">
											{{-- <form action="#" method="post">
												<input type="hidden" name="cmd" value="_cart">
												<input type="hidden" name="add" value="1">
												<input type="hidden" name="shoe_item" value="Bella Toes">
												<input type="hidden" name="amount" value="675.00">
												<button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>

												<a href="~/#" data-toggle="modal" data-target="#myModal1"></a>
											</form> --}}
											@if (auth()->check())
											<a title="Thêm vào giỏ hàng" href="{{ route('cart.add', $pro->id) }}"><i class="fa fa-cart-plus" style="color: black"></i></a>
											@else
											<a title="Thêm vào giỏ hàng" href="{{ route('account.login') }}" onclick="alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng')"><i class="fa fa-cart-plus" style="color: black"></i></a>
											@endif
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					
					
					<!-- //mens -->
					
					<div class="clearfix"></div>

				</div>
				{{ $products->links() }}
				<!-- //product-sec1 -->
				<div class="col-md-6 shop_left shp">
					<img src="{{ asset('images/banner4.jpg') }}" alt="">
					<h6>21% off</h6>
				</div>
				<div class="col-md-6 shop_right shp">
					<img src="{{ asset('images/banner1.jpg') }}" alt="">
					<h6>31% off</h6>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //top products -->
<div class="mid_slider_w3lsagile">
	<div class="col-md-3 mid_slider_text">
		<h5>Some More Shoes</h5>
	</div>
	<div class="col-md-9 mid_slider_info">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class=""></li>
				<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="2" class=""></li>
				<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g3.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g4.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
					</div>
				</div>
				<div class="item active">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g5.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g6.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g3.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g4.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g3.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 slidering">
							<div class="thumbnail"><img src="{{ asset('images/g4.jpg') }}" alt="Image" style="max-width:100%;"></div>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="~/#myCarousel" role="button" data-slide="prev">
				<span class="fa fa-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="~/#myCarousel" role="button" data-slide="next">
				<span class="fa fa-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<!-- The Modal -->

		</div>
	</div>

	<div class="clearfix"> </div>
</div>
<!-- /newsletter-->
<div class="newsletter_w3layouts_agile">
	<div class="col-sm-6 newsleft">
		<h3>Sign up for Newsletter !</h3>
	</div>
	<div class="col-sm-6 newsright">
		<form action="#" method="post">
			<input type="email" placeholder="Enter your email..." name="email" required="">
			<input type="submit" value="Submit">
		</form>
	</div>

	<div class="clearfix"></div>
</div>
<!-- //newsletter-->  


<script>
    function load(category_id) {
        $.ajax({
            url: `shop/productsByCategory/${category_id}`,
            type: "GET",
            success: function(data) {
                var products = data.products;
				console.log(products);
    			
                
            }
        });
    }
</script>


@endsection
