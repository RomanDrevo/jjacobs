
<?php
	require 'register/IP_Inspector.php';
	$ipInsp = new IP_Inspector();
	$countryName = $ipInsp->getLocationArray()["country"];
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<title>jjacobs</title>
	<meta content="" name="description" />
	<meta content="" property="og:image" />
	<meta content="" property="og:description" />
	<meta content="" property="og:site_name" />
	<meta content="website" property="og:type" />
	<meta content="telephone=no" name="format-detection" />
	<meta http-equiv="x-rim-auto-match" content="none">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="libs/countdown/jquery.countdown.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/9.0.9/css/intlTelInput.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />

</head>
<body>
<header class="header" id="header">
	<div class="header_wrapp">
		<div class="container">
			<div class="row">
				<div class="left_column clearfix col-xs-12 col-sm-12 col-md-8">
					<h1>Welcome To Social Trading<span style="display: inline-table;font-size: 17px;">®</span></h1>
					<p id="country_text">
						<span class="dynamic_num">6600</span> People From <?php echo $countryName ?: "your country" ?> Currently Trading.
					</p>
					
					<div class="video">
						<video controls autoplay>
						  	<source src="/videos/jjacobs.mp4" type="video/mp4">
						  	Your browser does not support HTML5 video.
						</video>
<!--                         <img src="img/123_steps.png" alt="steps" /> -->
                    </div>
                    <div class="video hide_desktop">

                        <!-- <div class="col-md-4 step_img"><img src="img/step_1.png" /></div>
                        <div class="col-md-4 step_img"><img src="img/step_2.png" /></div>
                        <div class="col-md-4 step_img"><img src="img/step_3.png" /></div> -->
                    </div>
					<div class="link_text">
                        <p>Results may vary from person to person. See full disclaimer below*</p>
                    </div>
                    <span class="as_seen_on">As Seen On:</span>
					<div class="soc_links clearfix">
						<a href=""><img src="img/mw.png"></a>
						<a href=""><img src="img/cnn.png"></a>
						<a href=""><img src="img/fb.png"></a>
						<a href=""><img src="img/tw.png"></a>
					</div>
				</div>
				<div class="right_column clearfix col-xs-12 col-sm-12 col-md-4">
					<a href=""><img src="img/beauty.png"></a>
					<div class="wrapp_form">
					<form action="register/index.php" method="POST" id="reg-form">
						<h3 style="color: #fff;">Start Today</h3>
						<label>Your Name</label>
						<input style="width:32%" type="text" name="first_name" placeholder="First Name" id="first_name">
                        <input style="width:35%" type="text" name="last_name" placeholder="Last Name" id="last_name">
						<label>Email</label>
						<input type="hidden" name="campaign_id" id="campaign_id" value="72">
						<input type="hidden" name="a_aid" id="a_aid" value="1234">
						<input type="text" name="email" placeholder="Email" id="email">
						<label>Mobile</label>
                        <input type="tel" id="phone" name="phone">
                        <input id="submit_btn" type="submit" value="Sign Up Now">
                        <div id="errors_container"></div>
					</form>
					</div>
					<h4 style="font-size: 12px;font-weight: 400;">*click <a href="disclaimer.html" style="display: initial;">here</a> to see full disclaimer & privacy</h4>
				</div>
					<div class="soc_links clearfix" id="mob_visited">
						<a href=""><img src="img/mw.png"></a>
						<a href=""><img src="img/cnn.png"></a>
						<a href=""><img src="img/fb.png"></a>
						<a href=""><img src="img/tw.png"></a>
					</div>
			</div>
		</div>
	</div>
</header>
<section class="main_content">
		<div class="container">
			<div class="row">
				<div class="text_body">
					<div class="img_content clearfix col-xs-3 col-sm-3 col-md-3">
						<img src="img/big-wining-trades_fx.gif">
					</div>
					<div class="text_content clearfix col-xs-9 col-sm-9 col-md-9">
						<p>Hi,</p>
                        <p>My name is Joshua Jacobs. Welcome to "jjacobswealth.com" social trading platform.</p>
                        <p><strong>What Is Social Trading?</strong></p>
                        <p>Social Trading is a new super-easy and revolutionary way for people to become traders without actually learning how.<br>
                        Social trading is so simple! Once you register, you’ll receive a secure username and password to your free social trading account. From there, just copy the biggest money makers with just a click.</p>
                        <p><strong>What are the benefits of social trading?</strong></p>
                        <p>We offer something truly unique. Instead of learning how to trade yourself; this platform allows you to watch other traders and copy their trades. Whatever money they make, you can make as well.</p>
                        <p><strong>Do I need to invest money?</strong></p>
                        <p>Yes, you can start with as little as $250. Once you register above, a representative will contact you within 24 hours and explain how this very special trading platform works.</p>

						<div class="link_text">
							<p style="font-size: 13px;">Results may vary from person to person. See full disclaimer below*</p>
						</div>
					</div>
				</div>
			</div>
	</div>
