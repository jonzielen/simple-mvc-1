<?php
namespace jon;
class Page {

  protected $headerFile = 'views/tpls/header.php';
  protected $footerFile = 'views/tpls/footer.php';
  protected $defaultSiteInfo = 'models/default-page-info.php';
  protected $page = '';

  function __construct($controllerSettings) {
    self::addHeader($controllerSettings);
    self::addBody($controllerSettings);
    self::addFooter($controllerSettings);
  }

  protected function addHeader($controllerSettings) {
    $this->page .= $controllerSettings['info'];
    $this->page .= file_get_contents($this->defaultSiteInfo);
    $this->page .= file_get_contents($this->headerFile);
  }

  protected function addBody($controllerSettings) {
    $this->page .= $controllerSettings['html'];
  }

  protected function addFooter($controllerSettings) {
    $this->page .= file_get_contents($this->footerFile);
  }

  public function displayPage() {
    return eval('?>'.$this->page);
  }
}
