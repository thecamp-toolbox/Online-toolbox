<?php

namespace Kirby\Embed\Providers;

class Spotify extends Provider {

  protected function init() {
    $this->getString('theme');
    $this->getString('view');
    $this->getNumber('width');
    $this->getNumber('height');
  }

  public function code($code) {
    $this->set('theme');
    $this->set('view');
    $code = $this->setSizes($code);
    return $code;
  }


  // ================================================
  //  Parameters for Panel Field Cheatsheet
  // ================================================

  public function urlParameters() {
    return [
      ['view', 'Set the view style (list/coverart)'],
      ['theme', 'Set the theme (white/black)'],
      ['width', 'Set the width of the embed (e.g. 600)'],
      ['height', 'Set the height of the embed (e.g. 80)'],
    ];
  }

  // ================================================
  //  Sizes
  // ================================================

  protected function setSizes($code) {
    if($this->width !== false) {
      $code = str_ireplace('<iframe', '<iframe width="' . $this->width . '"', $code);
    }
    if($this->height !== false) {
      $code = str_ireplace('<iframe', '<iframe height="' . $this->height . '"', $code);
    }
    return $code;
  }
}
