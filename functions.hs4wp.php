<?php

/**
 * function hs4wp_prepare_header
 * Add neccesary includes / CSS to WP Header
 * @version 1.1
 * @author Marco 'solariz' Goetze
 * @return bool
 */
function hs4wp_prepare_header() {
    GLOBAL $hs4wp_plugin_uri,$hs4wp_ver_hs,$hs4wp_ver_plugin;
    $custom_css = get_option('hs4wp_custom_css');
    $hs_css_uri = (strlen($custom_css)>=5)?$custom_css."?ver=".$hs4wp_ver_hs."v".$hs4wp_ver_plugin:$hs4wp_plugin_uri."highslide.css?ver=".$hs4wp_ver_hs."v".$hs4wp_ver_plugin;
    $coralize= get_option('hs4wp_coralize');
    if($coralize != "" && $coralize != false) {
        $hs_css_uri = hs4wp_coralize_uri($hs_css_uri);
    }
    $OUT = '<link rel="stylesheet" href="'.$hs_css_uri.'" type="text/css" media="screen" />'."\n";
    $OUT .= "<!--[if lt IE 7]>\n";
    $OUT .= '<link rel="stylesheet" type="text/css" href="'.$hs4wp_plugin_uri.'highslide-ie6.css" />'."\n";
    $OUT .= "<![endif]-->\n";
    echo $OUT;
}//EoFu: hs4wp_prepare_header

/**
 * function hs4wp_prepare_footer
 * Add neccesary JS to footer
 * @version 1.01
 * @author Marco 'solariz' Goetze
 * @return bool
 */
