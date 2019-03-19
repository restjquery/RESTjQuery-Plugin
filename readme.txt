=== RESTjQuery ===
Author URI: https://sebastiendumont.com
Author: Sébastien Dumont
Contributors: sebd86
Donate Link: https://restjquery.com
Tags: api, jquery, JSON, rest, rest-api, wp-api
Requires at least: 4.4
Tested up to: 5.1.1
Requires PHP: 5.2.4
Stable Tag: 1.0.0
License: GPL v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides the RESTjQuery script to be used on the frontend of your WordPress site.

== Description ==

This small plugin includes support for RESTjQuery script. Once installed your site can use the RESTjQuery script.

### Security Check

A security key is set for you and will be needed to enable logged in users to access certain endpoints such as posting a new post.

To enable access you need to use the `nonce` parameter like so.

    restjQuery({
    	nonce: restjquery_params.nonce
    });


### How to use

See the [documentation](https://docs.restjquery.com/) for a guide on using RESTjQuery.


== Installation ==

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't even need to leave your web browser. To do an automatic install, log in to your WordPress admin panel, navigate to the Plugins menu and click Add New.

In the search field type "RESTjQuery" and click Search Plugins. Once you've found the plugin you can view details about it such as the the point release, rating and description. Most importantly of course, you can install it by clicking _Install Now_.

= Manual installation =

The manual installation method involves downloading the plugin and uploading it to your webserver via your favourite FTP application.

* Download the plugin file to your computer and unzip it
* Using an FTP program, or your hosting control panel, upload the unzipped plugin folder to your WordPress installation's `wp-content/plugins/` directory.
* Activate the plugin from the Plugins menu within the WordPress admin.

== Changelog ==

= 1.0.0 - ?? March 2019 =
* Tweaked: Re-written the main plugin file.
* Checked: Compatible with WordPress v5 and up

= 1.0 - 24th April 2017 =
* Initial release.
