<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div id="feature">
		<div class="wrapper">
			<?php 
			$image = get_post_meta(get_the_ID(),'Feature', true); 
			$id = get_the_ID();
			if($image!=""){
				echo "<img src='" . get_bloginfo ( 'url' ) . "/images/$id/feature.jpg' alt='Feature Image' />";
			}else{
				echo "<img src='" . get_bloginfo ( 'url' ) . "/images/404.jpg' alt='Feature Image' /><p class='credit'>No image for this post.</p>";
			}
			?>
		</div>
	</div>

<div class="bottom"></div>

<div id="content">
	<div class="wrapper unitx7">

		<div class="post-details">
		<h2><?php the_title(); ?></h2>
		<div class="meta">
			<div>
			<span class="date"><?php the_time('d/m/y') ?></span>
			</div>
		</div>
		</div>
			
			<div id="flashbake">
			</div>

			<div class="entry width2">
				<?php the_content(); ?>
			</div>

	<?php comments_template(); ?>

	<?php endwhile; ?>	
	<?php else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