function hs4wp_prepare_footer() {
    GLOBAL $hs4wp_plugin_uri,$hs4wp_ver_hs,$hs4wp_ver_plugin,$hs4wp_img_count;
    $coralize= get_option('hs4wp_coralize');
    $hs_script_uri = $hs4wp_plugin_uri."hs-custom-min.js?ver=".$hs4wp_ver_hs."v".$hs4wp_ver_plugin;
    $hs_graphics_uri = $hs4wp_plugin_uri."graphics/";
    if($coralize != "" && $coralize != false) {
        $hs_script_uri      = hs4wp_coralize_uri($hs_script_uri);
        $hs_graphics_uri    = hs4wp_coralize_uri($hs_graphics_uri);
    } else {
        $hs_graphics_uri = str_ireplace("http://".$_SERVER['HTTP_HOST'],"",$hs_graphics_uri);
        $hs_script_uri   = str_ireplace("http://".$_SERVER['HTTP_HOST'],"",$hs_script_uri);
    }
    $OUT = "<!-- HighSlide4Wordpress Footer JS Includes -->\n";
    $OUT .= '<script type="text/javascript" src="'.$hs_script_uri.'"></script>';
    $OUT .= '<script type="text/javascript">'."\n";
    $OUT .= "hs.graphicsDir = '".$hs_graphics_uri."';\n";
    $OUT .= (get_option('hs4wp_credits')!="on")?"hs.showCredits = true;\n":"hs.showCredits = false;\n";
    $OUT .= (get_option('hs4wp_fadeinout')=="on")?"hs.fadeInOut = true;\nhs.transitions = ['expand', 'crossfade'];\n":"hs.fadeInOut = false;\n";
    $OUT .= (get_option('hs4wp_align_center')=="on")?"hs.align = 'center';\n":"";
    $OUT .= "hs.padToMinWidth = true;\n";

    // Caption Mode
    switch(get_option('hs4wp_hs_caption')) {
        CASE 1:
            $OUT .= "hs.captionEval = 'this.thumb.title';\n";
            break;
        CASE 2:
            $OUT .= "hs.captionEval = 'this.thumb.alt';\n";
            break;
        CASE 3:
            $OUT .= "hs.captionEval = 'this.a.title';\n";
            break;
        DEFAULT:
            break;
    }//end switch
    // Style Definitions
    switch(get_option('hs4wp_hs_appearance')) {
        CASE 1:
            $OUT .= "hs.outlineType = 'rounded-white';\n";
            #$OUT .= "hs.wrapperClassName = 'draggable-header';\n";
            break;
        CASE 2:
            $OUT .= "hs.wrapperClassName = 'wide-border';\n";
            break;
        CASE 3:
            $OUT .= "hs.wrapperClassName = 'borderless';\n";
            break;
        CASE 4:
            $OUT .= "hs.outlineType = 'outer-glow';\n";
            $OUT .= "hs.wrapperClassName = 'outer-glow';\n";
            break;
        CASE 5:
            $OUT .= "hs.outlineType = null;\n";
            break;
        CASE 6:
            $OUT .= "hs.outlineType = 'glossy-dark';\n";
            $OUT .= "hs.wrapperClassName = 'dark';\n";
            break;
        CASE 7:
            $OUT .= "hs.wrapperClassName = 'dark borderless floating-caption';\n";
            break;
        CASE 99:
            break;
        DEFAULT:
            $OUT .= "hs.outlineType = 'rounded-white';\n";
            break;
    }//end switch
    switch(get_option('hs4wp_hs_dimming')) {
        CASE 1:
            //$OUT .= "hs.dimmingOpacity = 0;\n";
            break;
        CASE 2:
            $OUT .= "hs.dimmingOpacity = 0.1;\n";
            break;
        CASE 3:
            $OUT .= "hs.dimmingOpacity = 0.2;\n";
            break;
        CASE 4:
            $OUT .= "hs.dimmingOpacity = 0.3;\n";
            break;
        CASE 5:
            $OUT .= "hs.dimmingOpacity = 0.4;\n";
            break;
        CASE 6:
            $OUT .= "hs.dimmingOpacity = 0.5;\n";
            break;
        CASE 7:
            $OUT .= "hs.dimmingOpacity = 0.6;\n";
            break;
        CASE 8:
            $OUT .= "hs.dimmingOpacity = 0.7;\n";
            break;
        CASE 9:
            $OUT .= "hs.dimmingOpacity = 0.8;\n";
            break;
        CASE 10:
            $OUT .= "hs.dimmingOpacity = 0.9;\n";
            break;
        CASE 11:
            $OUT .= "hs.dimmingOpacity = 1;\n";
            break;
        DEFAULT:
            break;
    }
    // Advanced Section
      $OUT .= get_option('hs4wp_advanced');
	// Add the controlbar
    if($hs4wp_img_count > 1) {
      $OUT .= "if (hs.addSlideshow) hs.addSlideshow({\n";
      $interval = intval(get_option('hs4wp_slideshow_delay')*1000);
      if($interval < 1000) $interval = 5000;
      $OUT .= "\tinterval: ".$interval.",\n";
      $OUT .= "\trepeat: false,\n";
      $OUT .= "\tuseControls: true,\n";
      $OUT .= "\tfixedControls: 'fit',\n";
      $OUT .= "\toverlayOptions: {\n";
      $OUT .= "\t\topacity: .6,\n";
      $OUT .= "\t\tposition: 'bottom center',\n";
      $OUT .= "\t\thideOnMouseOut: true\n";
      $OUT .= "\t}\n";
      $OUT .= "});\n";
    }
    $OUT .= "</script>\n";
    echo $OUT;
}//EoFu: hs4wp_prepare_footer


/**
 * function hs4wp_add_to_footer
 * Add HTML Expander DIV`s to footer
 * @version 1.0
 * @author Marco 'solariz' Goetze
 * @return bool
 */
function hs4wp_add_to_footer() {
    GLOBAL $hs4wp_insert_into_footer;
    if(isset($hs4wp_insert_into_footer) == false OR $hs4wp_insert_into_footer == "") {
        return false;
    } else {
        $OUT = "<!-- HighSlide4Wordpress Footer HTML Expander DIVs -->\n";
        $OUT .= $hs4wp_insert_into_footer;
        $OUT .= "\n";
        echo $OUT;
        return true;
    }
}


/**
 * function hs4wp_config_page
 * Add & Manage config pages in WP Admin
 * @version 1.0
 * @author Marco 'solariz' Goetze
 * @return bool
 */
function hs4wp_config_page() {
    GLOBAL $hs4wp_plugin_path;
    require_once($hs4wp_plugin_path.'options.hs4wp.php');
    return add_options_page('highslide 4 Wordpress *reloaded* Settings', 'Highslide 4 Wordpress', 8, __FILE__, 'hs4wp_options_page');
}

/**
 * function hs4wp_coralize_uri
 * rewrites a input URL to use Coral CDN service
 * @version 1.0
 * @param string URL
 * @author Marco 'solariz' Goetze
 * @return string
 */
