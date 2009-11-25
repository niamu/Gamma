<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		
		<div class="navigation">
				<p>
					<span class="prev"><?php previous_post_link('%link', '&larr; PREV'); ?></span>
					<span class="next"><?php next_post_link('%link', 'NEXT &rarr;'); ?></span>

					<span class="prev"><?php next_posts_link('&larr; PREV') ?></span>
					<span class="next"><?php previous_posts_link('NEXT &rarr;'); ?></span>
				</p>
		</div>

		<div id="feature">
			<div class="wrapper">
				<?php 
				$image = get_post_meta(get_the_ID(),'Feature', true); 
				$id = get_the_ID();
				if($image!=""){
					echo "<img src='" . get_bloginfo ( 'url' ) . "/images/$id/feature.jpg' alt='Feature Image' />";
				}else{
					echo "<img src='" . get_bloginfo ( 'template_url' ) . "/images/404.jpg' alt='Feature Image' /><p class='credit'>No image for this post.</p>";
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