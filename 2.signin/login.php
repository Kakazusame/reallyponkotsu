<?php

	// セッションを使ってログイン状態を判定する
	// セッションを使う場合はsession_startを記述する
	session_start();


	// データベース接続処理
	require('dbconnect.php');



	// 初期値設定
	$email = '';

	if (!empty($_POST)) {
		// バリデーション
		$email=$_POST['email'];
		$password=$_POST['password'];

		$errors=array();

		if($email==''){
			$errors['email']='blank';
		}

		if($password==''){
			$errors['password']='blank';
		}elseif (strlen($password)<4) {
			// strlen()関数　文字の数をカウントする
			// 例：
			// $count=strlen('hogehoge');
			// $countには8という数字がか入ります。

			$errors['password']='length';
		}

		if (empty($errors)) {
			// エラーがなかったら、ログインできるかチェック
			$sql='SELECT * FROM `users` WHERE `email`=?
			AND `password`=?';
		
 		// ?マークを代入する
		$data=array($email,$password);
		$stmt=$dbh->prepare($sql);
		$stmt->execute($data);

		// セレクト文を実行した結果を取得する
		$record=$stmt->fetch(PDO::FETCH_ASSOC);
		// 全件取得する場合はループさせて配列に入れる。
		// セエレクトした内容の一番上（エクセルの表の一番上のみ）
		// だけ取得して存在するかどうかチェックすれば、ログイン判定可能

		// var_dump($record);
		if($record){
			// echo 'ログインできました。タイムラインへ移動します<br>';
			// 一致した場合はログインする
			$_SESSION['login_user']=$record;
			header('Location:mypage.php');
			exit();
		}else{
			// ログインできなかった場合
			$errors['login']='ng';
		}


	}


	}

?>

