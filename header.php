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
	<!--<link rel="stylesheet" href="<?php // bloginfo('template_url') ?>/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/all.css">
    <?php wp_head(); ?>
</head>  
<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KV3F23"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KV3F23');</script>
<!-- End Google Tag Manager -->

<!-- fb script -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({       appId      : '779313252079735',
                        channelUrl : '<?php bloginfo('template_url') ?>/channel.html',
                        cookies    : true,
                        status     : true,
                        xfbml      : true
        });
        /*FB.Event.subscribe('edge.create', function(targetUrl) {
            ga('send', 'social', 'facebook', 'like', targetUrl);
        });*/
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script><!-- end FB script -->

<?php // Navigation
$navigationArgs = array(
    'theme_location'  => 'primary_nav',
    'container'       => false,
    'menu_class'      => 'menu',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'items_wrap'      => '<ul class="nav navbar-nav navbar-right hidden-xs">%3$s</ul>'
);
$mobileNavigationArgs = array(
    'theme_location'  => 'mobile_nav',
    'container'       => false,
    'menu_class'      => 'menu',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'items_wrap'      => '<ul class="nav navbar-nav navbar-right visible-xs">%3$s</ul>'
);

?>
<nav id="primary-navigation-wrapper" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" id="hamburger-toggle" data-toggle="collapse" data-target="#primary-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar top"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="img-responsive" src="<?php bloginfo('template_url') ?>/images/logo.svg" alt="Groundswell Logo"></a>
        </div>

        <div class="collapse navbar-collapse pull-right" id="primary-navigation">
            <h4 class="visible-xs" style="text-align:center;color:#fff">Menu</h4>

            <?php wp_nav_menu( $navigationArgs ); // NAVIGATION HERE ?>
            <?php wp_nav_menu( $mobileNavigationArgs ); // MOBILE NAVIGATION HERE ?>

            <form id="primary-search-field" method="get" role="search" action="<?php echo home_url( '/' ); ?>">
                <div class="form-group col-sm-12">
                    <input type="text" class="form-control" value="" name="s" placeholder="Search">
                    <button type="submit" class="btn gs-btn gs-btn-blue"><span class="icon-arrow-right"></span></button>
                </div>
            </form>
        </div>
    </div>
</nav>













