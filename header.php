<!doctype html>

<!--[if lt IE 9]> <html class="no-js lte9 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 oldie" lang="en"> <![endif]-->
<!--[if gt IE 9]>  <html> <![endif]-->
<!--[if !IE]><!-->
<html>
	<head>
		<title><?php wp_title("::", "true", "right");?> <?php bloginfo('name'); ?></title>
		  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

		<?php wp_head();?>
	</head>
	<body <?php body_class( 'class-name' ); ?>>
		<header class="main-header">
				<div class="container">
					<div class="col-md-4">
						<a href="<?php echo get_home_url(); ?>" class="logo">Revista Rea</a>
					</div>
					<div class="col-md-8 navbar">
							<a href="#" class="buscar"><span class="fa fa-search"></span></a>
							<?php wp_nav_menu( array( 'theme_location' => 'home-menu',
							  'depth' => 2,
							  'container' => false,
							  'menu_class' => 'nav',
							  'walker' => new BootstrapNavMenuWalker())); 
							?>
							<div id="form-buscador">
								<form  role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
								<input type="search" class="search-field" placeholder="Buscar…" value="" name="s" title="Buscar" />
							  	<button type="submit" class="btn">
							  		<i class="fa fa-chevron-right"></i>
							  	</button>
						  		</form>
						  	</div>
					</div>
				</div>	
		</header>