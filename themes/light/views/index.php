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
        <link rel="icon" type="image/png" href="<?=get_option("website_favicon", BASE.'assets/themes/light/assets/plus/themes/seosigtht/assets/plus/img/favicon.png')?>" />
		<!-- Vendor Bundle CSS -->
		<link rel="stylesheet" type="text/css" href="<?=BASE?>themes/light/assets/plus/assets/css/vendor.bundle.css?ver=130">
		<!-- Custom styles for this template -->
		<link rel="stylesheet" type="text/css" href="<?=BASE?>themes/light/assets/plus/assets/css/style.css?ver=130">
		<link rel="stylesheet" type="text/css" href="<?=BASE?>themes/light/assets/plus/assets/css/theme-purple.css?ver=130">
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans">
	</head>
	<body class="light">
       	
				<!-- Start .header-section -->
		<div id="home" class="header-section flex-box-middle section gradiant-background header-curbed-circle background-circles header-software">
			<div id="particles-js" class="particles-container"></div>
			<div id="navigation" class="navigation is-transparent" data-spy="affix" data-offset-top="5">
				<nav class="navbar navbar-default">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-collapse-nav" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="./">
                            <img src="<?=get_option("website_logo_white", BASE.'assets/img/logo-black.png')?>" width="200" alt="brand-logo"></a>
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse font-secondary" id="site-collapse-nav">
							<ul class="nav nav-list navbar-nav navbar-right">
								<li class="nav-item"><a href="<?=PATH?>"><?=lang("home")?></a></li>
								<li class="nav-item"><a href="<?=PATH?>#features"><?=lang("features")?></a></li>
								<li class="nav-item"><a href="<?=PATH?>#pricing"><?=lang("pricing")?></a></li>
								<li class="nav-item"><a href="<?=PATH?>blog"><?=lang("Blog")?></a></li>
                                <li class="nav-item"><a href="<?=PATH?>#faq"><?=lang("F.A.Q")?></a></li>
                                <span class="nav-item">
			    	            <?php if(!session("uid")){?>
				      	        <a href="<?=cn("auth/login")?>" class="buttonlogin"><?=lang("login")?></a>
				      	        <?php if(get_option("singup_enable", 1)){?>
				      		    <a href="<?=cn("auth/signup")?>" class="buttonlogin wow fadeInUp"><?=lang("signup")?></a>
			      		        <?php }?>
			      	            <?php }else{?>
			      	            <a href="<?=cn("dashboard")?>" class="button wow fadeInUp"><?=lang("dashboard")?></a>
			      	            <?php }?>
			      	            </span>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container -->
				</nav>
			</div><!-- .navigation -->
			
			<div class="header-content pt-90">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-8 col-md-offset-2">
							<div class="header-texts">
								<h1 class="cd-headline clip is-full-width wow fadeInUp" data-wow-duration=".5s">
									<span>Turbine Your </span> 
									<span class="cd-words-wrapper">
										<b class="is-visible">Social Media</b>
										<b>Business</b>
										<b>Life.</b>
									</span>
								</h1>
								<ul class="buttons">
									<li><a href="auth/signup" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s">Create an account</a></li>
									<li><a href="auth/login" class="button button-border button-transparent wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".9s">Login</a></li>
								</ul>
							</div>
						</div><!-- .col -->
					</div><!-- .row -->
					<div class="row text-center">
						<div class="col-md-10 col-md-offset-1">
							<div class="header-mockups">
								<div class="header-laptop-mockup black wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" >
									<img src="themes/light/assets/plus/images/software-screen-a.jpg" alt="software-screen" />
								</div>
								<div class="iphonex-flat-mockup wow fadeInUp" data-wow-duration="1s" data-wow-delay=".9s">
									<img src="themes/light/assets/plus/images/app-screen-a.jpg" alt="app screen">
								</div>
							</div>
						</div>
					</div>
				</div><!-- .container -->
			</div><!-- .header-content -->
		</div><!-- .header-section -->
		
		
		<!-- Start .about-section  -->
		<div id="about" class="about-section section white-bg">
			<div class="container tab-fix">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading">About <span>Stackposts</span></h2>
							<p>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						</div>
					</div>
				</div><!-- .section-head -->
				<div class="row tab-center mobile-center">
					<div class="col-md-6">
						<div class="video wow fadeInLeft" data-wow-duration=".5s">
							<img src="themes/light/assets/plus/images/about-video.jpg" alt="about-video" />
							<div class="video-overlay gradiant-background"></div>
							<a href="https://www.youtube.com/watch?v=kuceVNBTJio" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
						</div>
					</div><!-- .col -->
					<div class="col-md-6">
						<div class="txt-entry">
							<h3>Take a Look Around our System</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
							<a href="#" class="button">Sign Up for Free</a>
						</div>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .about-section  -->
		
		
		<!-- Start .features-box-section  -->
		<div id="features" class="features-box-section section pb-90 white-bg">
			<div class="container tab-fix">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
							<h2 class="heading">Stackposts <span>Features</span></h2>
							<p>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes nascetur.</p>
						</div>
					</div>
				</div><!-- .section-head -->
				<div class="row text-center">
					<div class="col-md-4 col-sm-6">
						<div class="feature-box">
							<div class="box-icon box-icon-small">
								<em class="ti ti-facebook"></em>
							</div>
							<h4>Facebook</h4>
							<p>Make simultaneous postings to facebook, groups, and pages.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-box">
							<div class="box-icon box-icon-small">
								<em class="ti ti-twitter"></em>
							</div>
							<h4>Twitter</h4>
							<p>Make scheduled and immediate publications, interact with your followers!</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-box">
							<div class="box-icon box-icon-small">
								<em class="ti ti-youtube"></em>
							</div>
							<h4>Youtube</h4>
							<p>Make publications, comments, live and reach your audience with our tool.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-box">
							<div class="box-icon box-icon-small">
								<em class="ti ti-instagram"></em>
							</div>
							<h4>Instagram</h4>
							<p>Automate your instagram, make scheduled and instant publications, video lives and more!</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-box">
							<div class="box-icon box-icon-small">
								<em class="ti ti-pinterest"></em>
							</div>
							<h4>Pinterest</h4>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-box">
							<div class="box-icon box-icon-small">
								<em class="ti ti-linkedin"></em>
							</div>
							<h4>Linkedin</h4>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at</p>
						</div>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .features-box-section  -->
		
		
		<!-- Start .features-section  -->
		<div class="features-section section gradiant-background section-overflow-fix">
			<div class="container tab-fix">
				<div class="features-content pt-10">
					<div class="row">
						<div class="col-md-7">
							<div class="section-head heading-light mobile-center tab-center">
								<div class="row">
									<div class="col-md-12">
										<h2 class="heading heading-light">Amazing Features</h2>
										<p>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
									</div>
								</div>
							</div><!-- .section-head -->
							<div class="row">
								<div class="col-sm-6">
									<div class="single-features">
										<em class="ti ti-user"></em>
										<h4>User Friendly</h4>
										<p>Lorem ipsum dolor sit amet consect etur adipi sicing elited do eiusmod tempor.</p>
									</div>
								</div><!-- .col -->
								<div class="col-sm-6">
									<div class="single-features">
										<em class="ti ti-bolt"></em>
										<h4>Super Fast Speed</h4>
										<p>Amet consect etur adipis icing elited do eiu smod tempor incidi dout labore.</p>
									</div>
								</div><!-- .col -->
								<div class="col-sm-6">
									<div class="single-features">
										<em class="ti ti-video-camera"></em>
										<h4>Height Resolation</h4>
										<p>Dolor sit ipsum amet consect etur adipis icing elited do eiusmod dout.</p>
									</div>
								</div><!-- .col -->
								<div class="col-sm-6">
									<div class="single-features">
										<em class="ti ti-infinite"></em>
										<h4>Unlimited Posibility</h4>
										<p>Consect etur adipis icing elited do eius mod tempor incidi dout labore magna.</p>
									</div>
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .col -->
						<div class="col-md-5 pt-100 text-center">
							<div class="feature-mockups clearfix">
								<div class="fearures-software-mockup black right wow fadeInUp" data-wow-duration=".5s"  data-wow-delay=".7s">
									<img src="themes/light/assets/plus/images/software-screen-b.jpg" alt="software-screen" />
								</div>
								<div class="phone-mockup">
									<div class="iphonex-flat-mockup large wow fadeInUp" data-wow-duration=".5s">
										<img src="themes/light/assets/plus/images/app-screen-a.jpg" alt="app screen">
									</div>
								</div>
							</div>
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .features-content -->
			</div><!-- .container -->
		</div><!-- .features-section  -->
		
		
		<!-- Start .steps-section  -->
		<div class="section steps-section-alt pb-90 white-bg">
			<div class="container">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading">Step by Step <span>of Stackposts</span></h2>
							<p>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						</div>
					</div>
				</div><!-- .section-head  -->
				<div class="row text-center">
					<div class="col-md-12">
						<ul class="nav nav-tabs inline-nav text-center">
							<li class="active" data-toggle="tab" data-target="#tab1">
								<div class="steps"><h4>Get Started</h4></div>
							</li>
							<li data-toggle="tab" data-target="#tab2">
								<div class="steps"><h4>Creating an account</h4></div>
							</li>
							<li data-toggle="tab" data-target="#tab3">
								<div class="steps"><h4>Start Using Stackposts</h4></div>
							</li>
							<li data-toggle="tab" data-target="#tab4">
								<div class="steps"><h4>Get Advanced Options</h4></div>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="tab-content no-pd">
							<div class="tab-pane fade in active" id="tab1">
								<div class="laptop-mockup laptop-black">
									<img src="themes/light/assets/plus/images/software-screen-a.jpg" alt="step-screen">
								</div>
								<div class="phone-mockup">
									<div class="iphonex-flat-mockup">
										<img src="themes/light/assets/plus/images/app-screen-a.jpg" alt="app screen">
									</div>
								</div>
							</div>
							<div class= "tab-pane fade" id="tab2">
								<div class="laptop-mockup laptop-black">
									<img src="themes/light/assets/plus/images/software-screen-b.jpg" alt="step-screen">
								</div>
								<div class="phone-mockup">
									<div class="iphonex-flat-mockup">
										<img src="themes/light/assets/plus/images/app-screen-a.jpg" alt="app screen">
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab3">
								<div class="laptop-mockup laptop-black">
									<img src="themes/light/assets/plus/images/software-screen-c.jpg" alt="step-screen">
								</div>
								<div class="phone-mockup">
									<div class="iphonex-flat-mockup">
										<img src="themes/light/assets/plus/images/app-screen-a.jpg" alt="app screen">
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab4">
								<div class="laptop-mockup laptop-black">
									<img src="themes/light/assets/plus/images/software-screen-d.jpg" alt="step-screen">
								</div>
								<div class="phone-mockup">
									<div class="iphonex-flat-mockup">
										<img src="themes/light/assets/plus/images/app-screen-a.jpg" alt="app screen">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- Start .statistics-section  -->
		
		
		<!-- Start .pricing-section  -->
		<div id="pricing" class="pricing-section section pb-80">
			<div class="imagebg">
				<img src="themes/light/assets/plus/images/pricing-bg.jpg" alt="pricing-bg">
			</div>
			<div class="gradiant-background gradiant-overlay gradiant-light"></div><!-- .gradiant-background  /exta div for transparent gradiant overlay /  -->
			<div class="container tab-fix">
				<div class="section-head heading-light text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
						<h2 class="heading heading-light">Our Plans</h2>
						<p>Stackposts has a variety of prices that are sure to please you, choose one that pleases you and start now.</p>
						</div>
					</div>
				</div><!-- .col -->
				     <!-- Pricing table -->

                      <!--Pricing-->
                      <?php if(get_payment()){?>
                      <?=Modules::run("payment/block_pricing")?>
                      <?php }?>
                      <!--Pricing End-->

					</div><!-- .col  -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .pricing-section  -->
		
		
		<!-- Start .faq-section  -->
		<div id="faq" class="faq-section section white-bg pt-120 pb-100">
			<div class="container">
				<div class="faq-alt">
					<div class="row tab-fix">
						<div class="col-md-4 tab-center mobile-center col-md-offset-1">
							<div class="side-heading">
								<h2 class="heading">Stackposts <span>FAQ</span></h2>
								<p>We got you coverd, check those faq if its not there just <a class="nav-item" href="#contacts">ask</a> us.</p>
							</div>
						</div><!-- .col  -->
						<div class="col-md-6">
							<!-- Accordion -->
							<div class="panel-group accordion" id="another" role="tablist" aria-multiselectable="true">
								<!-- each panel for accordion -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="accordion-i1">
										<h6 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i1" aria-expanded="false">
												Is this app free to use for business or commercial use ?
												<span class="plus-minus"><span></span></span>
											</a>
										</h6>
									</div>
									<div id="accordion-pane-i1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accordion-i1">
										<div class="panel-body">
											  <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
										</div>
									</div>
								</div> 
								<!-- each panel for accordion -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="accordion-i2">
										<h6 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i2" aria-expanded="false">
												How do i make a support request with this app?
												<span class="plus-minus"><span></span></span>
											</a>
										</h6>
									</div>
									<div id="accordion-pane-i2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i2">
										<div class="panel-body">
											  <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
										</div>
									</div>
								</div>
								<!-- each panel for accordion -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="accordion-i3">
										<h6 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i3" aria-expanded="false">
												How and where can we download latest update ?
												<span class="plus-minus"><span></span></span>
											</a>
										</h6>
									</div>
									<div id="accordion-pane-i3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i3">
										<div class="panel-body">
											  <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
										</div>
									</div>
								</div>
								<!-- each panel for accordion -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="accordion-i4">
										<h6 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i4" aria-expanded="false">
												Is there any premium version with extended features ?
												<span class="plus-minus"><span></span></span>
											</a>
										</h6>
									</div>
									<div id="accordion-pane-i4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i4">
										<div class="panel-body">
											  <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
										</div>
									</div>
								</div><!-- end each panel -->
								<!-- each panel for accordion -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="accordion-i5">
										<h6 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i5" aria-expanded="false">
												Where do i find any details documentation ?
												<span class="plus-minus"><span></span></span>
											</a>
										</h6>
									</div>
									<div id="accordion-pane-i5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i5">
										<div class="panel-body">
											  <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
										</div>
									</div>
								</div><!-- end each panel -->
								<!-- each panel for accordion -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="accordion-i6">
										<h6 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i6" aria-expanded="false">
												Are you gays aviable for making custom apps ?
												<span class="plus-minus"><span></span></span>
											</a>
										</h6>
									</div>
									<div id="accordion-pane-i6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i6">
										<div class="panel-body">
											  <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
										</div>
									</div>
								</div><!-- end each panel -->
							</div><!-- Accordion #end -->
						</div><!-- .col  -->
					</div><!-- .row  -->
				</div><!-- .faq  -->
			</div><!-- .container  -->
		</div><!-- .faq-section  -->
			
		<!-- Start .testimonial-section  -->
		<div id="testimonial" class="testimonial-section section white-bg pb-120">
			<div class="imagebg">
				<img src="themes/light/assets/plus/images/testimonial-bg.png" alt="testimonial-bg">
			</div>
			<div class="container">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading">What our <span>client say !</span></h2>
							<p>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						</div>
					</div>
				</div><!-- .section-head  -->
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="testimonial-carousel has-carousel" data-items="1" data-loop="true" data-dots="true" data-auto="true" data-navs="false">
							<div class="item text-center">
								<div class="quotes">
									<img src="themes/light/assets/plus/images/quote-icon.png" class="quote-icon" alt="quote-icon" />
									<blockquote>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes nascetur.</blockquote>
									<h6>Andy Lovell</h6>
									<div class="client-image">
										<img src="themes/light/assets/plus/images/client-1.jpg" alt="client" />
									</div>
								</div>
							</div>
							<div class="item text-center">
								<div class="quotes">
									<img src="themes/light/assets/plus/images/quote-icon.png" class="quote-icon" alt="quote-icon" />
									<blockquote>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes nascetur.</blockquote>
									<h6>Andy Lovell</h6>
									<div class="client-image">
										<img src="themes/light/assets/plus/images/client-2.jpg" alt="client" />
									</div>
								</div>
							</div>
							<div class="item text-center">
								<div class="quotes">
									<img src="themes/light/assets/plus/images/quote-icon.png" class="quote-icon" alt="quote-icon" />
									<blockquote>Nam et sagittis diam. Sed tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes nascetur.</blockquote>
									<h6>Andy Lovell</h6>
									<div class="client-image">
										<img src="themes/light/assets/plus/images/client-1.jpg" alt="client" />
									</div>
								</div>
							</div>
						</div><!-- .testimonial-carousel  -->
					</div><!-- .col  -->
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .testimonial-section  -->
		
		
		<!-- Start .get-section  -->
		<div id="getapp" class="getapp-section section gradiant-background">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="download-form pt-60 pb-40 pbm-0">
							<div class="heading-light">
								<h2 class="heading heading-light">Get App Free</h2>
								<p>Tempor augue sit amet egestas scelerisque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							</div>
							<center><form action="<?=cn("auth/signup")?>" method="get"></center>
								<div class="form-group row fix-gutter-10 pb-20">
									<div class="form-field col-sm-6 gutter-10 form-m-bttm">
                                    <center><input type="text" class="form-control required" placeholder="<?=lang("enter_your_email")?>" name="email" aria-describedby="basic-addon2"></center>
									</div>
								</div>
								<button type="submit" class="button solid-btn sb-h">Get Now</button>
								<div class="form-results"></div>
							</form>
						</div>
					</div><!-- .col  -->
					<div class="col-md-5 col-md-offset-1 pt-120">
						<div class="browser-screen">
							<img src="themes/light/assets/plus/images/software-screen-a.jpg" alt="software">
						</div>
					</div><!-- .col  -->
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .contact-section  -->
		
		
		<!-- Start .footer-section  -->
		<div class="footer-section section">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12">
						<ul class="footer-navigation inline-list">
							<li class="nav-item"><a href="<?=PATH?>"><?=lang("home")?></a></li>
								<li class="nav-item"><a href="<?=PATH?>#features"><?=lang("features")?></a></li>
								<li class="nav-item"><a href="<?=PATH?>#pricing"><?=lang("pricing")?></a></li>
								<li class="nav-item"><a href="<?=PATH?>blog"><?=lang("Blog")?></a></li>
                                <li class="nav-item"><a href="<?=PATH?>#faq"><?=lang("F.A.Q")?></a></li>
						</ul>
						<ul class="social-list inline-list">
							<li><a href="#"><em class="fa fa-facebook"></em></a></li>
							<li><a href="#"><em class="fa fa-twitter"></em></a></li>
							<li><a href="#"><em class="fa fa-google-plus"></em></a></li>
							<li><a href="#"><em class="fa fa-pinterest"></em></a></li>
							<li><a href="#"><em class="fa fa-linkedin"></em></a></li>
							<li><a href="#"><em class="fa fa-instagram"></em></a></li>
						</ul>
						<ul class="footer-links inline-list">
							<li>Copyright © 2019 <?=get_option("website_title")?>. Template Made by <a target="_blank" href="https://procodebr.xyz/">ProcodeBR</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div><!-- .col  -->
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .footer-section  -->
		
		<!-- Preloader !remove please if you do not want -->
		<div id="preloader"><div id="status">&nbsp;</div></div> 
		<!-- Preloader End -->
		
		<!-- JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="<?=BASE?>themes/light/assets/plus/assets/js/jquery.bundle.js"></script>
		<script type="text/javascript" src="<?=BASE?>themes/light/assets/plus/assets/js/script.js"></script>
		
	</body>
</html>
