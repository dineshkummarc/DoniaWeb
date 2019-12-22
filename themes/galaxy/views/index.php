<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?=get_option("website_title", "Stackposts - Social Marketing Tool")?></title>
        <meta name="description" content="<?=get_option("website_description", "save time, do more, manage multiple social networks at one place")?>" />
        <meta name="keywords" content="<?=get_option("website_keyword", 'social marketing tool, social planner, automation, social schedule')?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
		<link rel="icon" type="image/png" href="<?=get_option("website_favicon", BASE.'assets/themes/galaxy/assets/plus/img/favicon.png')?>" />
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/meanmenu.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/fontawesome-all.min.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/slick.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/dripicons.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/default.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plus/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/plugins/ladda/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE?>themes/galaxy/assets/css/style.css">
    </head>
    <body>

		<!-- header-start -->
		<header class="header-transparent">
			<div id="sticky-header" class="main-menu-area menu-area-2">
				<div class="container">
					<div class="menu-bg">
						<div class="row">
							<div class="col-xl-3 col-lg-3 d-flex align-items-center">
								<div class="logo" href="<?=PATH?>">
		  		                <a href="<?=PATH?>"><img src="<?=get_option("website_logo_white", BASE.'assets/img/logo-white.png')?>"></a>
								</div>
							</div>
							<div class="col-xl-9 col-lg-9">
								<div class="menu-bar info-bar text-right d-none d-md-none d-lg-block">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="main-menu text-right">
									<nav id="mobile-menu">
										<ul>
											<li class="active"><a href="<?=PATH?>"><?=lang("home")?></a>
											</li>
											<li><a href="<?=PATH?>#features"><?=lang("features")?></a>
											</li>
											<li><a href="<?=PATH?>#pricing"><?=lang("pricing")?></a>
											</li>
                                            <li><a href="<?=PATH?>blog"><?=lang("Blog")?></a>
											</li>
                                            <li><a href="<?=PATH?>#faq"><?=lang("F.A.Q")?></a>
                                            </li>
                                            <li><a href="<?=PATH?>contact"><?=lang("Contact")?></a>
                                            </li>
			                                <li>
			                            	<?php if(!session("uid")){?>
				                              	<a href="<?=cn("auth/login")?>" class=""><?=lang("login")?></a></li>
				                                <?php if(get_option("singup_enable", 1)){?>
				                                <li><a href="<?=cn("auth/signup")?>" class=""><?=lang("signup")?></a></li>
			                                <?php }?>
			                            <?php }else{?>
			                            <a href="<?=cn("dashboard")?>" class=""><?=lang("dashboard")?></a>
			                            <?php }?>
									</nav>
								</div>
								<div class="mobile-menu"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="extra-info">
				<div class="close-icon">
					<button>
						<i class="far fa-window-close"></i>
					</button>
				</div>
				<div class="logo-side mb-30">
					<div class="logo" href="<?=PATH?>">
		  		                <img src="<?=get_option("website_logo_white", BASE.'assets/img/logo-white.png')?>"></a>
				<div class="side-info mb-30">
					<div class="contact-list mb-30">
						<h4>Office Address</h4>
						<p>123/A, Miranda City Likaoli
							Prikano, Dope</p>
					</div>
					<div class="contact-list mb-30">
						<h4>Phone Number</h4>
						<p>+0989 7876 9865 9</p>
						<p>+(090) 8765 86543 85</p>
					</div>
					<div class="contact-list mb-30">
						<h4>Email Address</h4>
						<p>info@example.com</p>
						<p>example.mail@hum.com</p>
					</div>
				</div>
				<div class="social-icon-right mt-20">
					<a href="#">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a href="#">
						<i class="fab fa-twitter"></i>
					</a>
					<a href="#">
						<i class="fab fa-google-plus-g"></i>
					</a>
					<a href="#">
						<i class="fab fa-instagram"></i>
					</a>
				</div>
			</div>
		</header>
		<!-- header-end -->


		<!-- slider-start -->
		<div class="slider-area">
			<div class="slider-wrapper">
				<div class="single-slider slider-height" style="background-image:url(themes/galaxy/assets/plus/img/slider/slide.jpg)">
					<div class="container">
						<div class="row ">
							<div class="col-xl-8 offset-xl-2">
								<div class="slider-content slider-2-content text-center">
									<h1 data-animation="fadeInUp" data-delay=".6s">Conquer more customers and be seen with us</h1>
									<p>Manage all your social media in one place with ease, test our tool and prove it all! </p>
								</div>
								<div class="slider-shape-rocket text-center">
									<img class="bounce-animate" src="themes/galaxy/assets/plus/img/bg/slider-shape.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-start -->


		<!-- why-choose-area-start -->
		<div class="why-choose-area pt-230  pb-85 choose-area1">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6">
						<div class="choose-img mb-30">
							<img class="bounce-animate" src="themes/galaxy/assets/plus/img/bg/why.png" alt="" />
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="why-choose-wrapper mb-30">
							<div class="section-title mb-75">
								<span>what we do</span>
								<h1>Why Choose Us</h1>
								<div class="section-img">
									<img src="themes/galaxy/assets/plus/img/shape/section.png" alt="">
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi aliquie.</p>
							</div>
							<ul class="choose-list">
								<li>
									<div class="choose-icon">
										<img src="themes/galaxy/assets/plus/img/icon/cho1.png" alt="" />
									</div>
									<div class="choose-text">
										<h3>First Working Prosses</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
									</div>
								</li>
								<li>
									<div class="choose-icon">
										<img src="themes/galaxy/assets/plus/img/icon/cho2.png" alt="" />
									</div>
									<div class="choose-text">
										<h3>Dedicated Team Member</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
									</div>
								</li>
								<li>
									<div class="choose-icon">
										<img src="themes/galaxy/assets/plus/img/icon/cho3.png" alt="" />
									</div>
									<div class="choose-text">
										<h3>24/7 Hours Support</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- why-choose-area-end -->

		<!-- services-area-start -->
		<div class="services-area pt-115 pb-55 primary-bg">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
						<div class="section-title white-title text-center mb-75">
							<span>our services</span>
							<h1>We Provide Dedication Service For You</h1>
							<div class="section-img">
								<img src="themes/galaxy/assets/plus/img/shape/section.png" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="services-box mb-10 text-center">
							<div class="services-box-img">
								<img src="themes/galaxy/assets/plus/img/icon/sb1.png" alt="" />
							</div>
							<div class="services-box-text">
								<h3>Digital Marketing <br> Services</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit ses eiusmodfu</p>
								<a href="#">Get Started <i class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="services-box active mb-10 text-center">
							<div class="services-box-img">
								<img src="themes/galaxy/assets/plus/img/icon/sb2.png" alt="" />
							</div>
							<div class="services-box-text">
								<h3>Awards Campaign <br>
									Services</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit ses eiusmodfu</p>
								<a href="#">Get Started <i class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="services-box mb-10 text-center">
							<div class="services-box-img">
								<img src="themes/galaxy/assets/plus/img/icon/sb3.png" alt="" />
							</div>
							<div class="services-box-text">
								<h3>Content Marketing <br>
									Services</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit ses eiusmodfu</p>
								<a href="#">Get Started <i class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="services-box mb-10 text-center">
							<div class="services-box-img">
								<img src="themes/galaxy/assets/plus/img/icon/sb4.png" alt="" />
							</div>
							<div class="services-box-text">
								<h3>SEO Consulting <br>
									Workshop</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit ses eiusmodfu</p>
								<a href="#">Get Started <i class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="services-box mb-10 text-center">
							<div class="services-box-img">
								<img src="themes/galaxy/assets/plus/img/icon/sb5.png" alt="" />
							</div>
							<div class="services-box-text">
								<h3>Social Media <br>
									Marketing</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit ses eiusmodfu</p>
								<a href="#">Get Started <i class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="services-box mb-10 text-center">
							<div class="services-box-img">
								<img src="themes/galaxy/assets/plus/img/icon/sb1.png" alt="" />
							</div>
							<div class="services-box-text">
								<h3>Code <br>
									Optimization</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit ses eiusmodfu</p>
								<a href="#">Get Started <i class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- services-area-end -->

		<!-- video-area start -->
		<div class="video-area pt-120 pb-90">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6">
						<div class="agency-wrapper mb-30">
							<div class="section-title">
								<span>our services</span>
								<h1>Social Media
									Growth Agency</h1>
								<div class="section-img mb-15">
									<img src="themes/galaxy/assets/plus/img/shape/section.png" alt="">
								</div>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
									labore et dolore magna
									aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
									exea commodo consequat.</p>
								<p>Duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore fugiat nulla
									pariatur xcepteur sint occaecat.</p>
							</div>
							<div class="agency-button mt-30">
								<a class="btn btn-yellow active" href="#">Learn More <i
										class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-6 offset-xl-1 col-lg-6">
						<div class="agency-video mb-30">
							<img src="themes/galaxy/assets/plus/img/bg/video.jpg" alt="">
							<div class="video-icon-view text-center">
								<a class="play-btn popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4"><i
								class="fa fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- video-area end -->

		<!-- counter-area-start -->
		<div class="counter-area pt-105 pb-80" style="background-image:url(themes/galaxy/assets/plus/img/bg/bg5.jpg)">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="counter-wrapper text-center mb-30">
							<div class="counter-text">
								<h1 class="counter">2543</h1>
								<span>Project Complate</span>
							</div>
							<div class="counter-img">
								<img src="themes/galaxy/assets/plus/img/shape/border2.png" alt="" />
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="counter-wrapper text-center mb-30">
							<div class="counter-text">
								<h1 class="counter">3780</h1>
								<span>Satisfied Clients</span>
							</div>
							<div class="counter-img">
								<img src="themes/galaxy/assets/plus/img/shape/border2.png" alt="" />
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="counter-wrapper text-center mb-30">
							<div class="counter-text">
								<h1 class="counter">750</h1>
								<span>Win Awards</span>
							</div>
							<div class="counter-img">
								<img src="themes/galaxy/assets/plus/img/shape/border2.png" alt="" />
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="counter-wrapper text-center mb-30">
							<div class="counter-text">
								<h1 class="counter">450</h1>
								<span>Years Experience</span>
							</div>
							<div class="counter-img">
								<img src="themes/galaxy/assets/plus/img/shape/border2.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- counter-area-end -->

		<!-- team-area start -->
		<div class="team-area pb-90 pt-115">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
						<div class="section-title text-center mb-75">
							<span>our Expert</span>
							<h1>Meet Our Exclusive Team Member</h1>
							<div class="section-img">
								<img src="themes/galaxy/assets/plus/img/shape/section.png" alt="" />
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="team-item mb-30">
							<div class="team-item-image">
								<img src="themes/galaxy/assets/plus/img/team/team1.jpg" alt="team member">
							</div>
							<div class="team-item-detail">
								<h4 class="team-item-name">Bardiman Smith</h4>
								<span class="team-item-role">Digital Marketer</span>
								<div class="team-social-icon">
									<a href="#"><i class="fab fa-facebook-f"></i></a>
									<a href="#"><i class="fab fa-twitter"></i></a>
									<a href="#"><i class="fab fa-google-plus-g"></i></a>
									<a href="#"><i class="fab fa-instagram"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-item active mb-30">
							<div class="team-item-image">
								<img src="themes/galaxy/assets/plus/img/team/team2.jpg" alt="team member">
							</div>
							<div class="team-item-detail">
								<h4 class="team-item-name">Bardiman Smith</h4>
								<span class="team-item-role">Digital Marketer</span>
								<div class="team-social-icon">
									<a href="#"><i class="fab fa-facebook-f"></i></a>
									<a href="#"><i class="fab fa-twitter"></i></a>
									<a href="#"><i class="fab fa-google-plus-g"></i></a>
									<a href="#"><i class="fab fa-instagram"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-item mb-30">
							<div class="team-item-image">
								<img src="themes/galaxy/assets/plus/img/team/team3.jpg" alt="team member">
							</div>
							<div class="team-item-detail">
								<h4 class="team-item-name">Bardiman Smith</h4>
								<span class="team-item-role">Digital Marketer</span>
								<div class="team-social-icon">
									<a href="#"><i class="fab fa-facebook-f"></i></a>
									<a href="#"><i class="fab fa-twitter"></i></a>
									<a href="#"><i class="fab fa-google-plus-g"></i></a>
									<a href="#"><i class="fab fa-instagram"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-item mb-30">
							<div class="team-item-image">
								<img src="themes/galaxy/assets/plus/img/team/team4.jpg" alt="team member">
							</div>
							<div class="team-item-detail">
								<h4 class="team-item-name">Bardiman Smith</h4>
								<span class="team-item-role">Digital Marketer</span>
								<div class="team-social-icon">
									<a href="#"><i class="fab fa-facebook-f"></i></a>
									<a href="#"><i class="fab fa-twitter"></i></a>
									<a href="#"><i class="fab fa-google-plus-g"></i></a>
									<a href="#"><i class="fab fa-instagram"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- team-area end -->

		<!-- cta-area-start -->
		<div class="cta-area  pt-210 pb-220" style="background-image:url(themes/galaxy/assets/plus/img/bg/cta.jpg)">
			<div class="container">
				<div class="row">
					<div class="col-xl-10 col-lg-10 offset-lg-1 offset-xl-1">
						<div class="cta-wrapper text-center">
							<div class="cta-text">
								<span>work with us</span>
								<h1>You Want  To Showcase Your Website In Top Join With Us </h1>
								<a class="btn" href="#">Join With Us <i class="dripicons-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- cta-area-end -->

		<!-- pricing-area-start -->
		<div class="pricing-area primary-bg pt-115 pb-90 ">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
						<div class="section-title white-title text-center mb-75">
							<span>our pricing</span>
							<h1>How much does Stackposts cost</h1>
							<div class="section-img">
								<img src="themes/galaxy/assets/plus/img/shape/section.png" alt="" />
							</div>
						</div>
					</div>
				</div>
		<!--Pricing-->
        <?php if(get_payment()){?>
	    <?=Modules::run("payment/block_pricing")?>
	    <?php }?>
        <!--Pricing End-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- pricing-area-end -->


		<!-- faq-area start -->
		<div id="faq" class="faq-area pt-115 pb-90">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="section-title text-center">
							<span>ask question</span>
							<h1>Frequently Asked <br> Questions</h1>
							<div class="section-img">
								<img src="themes/galaxy/assets/plus/img/shape/section.png" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6 col-lg-6">
						<div class="faq-box mb-30">
							<div id="accordion" class="mt-40">
								<div class="card">
									<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
												aria-controls="collapseOne">
												How To Get Start With Us?
											</a>
										</h5>
									</div>

									<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua.
											Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingTwo">
										<h5 class="mb-0">
											<a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
												aria-expanded="false" aria-controls="collapseTwo">
												Why Choose Our Services In Your Busines
											</a>
										</h5>
									</div>
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua.
											Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingThree">
										<h5 class="mb-0">
											<a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
												aria-expanded="false" aria-controls="collapseThree">
												We Are The Best For Your Company
											</a>
										</h5>
									</div>
									<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua.
											Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingFour">
										<h5 class="mb-0">
											<a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
												aria-expanded="false" aria-controls="collapseFour">
												We Provide Best Service For Agency
											</a>
										</h5>
									</div>
									<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua.
											Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="faq-box mb-30">
							<div id="accordion1" class="mt-40">
								<div class="card">
									<div class="card-header" id="headingOne1">
										<h5 class="mb-0">
											<a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true"
												aria-controls="collapseOne">
												How To Get Start With Us?
											</a>
										</h5>
									</div>

									<div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1" data-parent="#accordion1">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore
												et dolore magna aliqua.
												Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingTwo1">
										<h5 class="mb-0">
											<a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo1"
												aria-expanded="false" aria-controls="collapseTwo1">
												Why Choose Our Services In Your Busines
											</a>
										</h5>
									</div>
									<div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordion1">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore
												et dolore magna aliqua.
												Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingThree1">
										<h5 class="mb-0">
											<a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseThree1"
												aria-expanded="false" aria-controls="collapseThree1">
												We Are The Best For Your Company
											</a>
										</h5>
									</div>
									<div id="collapseThree1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordion1">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore
												et dolore magna aliqua.
												Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingFour1">
										<h5 class="mb-0">
											<a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseFour1"
												aria-expanded="false" aria-controls="collapseFour">
												We Provide Best Service For Agency
											</a>
										</h5>
									</div>
									<div id="collapseFour1" class="collapse" aria-labelledby="headingFour1" data-parent="#accordion1">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore
												et dolore magna aliqua.
												Ut enim ad minim veniam quinostrud exercitation.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- faq-area end -->

		<!-- footer-area-start -->
		<div class="footer-area footer-white primary-bg pt-90">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="footer-wrapper mb-30">
								<div class="footer-logo" href="<?=PATH?>">
		  		                <a href="<?=PATH?>#top"><img src="<?=get_option("website_logo_white", BASE.'assets/img/logo-white.png')?>"></a>
							</div>
							<div class="footer-text">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco </p>
							</div>
							<div class="footer-icon">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-twitter"></i></a>
								<a href="#"><i class="fab fa-google-plus-g"></i></a>
								<a href="#"><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="footer-wrapper pl-30 mb-30">
							<h3 class="footer-title">Company Services</h3>
							<ul class="footer-menu">
								<li><a href="#">Digital Marketing Services</a></li>
								<li><a href="#">Awards Campaign Services</a></li>
								<li><a href="#">Content Marketing Services</a></li>
								<li><a href="#">SEO Consulting Workshop</a></li>
								<li><a href="#">Social Media Marketing</a></li>
								<li><a href="#">Code Optimization</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="footer-wrapper pl-30 mb-30">
							<h3 class="footer-title">Latest News</h3>
							<div class="footer-content">
								<p>Love offers and discounts? Subscribe and save</p>
							</div>
							<div class="subscribes-form">
							<form action="<?=cn("auth/signup")?>" method="get">
		              			<div class="input-group mb-3">
								  	<div><input type="text" class="form-control" placeholder="<?=lang("enter_your_email")?>" name="email" aria-describedby="basic-addon2"></div>
								 <div class="input-group-append">
								    <button class="btn btn-outline-primary" type="submit"><?=lang("get_start_now")?></button>
								  	</div>
								</div>
		              		</form>
			                <small class="text-warning"><?=lang("do_not_hesitate_to_try_it_out_with_just_a_few_minutes_of_setup")?></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="footer-wrapper pl-40 mb-30">
							<h3 class="footer-title">Contact Us</h3>
							<ul class="contact-link">
								<li>
									<div class="contact-address-icon">
										<i class="fas fa-home"></i>
									</div>
									<div class="contact-address-text">
										<h4>Our Office</h4>
										<p>325 Business, Evenue, <br> Market New York.</p>
									</div>
								</li>
								<li>
									<div class="contact-address-icon">
										<i class="far fa-envelope-open"></i>
									</div>
									<div class="contact-address-text">
										<h4>Mail Us</h4>
										<p>support@gmail.com</p>
									</div>
								</li>
								<li>
									<div class="contact-address-icon">
										<i class="fas fa-headphones"></i>
									</div>
									<div class="contact-address-text">
										<h4>Call Us</h4>
										<p>8 800 567.890.11</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom pt-60 pb-20">
				<div class="container">
					<div class="footer-border">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-12">
								<div class="copyright">
									<p><i class="far fa-copyright"></i> 2019 <?=get_option("website_title")?>. All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12">
								<ul class="footer-bottom-link text-lg-right">
									<li><a href="#">Terms & Condition</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Contact Us</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer-area-end -->

		<!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here...">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

		<!-- JS here -->
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/vendor/modernizr-3.5.0.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/vendor/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/waypoints.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/popper.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/jquery.counterup.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/jquery.countdown.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/jquery.meanmenu.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/slick.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/ajax-form.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/wow.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/jquery.scrollUp.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/plugins.js"></script>
        <script type="text/javascript" src="<?=BASE?>themes/galaxy/assets/plus/js/main.js"></script>
    </body>
</html>
