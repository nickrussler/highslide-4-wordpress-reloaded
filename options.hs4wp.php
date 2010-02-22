<?php


// Options Page
function hs4wp_options_page()
{
    GLOBAL $hs4wp_plugin_uri,$hs4wp_plugin_path;

    // If form was submitted
	if (isset($_POST['submitted']))
	{
	        // Save Settings
            $lic_agreement      =(!isset($_POST['lic_agreement'])? '': $_POST['lic_agreement']);
			$coralize           =(!isset($_POST['coralize'])? '': $_POST['coralize']);
   			$credits            =(!isset($_POST['credits'])? '': $_POST['credits']);
            $fadeinout          =(!isset($_POST['fadeinout'])? '': $_POST['fadeinout']);
            $attachment_filter  =(!isset($_POST['attachment_filter'])? '': $_POST['attachment_filter']);
            $only_use_header    =(!isset($_POST['only_use_header'])? '': $_POST['only_use_header']);
            $align_center       =(!isset($_POST['align_center'])? '': $_POST['align_center']);
            $ext_icon           =(!isset($_POST['ext_icon'])? '': $_POST['ext_icon']);
            $ptag_workaround    =(!isset($_POST['ptag_workaround'])? '': $_POST['ptag_workaround']);

            $input1             =(!isset($_POST['input1'])? 5: intval($_POST['input1']));
            $input2             =(!isset($_POST['input2'])? '': $_POST['input2']);
            $select1            =(!isset($_POST['select1'])? '': intval($_POST['select1']));
            $select2            =(!isset($_POST['select2'])? '': intval($_POST['select2']));
            $select3            =(!isset($_POST['select3'])? '': intval($_POST['select3']));
            $textarea1          =(!isset($_POST['textarea1'])? '': stripslashes($_POST['textarea1']));
            // Check boxes
            update_option('hs4wp_lic_agreement', $lic_agreement);
			update_option('hs4wp_coralize', $coralize);
			update_option('hs4wp_credits', $credits);
			update_option('hs4wp_fadeinout', $fadeinout);
            update_option('hs4wp_attachment_filter', $attachment_filter);
            update_option('hs4wp_only_use_header', $only_use_header);
            update_option('hs4wp_align_center', $align_center);
            update_option('hs4wp_ext_icon', $ext_icon);
            update_option('hs4wp_ptag_workaround', $ptag_workaround);

            // Input
            update_option('hs4wp_slideshow_delay', $input1);
            update_option('hs4wp_custom_css', $input2);

            // Selects
            update_option('hs4wp_hs_appearance', $select1);
            update_option('hs4wp_hs_dimming', $select2);
            update_option('hs4wp_hs_caption', $select3);
            update_option('hs4wp_advanced', $textarea1);

			$msg_status = 'Options saved.';
		    // Show message
		   _e('<div id="message" class="updated fade"><p>' . $msg_status . '</p></div>');
	}
    // Get current setup from DB
//        $coralize = get_option('hs4wp_coralize');
        $lic_agreement      =( get_option('hs4wp_lic_agreement')=='on' ) ? "checked":"";
        $coralize           =( get_option('hs4wp_coralize')=='on' ) ? "checked":"";
        $credits            =( get_option('hs4wp_credits')=='on' ) ? "checked":"";
        $fadeinout          =( get_option('hs4wp_fadeinout')=='on' ) ? "checked":"";
        $attachment_filter  =( get_option('hs4wp_attachment_filter')=='on' ) ? "checked":"";
        $only_use_header    =( get_option('hs4wp_only_use_header')=='on' ) ? "checked":"";
        $align_center       =( get_option('hs4wp_align_center')=='on' ) ? "checked":"";
        $ext_icon           =( get_option('hs4wp_ext_icon')=='on' ) ? "checked":"";
        $ptag_workaround    =( get_option('hs4wp_ptag_workaround')=='on' ) ? "checked":"";

        $slideshow_delay    =  get_option('hs4wp_slideshow_delay');
        $custom_css         =  get_option('hs4wp_custom_css');
        $textarea1          =  get_option('hs4wp_advanced');
    // Defaults
        if(!$slideshow_delay) $slideshow_delay = 5;

    // Configuration Page
        $imgpath = $hs4wp_plugin_uri."img/";
        // License red
        if($lic_agreement != "checked") $lic_style="color:red;";


        $hs4wp_select1 = hs4wp_selector(array(
        1=>"Highslide rounded-white",
        2=>"Polaroid Outline + Shadow",
        3=>"Borderless",
        4=>"Dark Outer-Glow",
        5=>"Plain and Simple",
        6=>"Dark and Glossy",
        7=>"Dark borderless, floating-caption",
        99=>"Use own definition in Advanced Section"
        ),get_option('hs4wp_hs_appearance'));

        $hs4wp_select2 = hs4wp_selector(array(
        1=>"0% , No Dimming",
        2=>"10%",
        3=>"20%",
        4=>"30%",
        5=>"40%",
        6=>"50%",
        7=>"60%",
        8=>"70%",
        9=>"80%",
        10=>"90%",
        11=>"100%, full black"
        ),get_option('hs4wp_hs_dimming'));

        $hs4wp_select3 = hs4wp_selector(array(
        1=>"Thumbnail Title",
        2=>"Thumbnail Alt",
        3=>"Link Title"
        ),get_option('hs4wp_hs_caption'));

        echo <<<END
        <div class="wrap" style="max-width:900px !important;">
        	<h2>Highslide 4 Wordpress</h2>
        	<div id="poststuff" style="margin-top:10px;">
            	<div id="sideblock" style="float:right;width:220px;">
        		 <h2>Information</h2>
            		 <div id="dbx-content" style="text-decoration:none;border-left:1px solid silver;padding-left:10px;">
            		  <img src="$imgpath/web.png"><a href="http://solariz.de/highslide4wordpress/" target="_blank" style="text-decoration:none;"> Plugin Homepage</a><br /><br />
                      <img src="$imgpath/help.png"><a href="http://solariz.de" target="_blank" style="text-decoration:none;"> Plugin Manual</a><br /><br />
                      <img src="$imgpath/forum.png"><a href="http://solariz.de/forum?wpforumaction=viewforum&f=6.0" target="_blank" style="text-decoration:none;"> Plugin Forum</a><br /><br />
                      <img src="$imgpath/donate.png"><a href="http://solariz.de/donate" target="_blank" style="text-decoration:none;"> Donate</a><br /><br />
			          <img src="$imgpath/star.png"><a href="http://wordpress.org/extend/plugins/highslide-4-wordpress-reloaded/" target="_blank" style="text-decoration:none;"> Rate this plugin</a><br /><br />
                     </div>
             	</div>
                <div id="mainblock" style="max-width:650px">
                    <div class="dbx-content">
		 	            <form name="sfiform" action="$action_url" method="post">
        					<input type="hidden" name="submitted" value="1" />
           				    <h2>About</h2>
                            <p>This Plugin automatically insert Highslide Script to your Blog without the need of any further configuration or Shorttags or editing of old posts. As soon the Plugin is activated all existing thumped images using Highslide to expand. But this isn`t all, the Plugin offers several Options to configure the look and behaviour of Highslide in your Blog. For Advanced users there is also the option to specify own HS Parameters at the Option page.</p>
                            <h2>License</h2>
                            <p><img src="$imgpath/somerights20.png" align=right>This Plugin contains major parts of "Highslide JS" by Torstein Honsi and is licensed under a <a href="http://creativecommons.org/licenses/by-nc/2.5/" target="_blank">Creative Commons Attribution-NonCommercial 2.5 License</a>. This means you need the permission of the Plugin Author to use this Plugin on commercial websites. Also you need to obtain a Commercial Highslide License from <a href="http://highslide.com/#licence" target="_blank">highslide.com</a> !</p>
                            <p><b>What is a commercial website?</b><br/>A commercial website is a website which purpose is generating revenue or cash flow of any type, and that isn't under a non-profit organization. So if you're selling a product, selling advertisement, selling a service or just marketing a commercial business, your site is commercial. A company website is also commercial even if it doesn't sell anything, as it's purpose is to front a commercial company.</p>
                            <div>
                                <input id="check0" type="checkbox" name="lic_agreement" $lic_agreement />
                                <label for="check0" style="$lic_style">I Agree to the License Agreement</label>
                            </div>
                            <h2>Like it ?</h2>
                            <div>
                            As the most Plugin writers I spent my sparetime to writing those plugins. I do not demand money for non commecial usage but if you like it you can do me a favour. Please <a href="http://wordpress.org/extend/plugins/highslide-4-wordpress-reloaded/">rate the Plugin</a> at the official wordpress extension archive. If you want to donate something you find a info link on the right.</div>
                            <h2>Options</h2>
                            <div>
                                <input id="check1" type="checkbox" name="coralize" $coralize />
                                <label for="check1">Use Coral CDN as JS/CSS source</label>
                            </div>
                            <div>
                                <input id="check3" type="checkbox" name="fadeinout" $fadeinout />
                                <label for="check3">Enable Fade In/Out transition in Gallerys ?</label>
                            </div>
                            <div>
                                <input id="check2" type="checkbox" name="credits" $credits />
                                <label for="check2">Disable Highslide Credits ?</label>
                            </div>
                            <div>
                                <input id="check4" type="checkbox" name="attachment_filter" $attachment_filter />
                                <label for="check4">Disable  Highslide on Attachment Images ?</label>
                            </div>
                            <div>
                                <input id="check5" type="checkbox" name="align_center" $align_center />
                                <label for="check5">Align expanded images to center ?</label>
                            </div>
                            <div>
                                <input id="check6" type="checkbox" name="ext_icon" $ext_icon />
                                <label for="check6">Add ext. Icon to [highslide]*[/highslide] Links ?</label>
                            </div>

                            <br/>
                            <div>
                                <label for="input1">Slideshow Delay in seconds ?</label>
                                <input id="input1" type="text" size="2" name="input1" value="$slideshow_delay" />
                            </div>
                            <div>
                                <label for="select1">HS Appearance</label>
                                <select id="select1" name="select1">
                                $hs4wp_select1
                                </select>
                            </div>
                            <div>
                                <label for="select2">Background dimming opacity</label>
                                <select id="select2" name="select2">
                                $hs4wp_select2
                                </select>
                            </div>
                            <div>
                                <label for="select3">Caption Source</label>
                                <select id="select3" name="select3">
                                $hs4wp_select3
                                </select>
                            </div>
                            <h2>Advanced Options</h2>
                            In this Textbox you can enter Advanced Highslide-JS Parameter / Definitions. e.g.
                            <b>hs.dimmingDuration = 600;</b> for Smooth Background Dimming. You can find a List of all possible custom Paramteres
                            <a href="http://highslide.com/ref/" target="_blank">here</a>. Each line one Statement.<br/>
                            <span style="color:red">Attention!</span>&nbsp;Insert only valid JS code, else it can break the plugin functionality.
                            If you have no clue what HS Parameters are just leave this textbox empty.
                            <textarea name="textarea1" cols="75" rows="5">$textarea1</textarea>
                            <br/><br/>
                            <div>
                                <input id="check5" type="checkbox" name="only_use_header" $only_use_header />
                                <label for="check5">Force Include of JS Code into Page Header instead of Footer.<br/>
                                <small>Some non API conform Themes require JS loads in the header</small></label>
                            </div>
                            <br/>
                            <div>
                                <input id="check6" type="checkbox" name="ptag_workaround" $ptag_workaround />
                                <label for="check6">Enable &lt;/p&gt; workaround.<br/>
                                <small>If you use lists with multiple [highslide] expander and notice that the breaks between the first expander and second expander are wrong please enable this workaroung. Full explanation <a href="http://solariz.de/forum?wpforumaction=viewtopic&t=132.00">here</a>.</small></label>
                            </div>
                            <br/>
                            <div>
                                <label for="input2">Use custom <b>highslide.css</b> ?</label>
                                <input id="input2" type="text" size="59" name="input2" value="$custom_css" /><br/>
                                <small>To avoid own CSS changes to be overwritten on Pluginupdate you can specify your own CSS file, please enter full URL. Leave empty for default. e.g.: http://mydomain.com/myhighslide.css</small>
                            </div>
                            <div class="submit"><input type="submit" name="Submit" value="Update options" /></div>
            			</form>
            		</div>
                </div>
        	</div>
        </div>
END;
}