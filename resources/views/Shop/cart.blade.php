@extends('Layout.app')
@section('content')
<!-- top Products -->
<div class="ads-grid_shop">
	<div class="shop_inner_inf">
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>

			<div class="checkout-right">
				<h4>Your shopping cart contains: <span>{{ $carts->count() }}</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>STT</th>
							<th>Sản Phẩm</th>
							<th>Số Lượng</th>
							<th>Tên Sản Phẩm</th>

							<th>Giá</th>
							<th>Xóa</th>
						</tr>
					</thead>
                    
					<tbody>
                        
                        @foreach ($carts as $car)
                        <tr class="rem1">
							<td class="invert">{{ ++$no }}</td>
							<td width="30%" class="invert-image"><a href="single.html"><img src="{{ asset('images/'.$car->prod->image) }}" alt=" " class="img-responsive"></a></td>
							<td class="invert">
                                <form id="update-cart-form-{{ $car->product_id }}" action="{{ route('cart.update', $car->product_id) }}" method="post">
                                    @csrf 
                                    @method('PUT')
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <button type="button" class="entry value-minus">&nbsp;</button>
                                            <input id="quantity-input-{{ $car->product_id }}" class="entry value" value="{{ $car->quantity }}" name="quantity">
                                            <button type="button" class="entry value-plus active">&nbsp;</button>
                                        </div>
                                    </div>
                                </form>
								
							</td>
							<td class="invert">{{ $car->prod->name }}</td>

							<td class="invert">{{ number_format($car->price, 0, ',', '.') }} VNĐ</td>
							<td class="invert">
								{{-- <div class="rem">
									<div class="close1">

                                    </div>
								</div> --}}
                                <a title="Xóa sản phẩm khỏi giỏ hàng" onclick="return confirm('Bạn có chắc muốn xóa không ?')" href="{{ route('cart.delete', $car->product_id) }}"><i class="fa fa-trash-o" style="color: black"></i></a>
							</td>
						</tr>
                        
                        @endforeach
						
						
						

					</tbody>
				</table>
			</div>
			<div class="checkout-left">
				<div class="col-md-4 checkout-left-basket">
					<a href="{{ route('shop.index') }}" class="btn btn-danger" style="padding: 10px 30px; margin-bottom: 15px">Continue to basket</a>
					<ul>
						@foreach ($carts as $car)
                        <li>{{ $car->prod->name }} <i>-</i> <span>{{ number_format($car->price * $car->quantity, 0, ',', '.') }} VNĐ</span></li>
                        
                        @endforeach
                        
						
						
						<li>Total <i>-</i> <span>{{ number_format($total, 0, ',', '.') }} VNĐ</span></li>
					</ul>
				</div>
				<div class="col-md-8 address_form">
					<h4>Tạo đơn</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						@csrf
						<section class="creditly-wrapper wrapper">
							<div class="information-wrapper">
								<div class="first-row form-group">
									<div class="controls">
										<label class="control-label">Họ tên: </label>
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Nhập họ tên" value="{{ $au->name }}">
										@error('name')
										<small class="text-danger">{{ $message }}</small>
										@enderror
									</div>
									<div class="card_number_grids">
										<div class="card_number_grid_left">
											<div class="controls">
												<label class="control-label">Số điện thoại:</label>
												<input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại">
												@error('phone')
												<small class="text-danger">{{ $message }}</small>
												@enderror
											</div>
										</div>
										<div class="card_number_grid_right">
											<div class="controls">
												<label class="control-label">Địa chỉ: </label>
												<input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ">
												@error('address')
												<small class="text-danger">{{ $message }}</small>
												@enderror
											</div>
										</div>
										<div class="clear"> </div>
									</div>
									<div class="controls">
										<label class="control-label">Email: </label>
										<input class="form-control" type="text" name="email" placeholder="Nhập Email" value="{{ $au->email }}">
										@error('email')
											<small class="text-danger">{{ $message }}</small>
										@enderror
									</div>
									
									
								</div>
								<button class="submit check_out" type="submit">Giao đến địa chỉ này</button>
							</div>
						</section>
					</form>
					<div class="checkout-right-basket">
						<a href="#">Make a Payment </a>
					</div>
				</div>

				<div class="clearfix"> </div>


				<div class="clearfix"></div>
			</div>
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
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="fa fa-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
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
	<!-- footer -->
	<div class="footer_agileinfo_w3">
		<div class="footer_inner_info_w3ls_agileits">
			<div class="col-md-3 footer-left">
				<h2><a href="index.html"><span>D</span>owny Shoes </a></h2>
				<p>Lorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
				<ul class="social-nav model-3d-0 footer-social social two">
					<li>
						<a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-9 footer-right">
				<div class="sign-grds">
					<div class="col-md-4 sign-gd">
						<h4>Our <span>Information</span> </h4>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="404.html">Services</a></li>
							<li><a href="404.html">Short Codes</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>

					<div class="col-md-5 sign-gd-two">
						<h4>Store <span>Information</span></h4>
						<div class="address">
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Phone Number</h6>
									<p>+1 234 567 8901</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Email Address</h6>
									<p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Location</h6>
									<p>
										Broome St, NY 10002,California, USA.

									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3 sign-gd flickr-post">
						<h4>Flickr <span>Posts</span></h4>
						<ul>
							<li><a href="single.html"><img src="{{ asset('images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="{{ asset('images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>

			<p class="copy-right-w3ls-agileits">&copy 2018 Downy Shoes. All rights reserved | Design by <a href="http://w3layouts.com/">w3layouts</a></p>
		</div>
	</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var quantityInputs = document.querySelectorAll('.entry.value');
    var valueMinusButtons = document.querySelectorAll('.value-minus');
    var valuePlusButtons = document.querySelectorAll('.value-plus');

    // Xử lý khi nút giảm được nhấn
    valueMinusButtons.forEach(function(button) {
        button.addEventListener('click', function () {
            var quantityInput = button.parentElement.querySelector('.entry.value');
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateCart(quantityInput);
            }
        });
    });

    // Xử lý khi nút tăng được nhấn
    valuePlusButtons.forEach(function(button) {
        button.addEventListener('click', function () {
            var quantityInput = button.parentElement.querySelector('.entry.value');
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            updateCart(quantityInput);
        });
    });

    // Xử lý khi giá trị trong input thay đổi
    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function () {
            updateCart(input);
        });
    });

    // Hàm cập nhật giỏ hàng
    function updateCart(input) {
        var form = input.closest('form');
        form.submit();
    }
});

</script>
@endsection