function hs4wp_coralize_uri($uri) {
    if(stristr($uri,"http://") == false) return $uri;
    $tmp = explode("/",$uri,4);
    $cor = $tmp[0].'/'.$tmp[1].'/'.$tmp[2].'.nyud.net/'.$tmp[3];
    return $cor;
}

/**
 * function hs4wp_auto_set
 * Add auto Filter to Content. Searching for href images and [highlside] tags
 * @version 1.0
 * @param string $content
 * @author Marco 'solariz' Goetze
 * @return string
 */
function hs4wp_auto_set($content) {
	global $post,$hs4wp_load_hs;
    // Add HS to Images.
	$content = preg_replace_callback('/<a ([^>]+)>/i', 'hs4wp_callback_img', $content);
    // Add HS to HTML Tags if present
    if(strstr($content,"[highslide]") AND strstr($content,"[/highslide]")) {
       $content = preg_replace_callback('#\[highslide]((?:[^\[]|\[(?!/?highslide])|(?R))+)\[/highslide]#', 'hs4wp_callback_htm', $content);
    }
    return $content;
}

/**
 * function hs4wp_callback_htm
 * Callback Function of hs4wp_auto_set
 * @version 1.04
 * @see hs4wp_auto_set
 * @param string preg
 * @author Marco 'solariz' Goetze
 * @return string
 */
function hs4wp_callback_htm($a) {
    global $post,$hs4wp_plugin_uri,$hs4wp_insert_into_footer;
    $str = trim($a[1]);
    $contentID = $post->ID.md5($str);
    // get options
    $options  = preg_match('#\((.*)\)#',$str,$reg)?explode(";",$reg[1],4):false;
    if(isset($options[0])&&isset($options[1])) {
        $subject  = $options[0];
        $linkName = $options[1];
    } else {
        $subject  = false;
        $linkName = false;
    }
    $width    = intval($options[2]);
    $height   = intval($options[3]);
    if($width > 1 && $height > 1)
        $style = ' align="left" style="width:'.$width.'px;height:'.$height.'px;"';
    else
        $style = ' align="left"';
    $OUT = (get_option('hs4wp_ptag_workaround') == 'on')?'</p>':'';
    $OUT .= '<a class="highslide" onclick="return hs.htmlExpand(this, {wrapperClassName: \'draggable-header\',contentId: \'highslide-html_'.$contentID.'\'';
    $img = (get_option('hs4wp_ext_icon') == 'on')?'<img src="'.$hs4wp_plugin_uri.'img/ext.png" width="11" height="9" border="0" alt="" style="border:none;">':'';
    if($subject != false) {
      $OUT .= ",headingText:'".htmlentities($subject,ENT_QUOTES,'UTF-8')."'";
      $OUT .= '} )" href="#">'.$img." ".htmlentities($linkName,ENT_QUOTES,'UTF-8').'</a>';
      $str = str_replace($reg[0],"",$str);
    } else {
      $OUT .= '} )" href="#">'.$img.' info</a>';
    }
//    $OUT .= "\n";
    // opener

    $hs4wp_insert_into_footer .= '<div id="highslide-html_'.$contentID.'" class="highslide-html-content"'.$style.'>';
    // HTML Box Header
	$hs4wp_insert_into_footer .= '<div class="highslide-header">
                <ul>
                    <li class="highslide-move"><a href="#" onclick="return false">&nbsp;</a></li>
                    <li class="highslide-close"><a href="#" onclick="return hs.close(this)">&nbsp;</a></li>
                </ul>
             </div>';

    // Flash handler
    if(get_option('hs4wp_handle_swf') == 'on') {
      $extension = strtolower(substr($str,strlen($str)-4));
      if($extension == ".swf") {
          if($width  < 100) $width  = "500";
          if($height < 100) $height = "370";
          // Flash size reduce by x percent
          $F_Width  = $width;
          $F_Height = floor($height/100*88);
          $swf = $str;
          $str = "";
          $str .= '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="swf_'.$contentID.'" width="'.$F_Width.'" height="'.$F_Height.'">'."\n";
          $str .= '<param name="movie" value="'.$swf.'" />'."\n";
          $str .= '<param name="wmode" value="opaque" />'."\n";
          $str .= '<!--[if !IE]>-->'."\n";
          $str .= '<object type="application/x-shockwave-flash" data="'.$swf.'" width="'.$F_Width.'" height="'.$F_Height.'" wmode="opaque">'."\n";
          $str .= '<!--<![endif]-->'."\n";
          $str .= 'Flash plugin is required to view this object.'."\n";
          $str .= '<!--[if !IE]>-->'."\n";
          $str .= '</object>'."\n";
          $str .= '<!--<![endif]-->'."\n";
          $str .= '</object> '."\n";
      }
    }

    // HTML Box Body
    $hs4wp_insert_into_footer .= '<div class="highslide-body">'.$str.'</div>';
    // HTML Box Footer
    $hs4wp_insert_into_footer .= '<div class="highslide-footer"><div><span class="highslide-resize" title="Resize">&nbsp;</span></div></div>';
    // closer
    $hs4wp_insert_into_footer .= '</div>';
    $hs4wp_insert_into_footer .= "\n";
    return $OUT;

//    return htmlentities($OUT);
}