<!DOCTYPE HTML>
<html lang="ja">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Air &mdash; Free Website Template, Free HTML5 Template by freehtml5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">	 -->
	<link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<!-- すづかが作ったCSS -->
	<link rel="stylesheet" href="css/topimage.css">

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.html">Joynt<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="portfolio.html">コラム</a></li>
							<li class="has-dropdown">
								<a href="blog.html">Q&A</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="btn-cta"><a href="#"><span>Login</span></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
							<img src="images/topimage.jpg" width=100% heigjt=70%>
						<!-- 	<br>
							<br>
							<p><a class="btn btn-primary btn-lg btn- text-center" href="#"></i> 質問してみる</a> <br>
							   <br>


								<a class="btn btn-primary btn-lg btn-learn">New Q&A</a></p> -->
								<!-- <p class="topimage">
								  <img src="images/topimage.jpg">
								</p>
							<p><a class="btn btn-primary btn-lg btn-demo" href="#"></i> View Demo</a> <a class="btn btn-primary btn-lg btn-learn">Learn More</a></p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-features">
		<div class="container">
			<div class="services-padding">
				<div class="row">
	

			<h1>ログイン画面</h1>

	<form method="POST" action="" >
	<!-- フォームタグ内にデータを設定する -->
		<?php if (isset($errors['login'])){?>
		<div class="alert alert-danger">
			メールアドレスまたはパスワードが違います。
		</div>

	<?php } ?>
	

	<!-- メールアドレスのデータ -->
	<label>メールアドレス</label>
	<br>
	<input type="email" name="email" placeholder="nex@seed.jp" value="<?php echo $email;?>">
	<br>

	<?php if (isset($errors['email'])&& $errors['email']=='blank'){?>
		<div class="alert alert-danger">
			メールアドレスを入力してください。
		</div>

	<?php } ?>


	<!-- パスワードのデータ -->
	<label>パスワード</label>
	<br>
	<input type="password" name="password">
	<br>
	<br>

		<?php if (isset($errors['password'])&& $errors['password']=='blank'){?>
		<div class="alert alert-danger">
			パスワードを入力してください。
		</div>

		<?php }elseif (isset($errors['password'])&& $errors['password']=='length') {?>
		<div class="alert alert-danger">
			パスワードは4文字以上を入力してください。
		</div>
	<?php } ?>


	



	<input type="submit" value="ログイン">

	</form>

	<br>

	<div>
		<a href="shinkitoroku.php">ユーザ登録</a>
	</div>

					






					<!-- <div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-hotairballoon"></i>
							</span>
							<div class="feature-copy">
								<h3>Marketing</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More <i class="icon-arrow-right22"></i></a></p>
							</div>
						</div>
					</div>

					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-search"></i>
							</span>
							<div class="feature-copy">
								<h3>Search Engine</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More <i class="icon-arrow-right22"></i></a></p>
							</div>
						</div>

					</div>
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<div class="feature-copy">
								<h3>Earn Money</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More <i class="icon-arrow-right22"></i></a></p>
							</div>
						</div>
					</div> -->
				<!-- </div>


				<div class="row">
					<div class="col-md-4 animate-box">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-wine"></i>
							</span>
							<div class="feature-copy">
								<h3>Entrepreneur</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More <i class="icon-arrow-right22"></i></a></p>
							</div>
						</div>

					</div>

					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-genius"></i>
							</span>
							<div class="feature-copy">
								<h3>Stragic Plan</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More <i class="icon-arrow-right22"></i></a></p>
							</div>
						</div>

					</div>
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-chat"></i>
							</span>
							<div class="feature-copy">
								<h3>Support</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More <i class="icon-arrow-right22"></i></a></p>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>







	<!-- <div id="fh5co-wireframe">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Wireframe Connects the Underlying Conceptual Structure</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 animate-box">
					<div class="user-frame">
						<h3>Wireframe Connects the Underlying Conceptual Structure</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						<span>Louie Jie Mahusay</span><br>
						<small>CEO, Founder</small>
					</div>
				</div>
				<div class="col-md-7 animate-box">
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					<blockquote>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</blockquote>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-slider">
		<div class="container">
			<div class="row">
				<div class="col-md-6 animate-box">
					<div class="heading">
						<h2>Download Our Latest Free HTML5 Bootstrap Template</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
					</div>
				</div>
				<div class="col-md-6 col-md-push-1 animate-box">
					<aside id="fh5co-hero">
					<div class="flexslider">
						<ul class="slides">
					   	<li style="background-image: url(images/img_bg_1.jpg);">
					   		<div class="overlay-gradient"></div>
					   		<div class="container-fluid">
					   			<div class="row">
						   			<div class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
						   				<div class="slider-text-inner">
						   					<div class="desc">
													<h2>Air Free HTML5 Bootstrap Template</h2>
													<p>Ink is a free html5 bootstrap and a multi-purpose template perfect for any type of websites. A combination of a minimal and modern design template. The features are big slider on homepage, smooth animation, product listing and many more</p>
						   					</div>
						   				</div>
						   			</div>
						   		</div>
					   		</div>
					   	</li>
					   	<li style="background-image: url(images/img_bg_2.jpg);">
					   		<div class="overlay-gradient"></div>
					   		<div class="container-fluid">
					   			<div class="row">
						   			<div class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
						   				<div class="slider-text-inner">
						   					<div class="desc">
													<h2>Ink Free HTML5 Bootstrap Template</h2>
													<p>Ink is a free html5 bootstrap and a multi-purpose template perfect for any type of websites. A combination of a minimal and modern design template. The features are big slider on homepage, smooth animation, product listing and many more</p>
						   					</div>
						   				</div>
						   			</div>
						   		</div>
					   		</div>
					   	</li>
					   	<li style="background-image: url(images/img_bg_3.jpg);">
					   		<div class="overlay-gradient"></div>
					   		<div class="container-fluid">
					   			<div class="row">
						   			<div class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
						   				<div class="slider-text-inner">
						   					<div class="desc">
													<h2>Travel Free HTML5 Bootstrap Template</h2>
													<p>Ink is a free html5 bootstrap and a multi-purpose template perfect for any type of websites. A combination of a minimal and modern design template. The features are big slider on homepage, smooth animation, product listing and many more</p>
						   					</div>
						   				</div>
						   			</div>
						   		</div>
					   		</div>
					   	</li>		   	
					  	</ul>
				  	</div>
				</aside>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Recent Post</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#" class="blog-bg" style="background-image: url(images/blog-1.jpg);"></a>
						<div class="blog-text">
							<span class="posted_on">Feb. 15th 2016</span>
							<h3><a href="#">Photoshoot On The Street</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<ul class="stuff">
								<li><i class="icon-heart2"></i>249</li>
								<li><i class="icon-eye2"></i>1,308</li>
								<li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
							</ul>
						</div> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#" class="blog-bg" style="background-image: url(images/blog-2.jpg);"></a>
						<div class="blog-text">
							<span class="posted_on">Feb. 15th 2016</span>
							<h3><a href="#">Surfing at Philippines</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<ul class="stuff">
								<li><i class="icon-heart2"></i>249</li>
								<li><i class="icon-eye2"></i>1,308</li>
								<li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
							</ul>
						</div> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#" class="blog-bg" style="background-image: url(images/blog-3.jpg);"></a>
						<div class="blog-text">
							<span class="posted_on">Feb. 15th 2016</span>
							<h3><a href="#">Focus On Uderwater</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<ul class="stuff">
								<li><i class="icon-heart2"></i>249</li>
								<li><i class="icon-eye2"></i>1,308</li>
								<li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
							</ul>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="fh5co-started">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Hire Us!</h2>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					<p><a href="#" class="btn btn-default btn-lg">Contact Us</a></p>
				</div>
			</div>
		</div>
	</div> -->

	<footer id="fh5co-footer" role="contentinfo">
						<div class="fh5co-logo" ><a href="index.html"><span style="font-size: 50px; color: black;">　Joynt</span><span>.</span></a></div>
					</div><br>


		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-2 col-md-push-1 fh5co-widget">
					<h4>Home</h4>
				</div>
				<div class="col-md-2 col-md-push-1 fh5co-widget">
					<h4>コラム</h4>
				</div>

				<div class="col-md-2 col-md-push-1 fh5co-widget">
					<h4>Q&A</h4>
				</div>

				<div class="col-md-2 col-md-push-1 fh5co-widget">
					<h4>About</h4>
				</div>
				<div class="col-md-2 col-md-push-1 fh5co-widget">
					<h4>Contact</h4>
				</div>
				<div class="col-md-2 col-md-push-1 fh5co-widget">
					<h4>Login</h4>
				</div>





			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
				<!-- 	<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
 -->				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>


