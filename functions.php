<?php
/**
* @package WordPress
* @subpackage Default_Theme
*/

function custom_more_link($content){
	
	global $options;
	foreach ($options as $value) {
	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
	}
	
	$pattern='</div></div></div><div class="top"></div><div id="respond"><div class="wrapper unitx7"><h2>'.stripslashes($gamma_morelink).' <a href="%permalink%%anchor%" class="%class%">&rarr;</a></h2>';
     
	$search_pattern='=<a href\="(.*)(#more-[\d]+)" class\="([a-zA-Z\-\ ]+)">(.*)<\/a>=';

	$matches=array();
	if(FALSE !== preg_match($search_pattern,$content,$matches)){
		$url = $matches[1];
		$anchor=$matches[2];
		$class=$matches[3];
		$linktext=$matches[4];

		$pattern=str_replace(
			array('%permalink%','%anchor%','%class%','%linktext%'),
			array($matches[1],$matches[2],$matches[3],$matches[4]),
			$pattern);

		$content=preg_replace($search_pattern,$pattern,$content);

		return($content);
	}else{
		return($content);
	}
}

$shortname = "gamma";

$options = array (

	array(	"name" => "<strong>General Settings</strong> | Universal settings that affect all areas of the site.",
	"id" => $shortname."_general",
	"type" => "title"),

	array(	"id" => "open"),
	
	array(	"name" => "Site Logo",
	"desc" => "Optional logo image (267 x 143px).",
	"id" => $shortname."_logo",
	"std" => get_bloginfo('template_url')."/images/logo.png",
	"type" => "text"),
	
	array(	"name" => "404 Image",
	"desc" => "Feature image for 404 pages.",
	"id" => $shortname."_404",
	"std" => get_bloginfo('template_url')."/images/404.jpg",
	"type" => "text"),
	
	array(	"name" => "Search Image",
	"desc" => "Feature image for search pages.",
	"id" => $shortname."_search",
	"std" => get_bloginfo('template_url')."/images/404.jpg",
	"type" => "text"),
	
	array(	"name" => "Missing Image",
	"desc" => "Feature image for posts with no image.",
	"id" => $shortname."_missing",
	"std" => get_bloginfo('template_url')."/images/404.jpg",
	"type" => "text"),

	array(	"name" => "More-Link Text",
	"desc" => "Text substituted for <!--more--> and displayed at the bottom of the homepage.",
	"id" => $shortname."_morelink",
	"std" => "Oh no! Where'd the rest go?<br />Luckily I always keep a copy...",
	"type" => "text"),
	
	array(	"name" => "Google Analytics ID",
	"desc" => "Optional Google Analytics Tracking ID",
	"id" => $shortname."_analytics",
	"std" => "",
	"type" => "text"),

	array(	"id" => "close"),
	
	array(	"name" => "<strong>Author Settings</strong> | Author customizations for social media and avatars.",
	"id" => $shortname."_author",
	"type" => "title"),

	array(	"id" => "open"),
	
	array(	"name" => "Author Name",
	"desc" => "Author name for header.",
	"id" => $shortname."_name",
	"std" => get_bloginfo('name'),
	"type" => "text"),
	
	array(	"name" => "Avatar",
	"desc" => "Avatar author URL (80 x 80px)",
	"id" => $shortname."_avatar",
	"std" => get_bloginfo('template_url')."/images/avatar.jpg",
	"type" => "text"),
	
	array(	"name" => "Twitter",
	"desc" => "Twitter username.",
	"id" => $shortname."_twitter",
	"std" => "",
	"type" => "text"),
	
	array(	"name" => "Last.fm",
	"desc" => "Last.fm username.",
	"id" => $shortname."_lastfm",
	"std" => "",
	"type" => "text"),
	
	array(	"name" => "Flickr",
	"desc" => "Flickr username.",
	"id" => $shortname."_flickr",
	"std" => "",
	"type" => "text"),
	
	array(	"name" => "Digg",
	"desc" => "Digg username.",
	"id" => $shortname."_digg",
	"std" => "",
	"type" => "text"),
	
	array(	"name" => "Facebook",
	"desc" => "Facebook username.",
	"id" => $shortname."_facebook",
	"std" => "",
	"type" => "text"),
	
	array(	"name" => "Qik",
	"desc" => "Qik username.",
	"id" => $shortname."_qik",
	"std" => "",
	"type" => "text"),
	
	array(	"name" => "YouTube",
	"desc" => "YouTube username.",
	"id" => $shortname."_youtube",
	"std" => "",
	"type" => "text"),
	
	array(	"name" => "Roboto",
	"desc" => "robo.to username.",
	"id" => $shortname."_roboto",
	"std" => "",
	"type" => "text"),

	array(	"id" => "close")

	);

