<?php get_header();?>
<div id="main" class="container single-page">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<header class="page-header">
				<h1><?php the_title(); ?></h1>
				<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('large');
					}else{?>
						<img alt="Silvana Cerini Logo" src="<?php echo get_stylesheet_directory_uri();?>/images/backfoto_large.jpg" /> 
					<?php }?>
			</header>
			<section class="content col-md-8 col-md-offset-2 ">
			<?php the_content(); ?>
			</section>
		<?php endwhile;?>
	<?php endif; ?>
</div>
<?php get_footer();?>


