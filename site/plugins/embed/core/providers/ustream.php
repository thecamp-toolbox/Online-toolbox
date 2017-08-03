<?php

namespace Kirby\Embed\Providers;

class Ustream extends Provider {

  public function code($code) {
    $this->setAutoplay();
    return $code;
  }


  // ================================================
  //  Autoplay
  // ================================================

  protected function setAutoplay() {
    if($this->option('lazyvideo') || $this->option('autoplay')) {
      $this->parameter('autoplay=true');
    }
  }

}
