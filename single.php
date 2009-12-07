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

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
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
		<h2><?php the_title(); ?></h2>
		<div class="meta">
			<div>
			<span class="date"><?php the_time('d/m/y') ?></span>
			</div>
		</div>
		</div>

			<div class="entry width2">
				<?php the_content(); ?>
			</div>

	<?php comments_template(); ?>

	<?php endwhile; ?>	
	<?php else: ?>

		<div id="feature">
			<div class="wrapper">
				<?php 
				$image = get_post_meta(get_the_ID(),'Feature', true); 
				$id = get_the_ID();
				if($image!=""){
					echo "<img src='" . get_bloginfo ( 'url' ) . "/images/$id/feature.jpg' alt='Feature Image' />";
				}else{
					echo "<img src='" . $gamma_missing . "' alt='Feature Image' /><p class='credit'>No image for this post.</p>";
				}
				?>
			</div>
		</div>
		
		<div class="bottom"></div>
		
		<div id="content">
			<div class="wrapper unitx7">
				<h2>Sorry, no content here. <br />How about a nice game of chess?</h2>
			</div>
		</div>
		
		<div class="top"></div>

<?php endif; ?>

<?php get_footer(); ?>
