<?php get_header();?>
<div class="container categorias">
	<header class="page-header">
		<h1><?php single_cat_title(); ?></h1>
		<h2><?php echo category_description(); ?></h2>
	</header>
	<section class="loop-total">
	<?php while ( have_posts() ) : the_post();?>
	<article class="col-md-4" style="background-image: url(<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('large');}?>)">
		<div class="wrap">
			<div class="portada">
				<div class="titulo">
					<h2><?php the_title();?></h2>
					<h3>
						<span>Por:</span>
							<?php  
								$post_id = get_the_ID();
								$name = get_post_meta( $post_id, '_wporg_meta_key', true );
								echo $name;
							?>
					</h3>
					<div class="extracto">
						<p><?php echo get_post_meta( $post_id, '_bajada_meta_key', true );?></p>
					</div>
				</div>
			</div>
		</div>
		<a class="ver-pagina" href="<?php the_permalink();?>"></a>
	</article>
	<?php endwhile; // end of the loop. ?>
	</section>
</div>
<?php get_footer();?>