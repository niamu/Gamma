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

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header">
<div class="wrapper unitx7">
	<div id="logo">
		<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	</div>
	<div id="author">
		<img src="<?php bloginfo('template_directory'); ?>/images/avatar.jpg" class="avatar" alt="Brendon Walsh" />
		<strong>Brendon Walsh</strong>
		<div class="social">
			<ul>
				<li><a href="http://twitter.com/niamu"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Twitter" /></a></li>
				<li><a href="http://last.fm/user/niamu"><img src="<?php bloginfo('template_directory'); ?>/images/lastfm.png" alt="Last.fm" /></a></li>
				<li><a href="http://www.flickr.com/photos/niamu/"><img src="<?php bloginfo('template_directory'); ?>/images/flickr.png" alt="Flickr" /></a></li>
				<li><a href="http://digg.com/users/niamu"><img src="<?php bloginfo('template_directory'); ?>/images/digg.png" alt="Digg" /></a></li>
				<li><a href="http://facebook.com/niamu"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Facebook" /></a></li>
				<li><a href="http://qik.com/niamu"><img src="<?php bloginfo('template_directory'); ?>/images/qik.png" alt="Qik" /></a></li>
				<li><a href="http://youtube.com/user/reveri"><img src="<?php bloginfo('template_directory'); ?>/images/youtube.png" alt="Youtube" /></a></li>
				<li><a href="http://robo.to/niamu"><img src="<?php bloginfo('template_directory'); ?>/images/roboto.png" alt="Roboto" /></a></li>
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