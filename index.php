<?php
	require 'session.php';
?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Etrain</title>
<link rel="icon" href="global_images/xfavicon.png.pagespeed.ic.2-YSz7DYbm.webp">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.min.css">
<link rel="stylesheet" href="assets/css/A.bootstrap.min.css+animate.css+owl.carousel.min.css+themify-icons.css+flaticon.css+magnific-popup.css+slick.css,Mcc.cumd4WexDy.css.pagespeed.cf.P9fOwQ_VlG.css" />

<link rel="stylesheet" href="assets/css/front_end_style.css">
</head>
<body>

<header class="main_menu home_menu">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-12">
<nav class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="index"<?= PHP_EXT ?>> <img src="global_images/xfavicon.png.pagespeed.ic.2-YSz7DYbm.webp" alt="logo"> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
<ul class="navbar-nav align-items-center">
<li class="nav-item">
<a class="nav-link" href="login"<?= PHP_EXT ?>>Login</a>
</li>
</ul>
</div>
</nav>
</div>
</div>
</div>
</header>


<section class="banner_part">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-xl-6">
<div class="banner_text">
<div class="banner_text_iner">
<h5>Every child yearns to learn</h5>
<h1>Making Your Childs
World Better</h1>
<p>Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales
his void unto last session for bite. Set have great you'll male grass yielding yielding
man</p>
<a href="#view_courses" class="btn_1">View Course </a>

</div>
</div>
</div>
</div>
</div>
</section>


<section class="feature_part">
<div class="container">
<div class="row">
<div class="col-sm-6 col-xl-3 align-self-center">
<div class="single_feature_text ">
<h2>Awesome <br> Feature's</h2>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="single_feature">
<div class="single_feature_part">
<span class="single_feature_icon"><i class="ti-layers"></i></span>
<h4>Better Future</h4>
<p>An empowering quote from the former president. “The best way to predict your future is to create it.</p>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="single_feature">
<div class="single_feature_part">
<span class="single_feature_icon"><i class="ti-new-window"></i></span>
<h4>Qualified Trainers</h4>
<p>Tell me and I forget, teach me and I may remember, involve me and I learn.“The best way to predict your future is to create it</p>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="single_feature">
<div class="single_feature_part single_feature_part_2">
<span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
<h4>Job Oppurtunity</h4>
<p>Choose a job you love, and you will never have to work a day in your life.“The best way to predict your future is to create it</p>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="learning_part">
<div class="container">
<div class="row align-items-sm-center align-items-lg-stretch">
<div class="col-md-7 col-lg-7">
<div class="learning_img">
<img src="global_images/xlearning_img.png.pagespeed.ic.j0Lm4J4bUn.webp" alt="">
</div>
</div>
<div class="col-md-5 col-lg-5">
<div class="learning_member_text">
<h5>About us</h5>
<h2>Learning with Love
and Laughter</h2>
<p>Fifth saying upon divide divide rule for deep their female all hath brind Days and beast
greater grass signs abundantly have greater also
days years under brought moveth.</p>
<ul>
<li><span class="ti-pencil-alt"></span>Him lights given i heaven second yielding seas
gathered wear</li>
<li><span class="ti-ruler-pencil"></span>Fly female them whales fly them day deep given
night.</li>
</ul>
<a href="#" class="btn_1">Read More</a>
</div>
</div>
</div>
</div>
</section>


<section class="member_counter">
<div class="container">
<div class="row">
<div class="col-lg-4 col-sm-6">
<div class="single_member_counter">
<span class="counter"><?= TotalTeacher() ?></span>
<h4>All Teachers</h4>
</div>
</div>
<div class="col-lg-4 col-sm-6">
	<div class="single_member_counter">
		<span class="counter"><?= TotalStudent() ?></span>
		<h4> All Students</h4>
	</div>
</div>
<div class="col-lg-4 col-sm-12">
<div class="single_member_counter">
<span class="counter"><?= TotalCourses()  ?></span>
<h4>Total Courses</h4>
</div>
</div>
</div>
</div>
</section>

<section class="special_cource padding_top" id="view_courses">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-5">
<div class="section_tittle text-center">
<p>popular courses</p>
<h2>Special Courses</h2>
</div>
</div>
</div>
<div class="row">
	<?php
		$branch = array_filter(Branch());
		foreach ($branch as $key => $value) {
			
		?>
			<div class="col-sm-6 col-lg-3">
				<div class="single_special_cource">
					<div class="special_cource_text">
						<a href="course-details.html"> <h3><?= $value['branch_name'] ?></h3></a>
					</div>
				</div>
			</div>
		<?php
		}
	?>
</div>
</section>


<section class="advance_feature learning_part">
<div class="container">
<div class="row align-items-sm-center align-items-xl-stretch">
<div class="col-md-6 col-lg-6">
<div class="learning_member_text">
<h5>Advance feature</h5>
<h2>Our Advance Educator
Learning System</h2>
<p>Fifth saying upon divide divide rule for deep their female all hath brind mid Days
and beast greater grass signs abundantly have greater also use over face earth
days years under brought moveth she star</p>
<div class="row">
<div class="col-sm-6 col-md-12 col-lg-6">
<div class="learning_member_text_iner">
<span class="ti-pencil-alt"></span>
<h4>Learn Anywhere</h4>
<p>There earth face earth behold she star so made void two given and also our</p>
</div>
</div>
<div class="col-sm-6 col-md-12 col-lg-6">
<div class="learning_member_text_iner">
<span class="ti-stamp"></span>
<h4>Expert Teacher</h4>
<p>There earth face earth behold she star so made void two given and also our</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="learning_img">
<img src="global_images/xadvance_feature_img.png.pagespeed.ic.oXXPvVL-Eh.webp" alt="">
</div>
</div>
</div>
</div>
</section>


