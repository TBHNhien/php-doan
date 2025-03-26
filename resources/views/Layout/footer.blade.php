<!-- footer -->
<div class="footer_agileinfo_w3">
    <div class="footer_inner_info_w3ls_agileits">
        <div class="col-md-3 footer-left">
            <h2><a href="~/index.html"><span>D</span>owny Shoes </a></h2>
            <p>Lorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
            <ul class="social-nav model-3d-0 footer-social social two">
                <li>
                    <a href="~/#" class="facebook">
                        <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                    </a>
                </li>
                <li>
                    <a href="~/#" class="twitter">
                        <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                    </a>
                </li>
                <li>
                    <a href="~/#" class="instagram">
                        <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                    </a>
                </li>
                <li>
                    <a href="~/#" class="pinterest">
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
                        <li><a href="~/index.html">Home</a></li>
                        <li><a href="~/about.html">About</a></li>
                        <li><a href="~/404.html">Services</a></li>
                        <li><a href="~/404.html">Short Codes</a></li>
                        <li><a href="~/contact.html">Contact</a></li>
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
                                <p>Email :<a href="~/mailto:example@email.com"> mail@example.com</a></p>
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
                        <li><a href="~/single.html"><img src="{{ asset('images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
                        <li><a href="~/single.html"><img src="{{ asset('images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>

        
    </div>
</div>

<!-- //footer -->
<a href="~/#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<!-- //js -->
<!-- /nav -->
<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/demo1.js') }}"></script>
<!-- //nav -->
<!-- cart-js -->
<script src="{{ asset('js/minicart.js') }}"></script>
<script>
    shoe.render({
        action: '/bills/checkout'  
    });
        
    shoe.cart.on('shoe_checkout', function (evt) {
        
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) { }
        }
    });
</script>
<!-- //cart-js -->
<!--search-bar-->
<script src="{{ asset('js/search.js') }}"></script>
<!--//search-bar-->
<script src="{{ asset('js/responsiveslides.min.js') }}"></script>
<script>
    $(function () {
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 1000,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>
<!-- js for portfolio lightbox -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smoth-scrolling -->



<!-- detail.cshtml script -->
<!-- single -->
<script src="{{ asset('js/imagezoom.js') }}"></script>
<!-- single -->
<!-- script for responsive tabs -->
<script src="{{ asset('js/easy-responsive-tabs.js') }}"></script>
<script>
    $(document).ready(function () {

        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!-- FlexSlider -->
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script>

    // Can also be used with $(document).ready()
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- //FlexSlider-->
<!-- detail.cshtml script -->




<!-- checkout.cshtml script -->
<!--quantity-->
<script>
    $('.value-plus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) + 1;
        divUpd.text(newVal);
    });

    $('.value-minus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) - 1;
        if (newVal >= 1) divUpd.text(newVal);
    });
</script>
<!--quantity-->
<script>
    $(document).ready(function (c) {
        $('.close1').on('click', function (c) {
            $('.rem1').fadeOut('slow', function (c) {
                $('.rem1').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function (c) {
        $('.close2').on('click', function (c) {
            $('.rem2').fadeOut('slow', function (c) {
                $('.rem2').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function (c) {
        $('.close3').on('click', function (c) {
            $('.rem3').fadeOut('slow', function (c) {
                $('.rem3').remove();
            });
        });
    });
</script>

<!-- checkout.cshtml script -->




<script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>



{{-- @await RenderSectionAsync("Scripts", required: false) --}}