function mytheme_add_admin() {

	global $shortname, $options;

	if ( $_GET['page'] == basename(__FILE__) ) {

		if ( 'save' == $_REQUEST['action'] ) {

			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] );
			}

			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
			}

			header("Location: themes.php?page=functions.php&saved=true");
			die;

			} else if( 'reset' == $_REQUEST['action'] ) {

				foreach ($options as $value) {
					delete_option( $value['id'] );
				}

				header("Location: themes.php?page=functions.php&reset=true");
				die;

			}
		}
		add_theme_page("Gamma Options", ""."Gamma Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
	}

	function mytheme_admin() {

		global $shortname, $options;

		if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Gamma settings saved.</strong></p></div>';
		if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Gamma settings reset.</strong></p></div>';

		?>
		<div class="wrap">
			<div id="icon-themes" class="icon32"><br /></div>
			<h2>Gamma</h2>

			<form method="post" action="">

				<?php foreach ($options as $value) { 

					switch ( $value['id'] ) {

						case "open":
						?>

					<?php break;
				case $shortname."_general":
				?>
				<div class="bm_fieldset" style="clear:both;">
				<p><?php echo $value['name']; ?></p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform form-table">
					
					<?php break;
				case $shortname."_author":
				?>
				<div class="bm_fieldset" style="clear:both;">
				<p><?php echo $value['name']; ?></p>
				<table width="100%" cellspacing="2" cellpadding="5" class="editform form-table">
					
					<?php break;
					case $shortname."_name":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_avatar":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_twitter":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_lastfm":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_flickr":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_digg":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_facebook":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_qik":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_youtube":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_roboto":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_logo":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_404":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_search":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
					
					<?php break;
					case $shortname."_missing":
					?>

					<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
					<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>

				<?php break;
				case $shortname."_morelink":
				?>

				<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
				<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_settings( $value['id'] ), ENT_QUOTES)); } else { echo $value['std']; } ?>" /></td>
				<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
				
				<?php break;
				case $shortname."_analytics":
				?>

				<tr valign="top"><th width="33%" scope="row"><?php echo $value['name']; ?>:</th><td>
				<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
				<td class="bm_tdsmall"><p style="color:#999; margin:0; font-size:11px;"><?php echo $value['desc']; ?></p></td></tr>
				
					<?php break;
				case "close":
				?>
				
				</table>
				</div>
					<p class="submit" style="float:left; clear:both;">
						<input name="save" type="submit" class="button-primary" value="Save Settings" />    
						<input type="hidden" name="action" value="save" />
					</p>
				
				
				<?php break;
			} 
		}

		?>
		
		</form>
		<form method="post" action="" style="float:left; clear:right; margin-left:20px">
			<p class="submit">
				<input name="reset" type="submit" class="button" value="Reset" />
				<input type="hidden" name="action" value="reset" />
			</p>
		</form>
</div>

<?php
}

function admincss() {
?>
<style type="text/css">
	.bm_fieldset {
		margin-top:20px;
		border:1px solid #e1e1e1;
		-moz-border-radius-topleft:6px;
		-moz-border-radius-topright:6px;		
		background:#f1f1f1;
	}
	.bm_fieldset p {
		padding:15px 10px;
		font-size:13px;
		margin:0;
		clear:both;
		font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;
		color:#333;
	}
	.bm_fieldset .form-table {
		border-top:1px solid #e1e1e1;
		margin:0;
	}
	.bm_fieldset .form-table tr {
		background:#fff;
		border-bottom:1px solid #f1f1f1;
	}	
	.bm_fieldset .form-table td, .bm_fieldset .form-table th {
		border-bottom-width:2px;
		padding:15px 10px;
		font-size:11px;
	}
	.bm_fieldset .form-table p {
		background:transparent;
		padding:0;
	}
	.bm_fieldset .imageSelect {
		padding:10px;
		background:#fff;
		border:1px solid #C6D9E9;
		width:100px;
		float:left;
		margin:0 10px 0 0;
	}
	.bm_fieldset .imageSelect:hover {
		border:1px solid #;
	}
	
	.bm_fieldset .bm_tdsmall {
		width:250px;
	}
</style>

<?php
if ( function_exists('register_sidebar') )
?>

<?php
}

add_action('admin_menu', 'mytheme_add_admin');
add_action('admin_head', 'admincss'); ?>