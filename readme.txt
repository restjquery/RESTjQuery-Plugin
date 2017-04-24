=== WordPress REST API jQuery Support ===
Version: 1.0
Author URI: https://sebastiendumont.com
Author: Sébastien Dumont
Contributors: sebd86
Tags: jquery, support, client, api, json, REST, restapi
Requires at least: 4.5
Tested up to: 4.7.4
Stable Tag: 1.0
License: GPL v2

This small plugin includes support for WordPress REST API jQuery script. Once installed your site can use the WordPress REST API jQuery script.

== Description ==

This small plugin includes support for WordPress REST API jQuery script. Once installed your site can use the WordPress REST API jQuery script.

### Security Check

Allows logged in users to access certain endpoints.

Global parameter to use: `wprestapi_jquery_params.nonce`

Example of using the nonce parameter.

```javascript
restjQuery({
  nonce: wprestapi_jquery_params.nonce
});
```

See [Documentation](https://docs.restjquery.com/) for other parameters you can use.

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

= 1.0 - 24th April 2017 =
* First release.
