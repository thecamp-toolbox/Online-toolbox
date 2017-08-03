<?php

namespace Kirby\Embed;


class Url {

  public $parameters = [];

  // ================================================
  //  Extract URL from code
  // ================================================

  public function __construct($code) {
    if(preg_match('/(src=")(.*)(")/U', $code, $match)) {
      $this->url = $match[2];
    } else {
      $this->url = false;
    }
  }


  // ================================================
  //  Get new URL with parameters
  // ================================================

  public function get() {
    $newParameters = implode('&', $this->parameters);
    $hasParameter  = preg_match('/\?/', $this->url);

    return $this->url . ($hasParameter ? '&' : '?') . $newParameters;
  }


  // ================================================
  //  Update code with new URL
  // ================================================

  public function update($code) {
    if($this->url !== false) {
      $pattern = '/(src|data-src)(=")(.*)(")/U';
      $order   = '$1$2' . $this->get() . '$4';
      $code    = preg_replace($pattern, $order, $code);
    }

    return $code;
  }


  // ================================================
  //  Add parameter(s)
  // ================================================

  public function parameter($parameter) {
    if(!is_array($parameter)) $parameter = [$parameter];

    $this->parameters = array_merge($this->parameters, $parameter);
  }

}
