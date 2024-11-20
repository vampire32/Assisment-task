<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'custom-theme' ); ?></a>

  <!-- header strat -->
  <header>
			<div class="main-navigate wow fadeInDown">
				<div class="container-fluid">
					<div class="row nav-flex">
						<div class="col-md-2 col-sm-2 col-9">
							<div class="logo">
							
								 <a href="/"><?php
if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo(); // Outputs the logo with the custom link to the homepage
}
?></a>
							</div>
						</div>
						<div class="sidenav" id="mySidenav">
							<a class="closebtn" href="javascript:void(0)" onclick="closeNav()">×</a>
						</div>
						<div class="mobilecontainer d-lg-none  d-md-none">
							<span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">☰</span>
						</div>
						<div class="col-md-10 col-sm-9 col-xs-2 col-9  d-none d-md-block ">
							<div class="navigation">

							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
    <!-- header end -->
