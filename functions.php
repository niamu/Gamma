<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

function custom_more_link($content){
    // get the customized link pattern
    $pattern='</p></div></div></div><div class="top"></div><div id="respond"><div class="wrapper unitx7"><h2>Oh no! Where\'d the rest go? <br />Luckily I always make a copy... <a href="%permalink%%anchor%" class="%class%">&rarr;</a></h2><p>';
    
    // search pattern for old wp generated more link structure        
    $search_pattern='=<a href\="(.*)(#more-[\d]+)" class\="([a-zA-Z\-\ ]+)">(.*)<\/a>=';
    
    // search old more link and get the important parts
    $matches=array();
    if(FALSE !== preg_match($search_pattern,$content,$matches)){
        $url = $matches[1];
        $anchor=$matches[2];
        $class=$matches[3];
        $linktext=$matches[4];
        
        // replace tags in new-morelink-pattern with found parts if neccessary
        $pattern=str_replace(
            array('%permalink%','%anchor%','%class%','%linktext%'),
            array($matches[1],$matches[2],$matches[3],$matches[4]),
            $pattern);
            
        // replace old more link with new link pattern    
        $content=preg_replace($search_pattern,$pattern,$content);
        
        // done
        return($content);
    }else{
        // no more-link found, do nothing and return $content
        return($content);
    }
}

?>