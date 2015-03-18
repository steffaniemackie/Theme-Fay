<!doctype html>
<html>
<head>
<meta charset="UTF-8">



<title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>
<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<script src="<?php bloginfo('template_url'); ?>/jquery-2.1.0.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/script.js"></script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header role="mainheader"> 

<h1 id="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>


<nav id="headernav">

	<?php wp_nav_menu(); ?>

</nav>


</header>