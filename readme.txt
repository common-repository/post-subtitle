=== Post Subtitle ===
Contributors: johnl1479
Donate link: http://johnluetke.net
Tags: post, subtitle, admin
Requires at least: 2.9.0
Tested up to: 2.9.1
Stable tag: 1.1

Aesthetic, yet unconventional way of handling subtitles for posts. 

== Description ==

Aesthetic, yet unconventional way of handling subtitles for posts. 

Adds a text input field directly below the post title input field for a subtitle.

The subtitle can be used in your theme with the template tag `the_subtitle`.

**ATTENTION:** This plugin *is* updated with every version of Wordpress. Please ensure that you have installed the version of this plugin which corresponds with the version of Wordpress you are running. The "Versions Map" section underneath the "Other Notes" tab at the top of this page will tell you which versions of the plugin will work with which versions of Wordpress. This includes Wordpress MU users.

Idea from <a href="http://digwp.com/2009/10/ideas-for-plugins/">Chris Coyier</a>

== Installation ==

1. Upload `post-subtitle.zip` to your `wp-content/plugins/` directory and unzip it OR upload `post-subtitle.zip` via the Wordpress Plugin Installer OR search for "post-subtitle" in the Wordpress Plugin Installer and click "Install"
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

None. Ask one on the forums!

== Screenshots ==

1. The subtitle text field, added directly beneath the post title field.

== Changelog ==

= 1.0 = 
Initial Release

== Upgrade Notice ==

See the Version Map to find out which version of the plugin you need.

== Version Map ==

* **Wordpress 2.9** => Post Subtitle 1.0
* **Wordpress 2.9.1** => Post Subtitle 1.1

* **Wordpress MU 2.8.6** => Post Subtitle 0.9-MU

== Detailed Information ==

Ideally, this plugin would use a hook that has yet to be added to the Wordpress Core (See <a href="http://core.trac.wordpress.org/ticket/11469">the ticket</a>). Until that happens, Post Subtitle replaces the stock `wp-admin/edit-form-advanced.php` file with one that includes said hook.

Upon plugin activation, the original `edit-form-advanced.php` is backed up into the plugin folder, and the modified version copied over it.

Upon plugin deactivation, the backed-up `edit-form-advanced.php` is taken out of the plugin directory and returned to it original place.

Due to this nature, Post Subtitle may need to be updated with every release of Wordpress. If you use this plugin, please be sure to check this page every time Wordpress is updated.