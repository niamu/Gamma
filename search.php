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

<div id="feature">
	<div class="wrapper">
		<?php 
		$image = get_post_meta(get_the_ID(),'Feature', true); 
		if($image!=""){
			echo "<img src='$image' alt='Feature Image' />";
		}else{
			echo "<img src='" . $gamma_search . "' alt='Feature Image' /><p class='credit'>No image for this post.</p>";
		}
		?>
	</div>
</div>

<div class="bottom"></div>
<div class="content">
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
		
			<div class="wrapper unitx7">
				<h2>Sorry, no content here. <br />How about a nice game of chess?</h2>
			</div>

<?php endif; ?>

</div>
</div>

<?php get_footer(); ?>