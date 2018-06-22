<?php get_header();?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); 
		$post_id = get_the_ID();
	?>
		<div class="single-header" style="background-image: url(<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('full');}?>)" >
			<div class="side-bar">
				<h3><?php echo get_post_meta( $post_id, '_bajada_meta_key', true );?></h3>
				<h1><?php the_title(); ?></h1>
				<h2>Por:
					<?php  
						$name = get_post_meta( $post_id, '_wporg_meta_key', true );
						echo $name;
					?>
				 </h2>
				 <div class="extracto">
				 	<p><?php echo(get_the_excerpt()); ?></p>
				 </div>
			</div>
		</div>
		<section class="content col-md-6 col-md-offset-3 single-content">
			<?php the_content(); ?>
		</section>
		<?php endwhile;?>
	<?php endif; ?>
</div>
<?php get_footer();?>


