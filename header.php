<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' &raquo; '; } ?><?php bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/images/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>">  
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">  
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/all.css">
    <?php wp_head(); ?>
</head>  
<body <?php body_class(); ?>>

<!-- Navigation -->
<nav id="primary-navigation-wrapper" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" id="hamburger-toggle" data-toggle="collapse" data-target="#primary-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php get_home_url(); ?>"><img class="img-responsive" src="<?php bloginfo('template_url') ?>/images/logo.svg" alt="Groundswell Logo"></a>
        </div>

        <div class="collapse navbar-collapse pull-right" id="primary-navigation">
            <h4 class="visible-xs" style="text-align:center;color:#fff">Menu</h4>
            <ul class="nav navbar-nav navbar-right">
                <li class="visible-xs darker-blue-bg"><a href="#">Action</a></li>
                <li class="visible-xs darker-blue-bg"><a href="#">Trainings</a></li>
                <li class="visible-xs darker-blue-bg"><a href="#">Inspiration</a></li>
                <li><a href="#">Who We Are</a></li>
                <li><a href="#">What We Do</a></li>
                <li><a href="#">Blog</a></li>
                <li class="visible-xs"><a href="#">Donate</a></li>
                <li class="orange-bg"><a href="#">Talk to Us</a></li>
                <li class="hidden-xs search-toggle"><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
            </ul>
            <form id="primary-search-field" role="search">
                <div class="form-group col-sm-12">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn gs-btn gs-btn-blue"><span class="icon-arrow-right"></span></button>
                </div>
            </form>
        </div>
    </div>
</nav>













