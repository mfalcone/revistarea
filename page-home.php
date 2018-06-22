<?php /* Template Name: Home */ ?>
<?php get_header();
$args = array( 'post_type' => array( 'post') , 'category_name' => 'principal', 'posts_per_page' => 3 );
$loopnumber =	new WP_Query( $args );			
?>

<div class="simple-carousel principal" data-example-id="simple-carousel">
	<div class="carousel slide carousel-fade" id="carousel-example-generic" data-ride="carousel">
		<ol class="carousel-indicators"> 
			<?php while ( $loopnumber->have_posts() ) : $loopnumber->the_post(); $counter++?> 
				<li data-target="#carousel-example-generic" data-slide-to="<?php echo $counter-1;?>" class="<?php if($counter==1){echo "active";} ?>"></li> 
			<?php endwhile; // end of the loop. ?>
		</ol> 
		<div class="carousel-inner contenedor_carrusel" role="listbox"> 
			<?php
				$loop = new WP_Query( $args );
				$counter = 0;
				while ( $loop->have_posts() ) : $loop->the_post(); $counter++?>
					<?php $post_id = get_the_ID(); ?>
					<article style="background-image: url(<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('full');}?>)" class="item <?php if($counter==1){echo "active";} ?>">
						<div class="side-bar">
								
								<h3><?php echo get_post_meta( $post_id, '_bajada_meta_key', true );?></h3>

								<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
								<h2>Por:
									<?php  
										
										$name = get_post_meta( $post_id, '_wporg_meta_key', true );
										echo $name;
									?>
								 </h2>

								 <div class="extracto">
								 	<p>
									 	<a href="<?php the_permalink();?>"><?php echo(get_the_excerpt()); ?></a>
								 	</p>
								 </div>
						</div>
					</article>
			<?php endwhile; // end of the loop. ?>
		</div> 
	</div> 
</div> 

<section class="loop-total">
	<?php 
		$exclude = get_cat_ID('principal');
		$args2 = array( 'post_type' => array( 'post') , 'cat' => '-'.$exclude, 'posts_per_page' => 9 ); 
		$bucle = new WP_Query( $args2 );
		while ( $bucle->have_posts() ) : $bucle->the_post();?>
		
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

<?php get_footer();?>
