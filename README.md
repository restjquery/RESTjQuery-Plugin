# WordPress REST API jQuery Support

This small plugin includes support for WordPress REST API jQuery script. Once installed your site can use the [WordPress REST API jQuery](https://restjquery.com) script.

The nonce security is set for you. See below on how to use it.

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