/**
 * function hs4wp_callback_img
 * Callback Function of hs4wp_auto_set
 * @version 1.01
 * @see hs4wp_auto_set
 * @param string preg
 * @author Marco 'solariz' Goetze
 * @return string
 */
function hs4wp_callback_img($a) {
	global $post,$hs4wp_img_count;
	$str = $a[1];
    // Standard replace for linked images
	if ( preg_match('/href=[\'"][^"\']+\.(?:gif|jpe|jpg|jpeg|png)/i', $str) ) {
	    if(stripos($str,"highslide") == false && stripos($str,"onclick") == false && is_attachment() == false) {
            ++$hs4wp_img_count;
		    if ( false !== strpos(strtolower($str), 'class=') )
			    return '<a ' . preg_replace('/(class=[\'"])/i', '$1highslide', $str) . ' onclick="return hs.expand(this)">';
		    else
    			return '<a class="highslide img_'.$hs4wp_img_count.'" ' . $str . ' onclick="return hs.expand(this)">';
        }
	}
    return $a[0];
}

/**
 * function hs4wp_auto_set_attachmentURL
 * Function containing STRING to add on found href img
 * @version 1.01
 * @param string $url
 * @author Marco 'solariz' Goetze
 * @return string
 */
function hs4wp_auto_set_attachmentURL($url) {
    // chek if URL already contain highslide parts
    if(stripos($url,"highslide") == false && stripos($url,"onclick") == false && is_attachment() == true) {
        $url = $url."\" class=\"highslide\" onclick=\"return hs.expand(this)";
    }
    return $url;
}

/**
 * function hs4wp_selector
 * Function to fill <select> with <option>'s
 * @version 1.0
 * @param array $array
 * @param bool $selected
 * @author Marco 'solariz' Goetze
 * @return string
 */
function hs4wp_selector($array,$selected=false) {
    $OUT = '';
    foreach($array as $k=>$v) {
        $s=($k==$selected&&$selected!=false)?' selected ':'';
        $OUT .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>';
    }
    return $OUT;
}//EoFu:hs4wp_selector




function hs4wp_admin_init()
{
    GLOBAL $hs4wp_plugin_uri;
    $hs4wpOptionsCSS = $hs4wp_plugin_uri."/options.css";
    if (is_ssl()) $hs4wpOptionsCSS = preg_replace( '/^http:\/\//', 'https://',  $hs4wpOptionsCSS );
    wp_register_style('hs4wpOptionsCSS', $hs4wpOptionsCSS);
    wp_enqueue_style( 'hs4wpOptionsCSS');
}

function hs4wp_add_media_button()
{
  	GLOBAL $hs4wp_plugin_uri;
	$url = $hs4wp_plugin_uri.'media-button-expander.php?tab=add&TB_iframe=true&amp;height=300&amp;width=640';
	if (is_ssl()) $url = preg_replace( '/^http:\/\//', 'https://',  $url );
	echo '<a href="'.$url.'" class="thickbox" title="'.__('Add Highslide HTML Expander','highslide-4-wordpress').'"><img src="'.$hs4wp_plugin_uri.'/img/media-button-expander.png" alt="'.__('Add Highslide HTML Expander','highslide-4-wordpress').'"></a>';
}



