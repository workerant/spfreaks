<?php
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

<!DOCTYPE html>
<!--[if lte IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta name="viewport" content="width=device-width" />

<title><?php wp_title(''); ?></title>

<!--[if lte IE 8]><script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.min.js"></script><![endif]-->

<script type="text/javascript" src="//use.typekit.net/uwi7dmy.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<header class="site-header white row">
		<div class="large-12 columns">
			<div class="row">
				<div class="large-12 small-12 columns headline text-center large-text-right small">
					<a href="/login">Sign In</a> | <a href="/register/">Register</a>
				</div>
			</div>
			<div class="row">
				<div class="columns large-6 push-3 text-center">
					<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php bloginfo('template_url'); ?>/img/logo.jpg" alt="SP Freaks">
					</a>
				</div>
				<div class="large-3 pull-6 small-6 columns nav">
					<a href="/members/">My SPFreaks</a>
					<a href="/item/">Collections</a>
					<a href="/concert/">Tours &amp; Recordings</a>
				</div>
				<div class="large-3 columns small-6 nav text-right margin-left-auto">
					<a href="/about-the-band/">About The Band</a>
					<a href="/forums/">Forum</a>
					<a href="/blog/">Blog</a>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<hr class="black">
				</div>
			</div>
			<div class="row tagline">
				<div class="large-3 columns headline">
					<a href="https://www.facebook.com/pages/SPfreakscom/291093214289095" target="_blank"><span class="icon-facebook"></span></a>
					 &nbsp; <a href="http://twitter.com/SPfreaks" target="_blank"><span class="icon-twitter"></span></a>
				</div>
				<div class="large-6 columns text-center">
					<?php if(is_home()): ?><h3>Welcome, this is a website for<br> Smashing&nbsp;Pumpkins fans &amp; freaks.</h3><?php endif; ?>
				</div>
				<div class="large-3 columns">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</header>


<!-- Begin Page -->
<div class="row white">