<section class="blog_part section_padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-5">
<div class="section_tittle text-center">
<p>Our Team</p>
<h2> Devloped By...</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-lg-3 col-xl-3">
<div class="single-home-blog">
<div class="card">
<img src="global_images/IMG_20201209_171023.jpg"  height="250px" class="card-img-top" alt="blog">
<div class="card-body">
<a href="blog.html">
<h5 class="card-title">Khan Shadab Alam</h5>
</a>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-lg-3 col-xl-3">
<div class="single-home-blog">
<div class="card">
<img src="https://loverary.files.wordpress.com/2013/10/facebook-default-no-profile-pic.jpg?w=1200"  height="250px"class="card-img-top" alt="blog">
<div class="card-body">
<a href="blog.html">
<h5 class="card-title">Khan Wasif Kamaal</h5>
</a>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-lg-3 col-xl-3">
<div class="single-home-blog">
<div class="card">
<img src="https://i.pinimg.com/originals/39/1e/e1/391ee12077ba9cabd10e476d8b8c022b.jpg" height="250px" class="card-img-top" alt="blog">
<div class="card-body">
<a href="blog.html">
<h5 class="card-title">Pradnya Kamble</h5>
</a>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-lg-3 col-xl-3">
<div class="single-home-blog">
<div class="card">
<img src="https://i.pinimg.com/originals/39/1e/e1/391ee12077ba9cabd10e476d8b8c022b.jpg" height="250px" class="card-img-top" alt="blog">
<div class="card-body">
<a href="blog.html">
<h5 class="card-title">Mansi Borade</h5>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="blog_part section_padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-5">
<div class="section_tittle text-center">
<p>Our Blog</p>
<h2> Blog</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-lg-4 col-xl-4">
<div class="single-home-blog">
<div class="card">
<img src="global_images/xblog_1.png.pagespeed.ic.8MonBf2XtW.webp" class="card-img-top" alt="blog">
<div class="card-body">
<a href="#" class="btn_4">Design</a>
<a href="blog.html">
<h5 class="card-title">Dry beginning sea over tree</h5>
</a>
<p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
<ul>
<li> <span class="ti-comments"></span>2 Comments</li>
<li> <span class="ti-heart"></span>2k Like</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-4 col-xl-4">
<div class="single-home-blog">
<div class="card">
<img src="global_images/xblog_2.png.pagespeed.ic.UfJHBMkPVa.webp" class="card-img-top" alt="blog">
<div class="card-body">
<a href="#" class="btn_4">Developing</a>
<a href="blog.html">
<h5 class="card-title">All beginning air two likeness</h5>
</a>
<p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
<ul>
<li> <span class="ti-comments"></span>2 Comments</li>
<li> <span class="ti-heart"></span>2k Like</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-4 col-xl-4">
<div class="single-home-blog">
<div class="card">
<img src="global_images/xblog_3.png.pagespeed.ic.asZDY7GMVU.webp" class="card-img-top" alt="blog">
<div class="card-body">
<a href="#" class="btn_4">Design</a>
<a href="blog.html">
<h5 class="card-title">Form day seasons sea hand</h5>
</a>
<p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
<ul>
<li> <span class="ti-comments"></span>2 Comments</li>
<li> <span class="ti-heart"></span>2k Like</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<footer class="footer-area">
<div class="container">
<div class="row justify-content-between">
<div class="col-sm-6 col-md-4 col-xl-3">
<div class="single-footer-widget footer_1">
<a href="index.html"> <img src="global_images/xfavicon.png.pagespeed.ic.2-YSz7DYbm.webp" alt=""> </a>
<p>But when shot real her. Chamber her one visite removal six
sending himself boys scot exquisite existend an </p>
<p>But when shot real her hamber her </p>
</div>
</div>
<div class="col-sm-6 col-md-4 col-xl-4">
<div class="single-footer-widget footer_2">
<h4>Newsletter</h4>
<p>Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.
</p>
<form action="#">
<div class="form-group">
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder='Enter email address' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
<div class="input-group-append">
<button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
</div>
</div>
</div>
</form>
<div class="social_icon">
<a href="#"> <i class="ti-facebook"></i> </a>
<a href="#"> <i class="ti-twitter-alt"></i> </a>
<a href="#"> <i class="ti-instagram"></i> </a>
<a href="#"> <i class="ti-skype"></i> </a>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-md-4">
<div class="single-footer-widget footer_2">
<h4>Contact us</h4>
<div class="contact_info">
<p><span> Address :</span> Hath of it fly signs bear be one blessed after </p>
<p><span> Phone :</span> +2 36 265 (8060)</p>
<p><span> Email : </span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="97fef9f1f8d7f4f8fbf8e5fbfef5b9f4f8fa">[email&#160;protected]</a> </p>
</div>
</div>
</div>
</div>
</div>
</footer>



<script src="assets/js/jquery_latest.js"></script>

<script src="assets/js/popper.min.js+bootstrap.min.js.pagespeed.jc.u-jKsEkIJu.js"></script><script>eval(mod_pagespeed_53lpAu8E7e);</script>

<script>eval(mod_pagespeed_T9kFIRnY24);</script>

<script src="assets/js/jquery.magnific-popup.js"></script>

<script src="assets/js/swiper.min.js"></script>

<script src="assets/js/masonry.pkgd.js"></script>

<script src="assets/js/owl.carousel.min.js+jquery.nice-select.min.js+slick.min.js+jquery.counterup.min.js+waypoints.min.js.pagespeed.jc.QrZJiAiLnj.js"></script>

<script src="assets/js/custom.js"></script>

</body>
</html>