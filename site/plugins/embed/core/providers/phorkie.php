<?php

namespace Kirby\Embed\Providers;

class phorkie extends Provider {

  public function code($code) {
    $code .= $this->fixStyles();
    return $code;
  }


  // ================================================
  //  Fix styles
  // ================================================

  protected function fixStyles() {
    return '<style>.phork {text-align: left;}</style>';
  }

}
