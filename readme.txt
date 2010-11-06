=== Highslide 4 Wordpress *reloaded* ===
Contributors: solariz
Donate link: http://solariz.de/donate
Tags: images, highslide, lightbox, popup, image, slideshow, zoom
Requires at least: 2.0.2
Tested up to: 3.0.1
Stable tag: 1.16

Enable the usage of lates Highslide Features in your Blog, Autoinsert, style Select, HTML Expands, CDN support, optimized for Pagespeed.

== Description ==
This Plugin automatically insert Highslide Script to your Blog without the need of any further configuration
or Shorttags or editing of old posts. As soon the Plugin is activated all existing thumped images using Highslide
to expand. But this isn`t all, the Plugin offers several Options to configure the look and behaviour of Highslide
in your Blog. For Advanced users there is also the option to specify own HS Parameters at the Option page.

Still that`s not all. Some other plugins dealing very dirty with the code of your blog.
Highslide 4 Wordpress *reloaded* is tested and optimized for Pagespeed also it offers a function to use the global
Coral CDN for CSS / JS delivery which, in many circumstances, save you bandwidth and improves page load speed.

As a new Feature, compared to existing Highslide Addons, you have the possibility to use HTML as a Highslide Popup
from within your Articles / Posts. For Example: If you put [highslide]This is a test[/highslide] somewhere in your
text wordpress just renders a link. If somebody click the link a highslide Windows expands showing "This is a test"
You are free to use HTML Tags / Formating inside the tag. Also you can specify a caption and a Linkname; Syntax:
[highslide](Caption;Link Name)Text to display[/highslide] for Example copy and Paste this one into a blogpost:
[highslide](This is the Caption;MyLink)I'm a interesting text, you can also format me or insert pictures.
Feel free to try.[/highslide]

Summary:

* Using latest Highslide Scripts
* Optimized and JS packed
* Optimized HS Graphics
* Possibility to use HTML Expands
* Easy config option
* Advanced setup possible
* optimized to pagespeed and yslow rulesets


== Installation ==

1. Upload the Folder `highslide-4-wordpress-reloaded` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the plugin, Settings -> Highslide 4 Wordpress

== Frequently Asked Questions ==

= I have a problem or suggestion =

You can find a small Forum related to my Plugins at http://solariz.de feel free to ask.

== Screenshots ==

1. Plugin Settings
2. Plugin Advanced Options
3. supporting HTML Highslide Windows
4. supporting HS gallery + slideshow
5. choose many styles or set your own in Advanced

== Changelog ==
= 1.16 =
* Upgrade to latest highslide source 1.1.9
* Fixed problems with Google Chrome
* Added IE6 special CSS workaround
* upgrade to img sets
* Tested with WP 3.0.1

= 1.15 =
* fix for HTML expanders in <p> tags, false linebreak shouldn`t occure anymore

= 1.14 =
* Workaround for multiple HTML expander linebreak bug
* Added link tu manual page
* Added "Like It ?" to settings
* Tested up to: 2.9.2
* New Options Page
* Added possibility to add Titel & Caption
* Added Manual / Help Links
* fixed minor bugs

= 1.13 =
* Version No. Change due to sucking Wordpres Version management ;( Changing a simple update on X different locations is a pain in my...

= 1.12 =
* Bugfix: Highslide expands displays title and additional information correct, thanks to Tom
* Bugfix: expands now align text left to right by default

= 1.11 =
* Bugfix: Highslide expands now as it should on integrated WP gallerys
* Bugfix: Highslide expands now as it should on attachment images
* Change: The [highslide] HTML Box now have a larger default width, you can edit the default style in the CSS file. Search for .highslide-html-content
* New: HTML Expand Box description extended you can now manually specify the widht and hight. (Subject;LinkTitle;640;480) will open the windows in 640×480px

= 1.10 =
* Added Option to Force to “only use header” for JS include. Some themes have problems with footer included JS files. reported by Max
* Fix in [highslide] detection
* Include positioning in JS
* Option for highslide to automaticaly align center
* Option to specify Slideshow delay
* Changed some informative links (donate, homepage)
* Adv. use custom Highslide CSS File
* Display ICO Gfx on HTML Expand links

= 1.0 =
* init, first release


== Upgrade Notice ==

= 1.0 =
Initial Version
