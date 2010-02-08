<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
    <?php if(!is_single()) : ?>
    <div class="top"></div>
    <div id="footer">
        <div class="wrapper unitx7">
        <h2 class="read-more">Read More <a href="<?php the_permalink() ?>#more-<?php the_id() ?>" class="more-link">&rarr;</a></h2>
        <h2 class="comments"><a href="<?php the_permalink() ?>#comments" class="more-link">#</a> Comments</h2>
    <?php endif; ?>
        </div>
    </div>
    <div class="bottom"></div>
    <div class="content">
        <div class="wrapper unitx7">
            <div class="license">
            <p><strong>Niamu</strong> 2010 - <a href="mailto:brendonwalsh@niamu.com">Brendon Walsh</a></p>
            <p>All content (posts, comments or otherwise) is dedicated to the <a href="http://creativecommons.org/licenses/publicdomain/">public domain</a> except where previous licenses exist.</p>
            </div>
            <div class="attribution">
            <p><strong>Attribution</strong></p>
            <ul>
                <li>Rogie King (<a href="http://www.komodomedia.com/blog/2009/06/social-network-icon-pack/">Social Media Icons</a>)</li>
                <li>John Ott (<a href="http://www.flickr.com/photos/thousandshipz/3086320386/in/set-72157610791455238/">Torn Paper</a>)</li>
            </ul>
            </div>
        </div>
    </div>
    <?php 
	$video = get_post_meta(get_the_ID(),'Video', true);
	if($video=="true"){
	    echo "<div style='display:none'>";
		echo '<script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
        	google.load("jquery", "1");
        </script>
        <script src="http://cloud.niamu.com/js/modernizr-1.1.min.js"></script>
        <script>
        	$(document).ready(function(){

        		$("img.swap-video").click(function(event){
        			if (Modernizr.video) {
        				var codecs = {\'ogv\':\'video/ogg\', \'mp4\':\'video/mp4\'};
        				var codecs = {\'mp4\':\'video/mp4\', \'ogv\':\'video/ogg\'};
        				var a, c, p, s = \'\';

        				a = \'autoplay\';
        				if ($(this).is(\'.controls\')) a += \' controls\';
        				if ($(this).is(\'.autobuffer\')) a += \' autobuffer\';
        				a += \' poster="\' + $(this).attr(\'src\') + \'"\';
        				a += \' width="\' + $(this).attr(\'width\') + \'"\';
        				a += \' height="\' + $(this).attr(\'height\') + \'"\';
        				p = $(this).attr(\'src\').substr(0, $(this).attr(\'src\').lastIndexOf(\'.\')+1);
        				s = \'\';
        				for (c in codecs) {
        					s += \'<source src="\' + p + c + \'" type="\' + codecs[c] + \'"\';
        				}
        				$(this).replaceWith(\'<video \' + a + \'>\' + s + \'</video>\');
        			} else {
        				alert("Alas, you need a web browser that supports HTML5 to play this video, like, say, Safari, Chrome, or Firefox.");
        			}
        		});
        	});
        </script>';
        echo "</div>";
	}
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
