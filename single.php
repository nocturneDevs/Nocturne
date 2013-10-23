<?php get_header(); ?>

	<div class="single-project-wrapper">
		
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<h1 class="single-project-title">
				<?php the_title(); ?>
			</h1>

			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="single-project-img-wrapper">
				<img src="<?php echo $image[0]; ?>" />
			</div>

			<?php the_content(); ?>
		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>