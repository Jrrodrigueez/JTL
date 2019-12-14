<html>
<head>
	<title>Instituto Jorge Tadeo Lozano</title>
	<base href="<?php echo 'http://'. $_SERVER['HTTP_HOST'].'/PayJTL/'; ?>" />
	<link href="assets/img/ijtl.png" rel="icon" type="image/x-icon"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- 	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/modernizr.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="js/main.js"></script> -->
</head>
<body>
	<i class="btn-up fa fa-arrow-circle-o-up hidden-xs"></i>
	<header class="full-reset header">
		<div class="full-reset logo">
			<span class="h3">Instituto Jorge Tadeo Lozano</span>
		</div>
		<nav class="full-reset navigation">
			<ul class="full-reset list-unstyled">
				<li><i class="fa fa-user"></i> <?php echo $_SESSION["usuario"]; ?></li>
				<li><a href="logout.php"><i class="fa fa-arrow-right"></i> Cerrar sesión</a></li>
			</ul>
		</nav>
	</header>
	<div class="container">