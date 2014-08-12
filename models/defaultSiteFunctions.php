<?php
  function siteURL() {
      $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
      $domainName = $_SERVER['HTTP_HOST'].'/';
      return $protocol.$domainName;
  }
  define('SITE_URL', siteURL());

  $urlParams = explode('/', @$_SERVER['REDIRECT_URL']);

  function printMeta($key, $value) {
    return "<meta name=\"$key\" content=\"$value\">\r\n";
  }
?>