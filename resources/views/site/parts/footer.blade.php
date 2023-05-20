<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area bg-color-222">
	<div class="footer-top-area">
		<div class="container">
			<div class="footer-widget-wrap row">
				<div class="col">
					<!--== Start widget Item ==-->
					<div class="widget-item">
						<div class="footer-logo-area">
							<a href="index.html">
								<img class="logo-main" src=" <?= asset('assets/site') ?>/img/logo-light.png" alt="Logo" />
							</a>
						</div>
						<p>People have been using natural objects, such as tree stumps, rocks and moss, as furniture since the beginning of human civilisation.</p>
						<p>Your current address goes to here,120 example, country.</p>
						<p>+12546 687 987  / +15425 987 541</p>
						<p>demo@example.com www.example.com</p>
					</div>
					<!--== End widget Item ==-->
				</div>

				<div class="col">
					<!--== Start widget Item ==-->
					<div class="widget-item">
						<h4 class="widget-title">Quick Link</h4>
						<div class="widget-menu-wrap">
							<ul class="nav-menu">
								<li><a href="page-search.html">Search</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="contact.html">Page</a></li>
								<li><a href="shipping-policy.html">Shipping policy</a></li>
								<li><a href="wishlist.html">Wishlist</a></li>
								<li><a href="shop.html">All Products</a></li>
							</ul>
						</div>
					</div>
					<!--== End widget Item ==-->
				</div>

				<div class="col">
					<!--== Start widget Item ==-->
					<div class="widget-item">
						<h4 class="widget-title">Information</h4>
						<div class="widget-menu-wrap">
							<ul class="nav-menu">
								<li><a href="login.html">Login</a></li>
								<li><a href="#/">My Account</a></li>
								<li><a href="#/">Terms & Conditions</a></li>
								<li><a href="shop-shipping-policy.html">Shipping policy</a></li>
								<li><a href="shop-checkout.html">Payment System</a></li>
								<li><a href="#/">Promotional Offers</a></li>
							</ul>
						</div>
					</div>
					<!--== End widget Item ==-->
				</div>

				<div class="col">
					<!--== Start widget Item ==-->
					<div class="widget-item">
						<h4 class="widget-title">Follow us</h4>
						<div class="widget-menu-wrap">
							<ul class="nav-menu">
								<li><a href="#/">Facebook</a></li>
								<li><a href="#/">Twitter</a></li>
								<li><a href="#/">Instagram</a></li>
								<li><a href="#/">LinkedIn</a></li>
								<li><a href="#/">Google Plus</a></li>
								<li><a href="#/">YouTube</a></li>
							</ul>
						</div>
					</div>
					<!--== End widget Item ==-->
				</div>
			</div>
		</div>
	</div>
</footer>
<!--== End Footer Area Wrapper ==-->

<!--== Scroll Top Button ==-->
<div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

@yield('modals')

<!--== Start Side Menu ==-->
<aside class="off-canvas-wrapper">
	<div class="off-canvas-inner">
		<div class="off-canvas-overlay"></div>
		<!-- Start Off Canvas Content Wrapper -->
		<div class="off-canvas-content">
			<!-- Off Canvas Header -->
			<div class="off-canvas-header">
				<div class="close-action">
					<button class="btn-menu-close">menu <i class="fa fa-chevron-left"></i></button>
				</div>
			</div>

			<div class="off-canvas-item">
				<!-- Start Mobile Menu Wrapper -->
				<div class="res-mobile-menu menu-active-one">
					<!-- Note Content Auto Generate By Jquery From Main Menu -->
				</div>
				<!-- End Mobile Menu Wrapper -->
			</div>
		</div>
		<!-- End Off Canvas Content Wrapper -->
	</div>
</aside>
<!--== End Side Menu ==-->
</div>

<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/bootstrap.min.js"></script>
<!--=== jQuery Appear Js ===-->
<script src=" <?= asset('assets/site') ?>/js/jquery.appear.js"></script>
<!--=== jQuery Headroom Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/headroom.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/fancybox.min.js"></script>
<!--=== jQuery Slick Nav Js ===-->
<script src=" <?= asset('assets/site') ?>/js/slicknav.js"></script>
<!--=== jQuery Waypoint Js ===-->
<script src=" <?= asset('assets/site') ?>/js/waypoint.js"></script>
<!--=== jQuery Parallax Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/parallax.min.js"></script>
<!--=== jQuery Aos Min Js ===-->
<script src=" <?= asset('assets/site') ?>/js/aos.min.js"></script>
<!--=== jQuery Countdown Js ===-->
<script src=" <?= asset('assets/site') ?>/js/countdown.js"></script>

@yield('script_bottom')

<!--=== jQuery Custom Js ===-->
<script src=" <?= asset('assets/site') ?>/js/custom.js"></script>
</body>

</html>
