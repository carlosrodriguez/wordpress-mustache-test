<?php

  require(BASE_PATH.'/utils/mustache.php');

  class mustacheUtils {
    var $m;
    var $t;  

    function __construct(){
        $this->m = new Mustache;
     }

    function load($template){
       $this->t = file_get_contents($template);
    }

    function store($template, $data){
      $me = $this->m;
      $this->load($template);
      return $me->render($this->t, $data);
    }

    function render($template, $data = array()) {
      echo $this->store($template, $data);
    }
  }

  global $mustache;
  $mustache = new mustacheUtils();

?>