=== SDAC Post Slideshows ===
Tags: slideshow, slideshows, post slideshow, jQuery, jQuery Cycle, cycle, shortcode
Contributors: jenz
Requires at least: 2.8
Tested up to: 3.2.1
Stable tag: 1.1.3
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4761649

Highly customizable slideshows for your posts and pages using jQuery Cycle.

== Description ==
The SDAC Post Slideshows plugin allows you to easily add customizable slideshows into your posts using jQuery Cycle.

== Installation ==
1. Unzip into your `/wp-content/plugins/` directory. If you're uploading it make sure to upload
the top-level folder. Don't just upload all the php files and put them in `/wp-content/plugins/`.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create a new post or page, fill in the "Post Slideshow" fields, and add the slideshow to your content using the [post-slideshow] shortcode.

Enjoy!

== Frequently Asked Questions ==

= I do not see the button to add this into the content. Where is it?
Click on the HTML tab in the editor and you will see it.

= Where can I get support for this plugin?
You can submit any issues/feedback: http://sandboxdev.com/forums/forum/sdac-post-slideshows

= Do all slideshows have the same width/height?
No. You can easily change the size of your slideshow for each post by adjusting the general settings within the post.

= How many slides can we have?
As many as you want - just add more as needed.

= Can I use just images in the slideshow or just text?
Yes - just fill in the information you need when creating a slide and set the appropriate widths in the general settings.

= How can I use this within my WordPress template?
You can use the WordPress function do_shortcode([post_slideshow post_id="1"]) (Post ID is the ID of the post you want to use)

== Screenshots ==

1. Button in the editor
2. Example slideshow
3. Edit/Add slides options


== Changelog ==
= 1.1.3 =
* (September 7, 2011)
* Fixed an incorrect height setting

= 1.1.2 =
* (May 18, 2011)
* Fixed a UI Issue (div)

= 1.1.1 =
* (April 4, 2011)
* Fixed a UI Issue
* Minor Changes

= 1.1 =
* (February 23, 2011)
* Exposed jQuery options for fx, timeout, speed, pause
* Add new options to change background color and border for slides
* Moved the Cycle JS within the_content
* Added post_id parameter so you can add a post slideshow outside of the actual post

= 1.0.2 =
* (February 7, 2011)
* Fixed an undefined index error
* Changed the input/output validation
* Added the slideshow option to pages
* Updated jQuery Cycle to 2.9.4

= 1.0.1 =
* (November 3, 2010)
* Added in html_entity_decode() for the slide text
* Changed the slide show CSS to use classes instead of IDs to be valid XHTML if there are multiple slideshows on a page
* Updated the FAQs

= 1.0 =
* (October 7, 2010)
* Released with essential functionality

== Upgrade Notice ==
 = 1.1.2 =
Minor Updates

 = 1.1.1 =
Minor Updates

 = 1.1 =
A number of new options are available.

 = 1.0.2 =
Slideshows now are available on pages.

 = 1.0.1 =
Minor Updates

 = 1.0 =
First release of plugin
