=== WordPress REST API jQuery Support ===
Version: 1.0
Author URI: https://sebastiendumont.com
Author: Sébastien Dumont
Contributors: sebd86
Tags: jquery, support, client, api, json, REST, restapi
Requires at least: 4.5
Tested up to: 4.7.3
Stable Tag: 1.0
License: GPL v2

This small plugin includes support for WordPress REST API jQuery script. Once installed your site can use the WordPress REST API jQuery script.

== Description ==

This small plugin includes support for WordPress REST API jQuery script. Once installed your site can use the WordPress REST API jQuery script.

### Site URL

Main requirement for the script to know where the REST API is connecting from.

`wprestapi_jquery_params.siteURL`

### Security Check

Allows logged in users to access certain endpoints.

`wprestapi_jquery_params.nonce`

#### Example of using the two parameters.

`
restjQuery({
    siteUrl: wprestapi_jquery_params.siteURL,
    securityCheck: wprestapi_jquery_params.nonce
});
`

== Installation ==

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't even need to leave your web browser. To do an automatic install, log in to your WordPress admin panel, navigate to the Plugins menu and click Add New.

In the search field type "WordPress REST API jQuery Support" and click Search Plugins. Once you've found the plugin you can view details about it such as the the point release, rating and description. Most importantly of course, you can install it by clicking _Install Now_.

= Manual installation =

The manual installation method involves downloading the plugin and uploading it to your webserver via your favourite FTP application.

* Download the plugin file to your computer and unzip it
* Using an FTP program, or your hosting control panel, upload the unzipped plugin folder to your WordPress installation's `wp-content/plugins/` directory.
* Activate the plugin from the Plugins menu within the WordPress admin.

== Changelog ==

= 1.0 - 16th March 2017 =
* First release