</section>
<section class="testimonial">
	<div class="container">
		<div class="row">
			<div class="sider_container">
				<div class="next_button"><i class="fa fa-angle-right"></i></div>
				<div class="prev_button"><i class="fa fa-angle-left"></i></div>
				<div class="carousel">
					<div class="slide_item">
						<a>
							<img src="img/vladimir-150x150.jpg" alt="alt" />
							<p>Joined: 26/2/2016</p>
							<p>Dear Joshua I would like to thank you for sharing with me your system. I have two kids and its important for me to spend as much time as I can with them. Your incredible system allows me to live the healthy life that I always wanted – working a few hours from home and making more than enough money to spend quality time with my beloved.</p>
							<div class="names_slider"><p><span class="dark_name">Vladimir</span>, London, England</p></div>
                            <h6 style="text-align: center;font-weight: 300;color: #6d6d6d;">Results may vary from person to person. See full disclaimer below*</h6>
						</a>
					</div>
					<div class="slide_item">
						<a>
							<img src="img/marry-150x150.jpg" alt="alt" />
							<p>Joined: 8/1/2015</p>
							<p>Hi Jacob, We want to express our gratitude for our new lives. Since we started social trading we have been able to accomplish many dreams and have traveled the world. From India to the highlands of scotland. We No longer think if we want to buy something, we just do and feel good knowing we have a constant income. We love you joshua. xxx</p>
							<div class="names_slider"><p><span class="dark_name">JULY & DAN</span>, Melbourne, Australia</p></div>
                            <h6 style="text-align: center;font-weight: 300;color: #6d6d6d;">Results may vary from person to person. See full disclaimer below*</h6>
						</a>
					</div>
					<div class="slide_item">
						<a>
							<img src="img/ken-150x150.jpg" alt="alt" />
							<p>Joined: 10/6/2016</p>
							<p>Thank you Jacob. Amazing! I now Social Trade as a living now. I left my job and decided to go with my dreams. I have bought my dream house. I am getting married soon and have so much comfort knowing I can live the lifestyle I want. It's So Simple. I recommend this to everyone who wants financial freedom.</p>
							<div class="names_slider"><p><span class="dark_name">Michael</span>, Monte Carlo, Italy</p></div>
                            <h6 style="text-align: center;font-weight: 300;color: #6d6d6d;">Results may vary from person to person. See full disclaimer below*</h6>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<footer class="footer">
	<div class="text_footer">
		<div class="container">
		<div class="row">
					<div>
					<p align='center'>
						*Trading digital options has some risks of partial or full funds loss. This fact should be taken into consideration by any trader who is planning to make profits by option trading. We advise our clients to read the terms and conditions carefully before opening positions at any platform. Digital options quotes displayed at the platform are indicative rates that the company is prepared to sell options at and may not correspond to either live market quotations or quoted rates at the point of sale.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div id="top"><i class="fa fa-caret-up" aria-hidden="true"></i></div>
</footer>

	<div class="hidden"></div>
	<!-- Mandatory for Responsive Bootstrap Toolkit to operate -->
	<div class="device-xs visible-xs"></div>
	<div class="device-sm visible-sm"></div>
	<div class="device-md visible-md"></div>
	<div class="device-lg visible-lg"></div>
	<!-- end mandatory -->
	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="libs/jquery/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/9.0.9/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/9.0.9/js/utils.js"></script>
	<script src="libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="libs/waypoints/waypoints-1.6.2.min.js"></script>
	<script src="libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="libs/owl-carousel/owl.carousel.min.js"></script>
	<script src="libs/countdown/jquery.plugin.js"></script>
	<script src="libs/countdown/jquery.countdown.min.js"></script>
	<script src="libs/countdown/jquery.countdown-ru.js"></script>
	<script src="libs/landing-nav/navigation.js"></script>
	<script src="libs/bootstrap-toolkit/bootstrap-toolkit.min.js"></script>
	<script src="libs/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="libs/equalheight/jquery.equalheight.js"></script>
	<script src="libs/stellar/jquery.stellar.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.min.js"></script>
	<script src="js/common.js"></script>
</body>
</html>
