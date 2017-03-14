# WordPress REST API jQuery Support

This small plugin includes support for WordPress jQuery REST API Wrapper script. Once installed your site can use the [WordPress jQuery REST API Wrapper](https://github.com/seb86/WordPress-jQuery-REST-API-Wrapper) script.

The site url and nonce security is set for you. See below on how to use it.

### Site URL
Main requirement for the script to know where the REST API is connecting from.

```wprestapi_jquery_params.siteURL```

### Nonce
Allows logged in users to access certain endpoints.

```wprestapi_jquery_params.nonce```

### Example of using the two parameters.

```
$('.app').wprestapi({
    siteUrl: wprestapi_jquery_params.siteURL,
    securityCheck: wprestapi_jquery_params.nonce
});
```
