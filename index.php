<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<?php
	global $options;
	foreach ($options as $value) {
	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
	}
?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div id="feature">
			<div class="wrapper">
				<?php 
				$image = get_post_meta(get_the_ID(),'Feature', true); 
				if($image!=""){
					echo "<img src='$image' alt='Feature Image' />";
				}else{
					echo "<img src='" . $gamma_missing . "' alt='Feature Image' /><p class='credit'>No image for this post.</p>";
				}
				?>
			</div>
		</div>

<div class="bottom"></div>

<div id="content">
	<div class="wrapper unitx7">

		<div class="post-details">
			<h2><a href="<?php the_permalink() ?>#feature" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="meta">
				<div>
					<span class="date"><?php the_time('d/m/y') ?></span>
				</div>
			</div>
		</div>

		<div class="entry width2">
			<?php add_filter('the_content','custom_more_link'); ?>
			<?php the_content(); ?>
		</div>
		
	<?php endwhile; ?>
	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
	
</div>

<?php get_footer(); ?>