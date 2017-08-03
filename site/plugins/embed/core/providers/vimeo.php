<?php

namespace Kirby\Embed\Providers;

class Vimeo extends Provider {

  protected function init() {
    $this->getBool('autopause');
    $this->getBool('badge');
    $this->getBool('byline');
    $this->getAll('color');
    $this->getBool('loop');
    $this->getBool('portrait');
    $this->getBool('title');
  }

  public function code($code) {
    $this->setAutoplay();
    $this->set('autopause');
    $this->set('badge');
    $this->set('byline');
    $this->set('color');
    $this->set('loop');
    $this->set('portrait');
    $this->set('title');
    $this->setJsApi();
    return $code;
  }

  public function urlParameters() {
    return [
      ['autopause', 'Enables or disables pausing this video when another video is played (1/0)'],
      ['badge', 'Enables or disables the badge on the video (1/0)'],
      ['byline', 'Show the user’s byline on the video (1/0)'],
      ['color', 'Specify the color of the video controls (e.g. 00aa00)'],
      ['loop', 'Play the video again when it reaches the end (1/0)'],
      ['portrait', 'Show the user’s portrait on the video (1/0)'],
      ['title', 'Show the title on the video (1/0)'],
    ];
  }


  // ================================================
  //  JS API
  // ================================================

  protected function setJsApi() {
    if($this->option('jsapi')) {
      $this->parameter('api=1');
    }
  }

}
