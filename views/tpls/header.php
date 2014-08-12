<!DOCTYPE html>
<html>
<head>
  <title><?php echo @$page['title'].$site['title']; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>assets/styles/main.css">
  <?php
    if (@$page['meta']) {
      foreach ($page['meta'] as $key => $value) {
        echo printMeta($key, $value);
      }
    }
  ?>
</head>
<body>
  <div class="page-wrapper clearfix">
  <?php require $_SERVER['DOCUMENT_ROOT'].'/views/tpls/menu.php'; ?>
