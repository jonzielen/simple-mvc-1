<?php
  require 'models/defaultSiteFunctions.php';
  require 'rout/controller.php';
  require 'classes/class.page.php';

  $controllerInfo = new jon\Controller($urlParams);
  $controllerSettings = $controllerInfo->controllerOutput();

  $loadPage = new jon\Page($controllerSettings);
  $loadPage->displayPage();
?>
