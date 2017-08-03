<?php

namespace Kirby\Embed\Providers;

class YouTube extends Provider {

  protected function init() {
    $this->getAll('t');
    $this->getNumber('index');
  }

  public function code($code) {
    $this->setAutoplay();
    $this->setTimecode();
    $this->set('index');
    $this->setJsApi();
    return $code;
  }


  // ================================================
  //  Parameters for Panel Field Cheatsheet
  // ================================================

  public function urlParameters() {
    return [
      ['t', 'Timecode where the video should start (e.g. 1m4s)'],
    ];
  }



  // ================================================
  //  Timecode
  // ================================================

  protected function setTimecode() {
    if($this->t !== false) {
      $this->parameter('start=' . $this->calculateTimecode());
    }
  }

  protected function calculateTimecode() {
    $time  = $this->disectTimecode('h') * 60 * 60;
    $time += $this->disectTimecode('m') * 60 ;
    $time += $this->disectTimecode('s');
    return $time;
  }

  protected function disectTimecode($identifier) {
    return preg_match('/([0-9]+)' . $identifier . '/i', $this->t, $match) ? $match[0] : 0;
  }


  // ================================================
  //  JS API
  // ================================================

  protected function setJsApi() {
    if($this->option('jsapi')) {
      $this->parameter('enablejsapi=1');
    }
  }

}
