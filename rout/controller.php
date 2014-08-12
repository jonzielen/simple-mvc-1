<?php
namespace jon;
class Controller {

  protected $template = array('html'=>'', 'info'=>'');
  protected $urlParts = '';

  public function __construct($urlParams) {
    $this->urlParts = $urlParams;

    foreach ($this->urlParts as $key => $value) {
      if (@(method_exists('jon\Controller', $this->urlParts[1])) || (end($this->urlParts) == '')) {
        if (method_exists('jon\Controller', $value)) {
          self::$value($this->urlParts);
          break;
        } else {
          if (count($this->urlParts) == 1) {
            self::homepage();
            break;
          }
        }
      } else {
        self::errorPageInfo();
        break;
      }
    }
  }

  protected function errorPageInfo() {
    $this->template['info'] .= file_get_contents('models/error-page.php');
    $this->template['html'] .= file_get_contents('views/pages/error-page.php');
  }

  protected function homepage() {
    if (file_exists('views/pages/homepage.php')) {
      $this->template['html'] .= file_get_contents('views/pages/homepage.php');
    } else {
     self::errorPageInfo();
    }
  }

  protected function test($urlParams) {
    switch (end($this->urlParts)) {
      case 'test':
        if (file_exists('models/test-page-info.php')) {
          $this->template['info'] .= file_get_contents('models/test-page-info.php');
        }
        if (file_exists('views/pages/test-page.php')) {
          $this->template['html'] .= file_get_contents('views/pages/test-page.php');
        } else {
          self::errorPageInfo();
        }
        break;

      default:
        self::errorPageInfo();
        break;
    }
  }

  protected function about($urlParams) {
    switch (end($this->urlParts)) {
      case 'you':
        if (file_exists('models/about-you-page-info.php')) {
          $this->template['info'] .= file_get_contents('models/about-you-page-info.php');
        }
        if (file_exists('views/pages/about-you-page.php')) {
          $this->template['html'] .= file_get_contents('views/pages/about-you-page.php');
        } else {
          self::errorPageInfo();
        }
        break;

      case 'us':
        if (file_exists('models/about-us-page-info.php')) {
          $this->template['info'] .= file_get_contents('models/about-us-page-info.php');
        }
        if (file_exists('views/pages/about-us-page.php')) {
          $this->template['html'] .= file_get_contents('views/pages/about-us-page.php');
        } else {
          self::errorPageInfo();
        }
        break;

      case 'about':
        if (file_exists('models/about-page-info.php')) {
          $this->template['info'] .= file_get_contents('models/about-page-info.php');
        }
        if (file_exists('views/pages/aboutpage.php')) {
          $this->template['html'] .= file_get_contents('views/pages/aboutpage.php');
        } else {
          self::errorPageInfo();
        }
        break;

      default:
        self::errorPageInfo();
        break;
    }
  }

  public function controllerOutput() {
    return $this->template;
  }
}
