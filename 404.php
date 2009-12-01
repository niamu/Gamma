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
		$id = get_the_ID();
		if($image!=""){
			echo "<img src='" . get_bloginfo ( 'url' ) . "/images/$id/feature.jpg' alt='Feature Image' />";
		}else{
			echo "<img src='" . $gamma_404 . "' alt='Feature Image' /><p class='credit'>No image for this post.</p>";
		}
		?>
	</div>
</div>

<div class="bottom"></div>

<div id="content">
	<div class="wrapper unitx7">
		
		<div class="navigation">
			<div class="wrapper unitx7">
				<p>
					<span class="prev"><?php next_posts_link('&larr; PREV') ?></span>
					<span class="next"><?php previous_posts_link('NEXT &rarr;', '', 'yes'); ?></span>
				</p>
			</div>
		</div>

		<h2>Sorry, no content here. <br />How about a nice game of chess?</h2>

	</div>
</div>

<?php get_footer(); ?>