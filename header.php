<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php bloginfo('name') ?> RSS feed" />
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php bloginfo('name') ?> comments RSS feed" />

<title><?php wp_title('&bull;', true, 'right'); ?><?php bloginfo('name'); ?></title>

<!--[if gte IE 7]><!-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--<![endif]-->

<!--[if lte IE 7]><!-->

<!--<![endif]-->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<?php
		global $options;
		foreach ($options as $value) {
		    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
		}
	?>

<div id="header">
<div class="wrapper unitx7">
	<div id="logo">
		<h1><a href="<?php bloginfo('url'); ?>" <?php if($gamma_logo) {echo "style=\"background:url('$gamma_logo') no-repeat;\"";}?>><?php bloginfo('name'); ?></a></h1>
	</div>
	<div id="author">
		<img src="<?php echo $gamma_avatar; ?>" class="avatar" alt="<?php echo $gamma_name; ?>" />
		<strong><?php echo $gamma_name; ?></strong>
		<div class="social">
			<ul>
				<?php if ($gamma_twitter) { 
					echo '<li><a href="http://twitter.com/'.$gamma_twitter.'"><img src="'.get_bloginfo('template_directory').'/images/twitter.png" alt="Twitter" /></a></li>';
				}?>
				<?php if ($gamma_lastfm) { 
					echo '<li><a href="http://last.fm/user/'.$gamma_lastfm.'"><img src="'.get_bloginfo('template_directory').'/images/lastfm.png" alt="Last.fm" /></a></li>';
				}?>
				<?php if ($gamma_flickr) { 
					echo '<li><a href="http://flickr.com/photos/'.$gamma_flickr.'"><img src="'.get_bloginfo('template_directory').'/images/flickr.png" alt="Flickr" /></a></li>';
				}?>
				<?php if ($gamma_digg) { 
					echo '<li><a href="http://digg.com/users/'.$gamma_digg.'"><img src="'.get_bloginfo('template_directory').'/images/digg.png" alt="Digg" /></a></li>';
				}?>
				<?php if ($gamma_facebook) { 
					echo '<li><a href="http://facebook.com/'.$gamma_facebook.'"><img src="'.get_bloginfo('template_directory').'/images/facebook.png" alt="Facebook" /></a></li>';
				}?>
				<?php if ($gamma_qik) { 
					echo '<li><a href="http://qik.com/'.$gamma_qik.'"><img src="'.get_bloginfo('template_directory').'/images/qik.png" alt="Qik" /></a></li>';
				}?>
				<?php if ($gamma_youtube) { 
					echo '<li><a href="http://youtube.com/user/'.$gamma_youtube.'"><img src="'.get_bloginfo('template_directory').'/images/youtube.png" alt="YouTube" /></a></li>';
				}?>
				<?php if ($gamma_roboto) { 
					echo '<li><a href="http://robo.to/'.$gamma_roboto.'"><img src="'.get_bloginfo('template_directory').'/images/roboto.png" alt="Roboto" /></a></li>';
				}?>
				<?php if (!$gamma_robot && !$gamma_youtube && !$gamma_qik && !$gamma_facebook && !$gamma_digg && !$gamma_flickr && !$gamma_lastfm && !$gamma_twitter){echo "<li></li>";}?>
			</ul>
		</div>
		
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>" >
			<input class="unitx3" type="text" value="search" onfocus="this.value=''" onblur="this.value='search'" name="s" id="s" />
			<input type="hidden" id="searchsubmit" value="Search" />
		</form>
		
	</div>
</div>
</div>

<?php if (!is_search()) { ?>
<div class="navigation">
		<p>
			<span class="prev"><?php previous_post_link('%link', '&larr; PREV'); ?></span>
			<span class="next"><?php next_post_link('%link', 'NEXT &rarr;'); ?></span>
			
			<span class="prev"><?php next_posts_link('&larr; PREV') ?></span>
			<span class="next"><?php previous_posts_link('NEXT &rarr;'); ?></span>
		</p>
</div>
<? } ?>

<div class="top"></div>