<?php

namespace Kirby\Embed\Providers;

class Provider {

  public function __construct($core, $url) {
    $this->core = $core;
    $this->url  = $url;

    $this->init();
  }


  // ================================================
  //  Placeholder methods
  // ================================================

  protected function init() {}

  public function supportsLazyVideo() { return $this->core->type() === 'video'; }

  // ================================================
  //  Custom URL parameter helpers
  // ================================================

  protected function set($paramenter) {
    if($this->{$paramenter} !== false) {
      $this->parameter($paramenter . '=' . $this->{$paramenter});
    }
  }

  protected function get($paramenter, $pattern) {
    $this->{$paramenter} = preg_match('/' . $paramenter . '=(' . $pattern . ')/', $this->url, $result) ? $result[1] : false;
  }

  protected function getBool($paramenter) {
    $this->get($paramenter, '[0-1]');
  }

  protected function getNumber($paramenter, $offset = 0) {
    $this->get($paramenter, '[0-9]*');
    if($offset !== 0) {
      $this->{$paramenter} += $offset;
    }
  }

  protected function getString($paramenter) {
    $this->get($paramenter, '[a-zA-Z]*');
  }

  protected function getAll($paramenter) {
    $this->get($paramenter, '[a-zA-Z0-9]*');
  }


  // ================================================
  //  Video Autoplay
  // ================================================

  protected function setAutoplay() {
    if($this->option('lazyvideo') || $this->option('autoplay')) {
      $this->parameter(['rel=0', 'autoplay=1', 'auto=1']);
    }
  }


  // ================================================
  //  General helpers
  // ================================================

  protected function option($option) {
    return $this->core->options[$option];
  }

  protected function parameter($parameter) {
    return $this->core->url->parameter($parameter);
  }
}
