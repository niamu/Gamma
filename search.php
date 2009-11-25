<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

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

<?php query_posts($query_string . '&posts_per_page=-1'); if (have_posts()) : while (have_posts()) : the_post(); ?>


		<div class="post-details">
		<h2><a href="<?php the_permalink() ?>#feature" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h2>
		<div class="meta">
			<div>
			<span class="date"><?php the_time('d/m/y') ?></span>
			</div>
		</div>
		</div>

			<div class="entry width2">
				<?php the_excerpt(); ?>
			</div>

	<?php endwhile; ?>	
	<?php else: ?>

		<h2>Sorry, no search results. <br />How about a nice game of chess?</h2>

<?php endif; ?>
</div>
</div>

<?php get_footer(); ?>