<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<?php
	global $options;
	foreach ($options as $value) {
	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
	}
	if ($gamma_analytics){
		echo "<script type=\"text/javascript\">
		var gaJsHost = ((\"https:\" == document.location.protocol) ? \"https://ssl.\" : \"http://www.\");
		document.write(unescape(\"%3Cscript src='\" + gaJsHost + \"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E\"));
		</script>
		<script type=\"text/javascript\">
		try {
		var pageTracker = _gat._getTracker(\"".$gamma_analytics."\");
		pageTracker._trackPageview();
		} catch(err) {}</script>";
	}
?>
</body>
</html>
