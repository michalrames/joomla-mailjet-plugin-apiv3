<?php
error_reporting(E_ALL & ~E_NOTICE);
// no direct access
defined( '_JEXEC' ) or die ( 'Restricted access' );

jimport('joomla.application.component.controller');

if (!function_exists('class_alias')) { // For php older then 5.3
  function class_alias($orig, $alias) {
    eval('abstract class ' . $alias . ' extends ' . $orig . ' {}');
  }
}

if (!class_exists('JControllerLegacy')) {
  class_alias('JController','JControllerLegacy');
}

class MailjetController extends JControllerLegacy {

    function save() {
        global $result;

        $model = $this->getModel();

        $result = $model->store();
        if ($result != false) {
          $this->display();
        } else {
          header('HTTP/1.0 404 Not Found');
        }
    }
}
