<?php

namespace Kirby\Embed\Providers;

class CollegeHumor extends Provider {

  public function code($code) {
    $this->setAutoplay();
    return $code;
  }

}
