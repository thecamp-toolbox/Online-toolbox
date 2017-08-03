<?php

namespace Kirby\Embed;

use C;
use L;
use Tpl;

class Html {

  public function __construct($core) {
    $this->core    = $core;
    $this->options = $this->core->options;

    $this->data    = [
      'code'     => $this->core->code(),
      'class'    => $this->core->options['class'],
      'type'     => $this->core->type(),
      'provider' => $this->core->providerName(),
      'style'    => null,
      'more'     => null
    ];
  }


  // ================================================
  //  Outputs
  // ================================================

  public function __toString() {
    // call preparation method for type
    $this->prepareType();

    // w3c valid code
    $this->ensureValidCode();

    // update embed iframe url
    $this->updateData('code', function($code) {
      return $this->core->url->update($code);
    });

    return $this->snippet('wrapper', $this->data);
  }

  public static function error($url, $msg = null) {
    if(!$msg) $msg = 'noembed';
    $msg  = l::get('plugin.embed.error.' . $msg);
    $path = __DIR__ . DS . 'snippets' . DS . 'error.php';

    return tpl::load($path, [
      'url' => $url,
      'msg' => $msg
    ]);
  }

  public static function cheatsheet($parameters) {
    $path = __DIR__ . DS . 'snippets' . DS . 'cheatsheet.php';
    return tpl::load($path, [
      'entries' => $parameters
    ]);
  }

  // ================================================
  //  Types
  // ================================================

  protected function prepareType() {
    $prepareType = 'prepare' . ucfirst($this->core->type());
    if(method_exists($this, $prepareType)) {
      $this->{$prepareType}();
    }

    if(!$this->data['code']) {
      $this->updateData('code', $this->error($this->core->input, 'nocode'));
      $this->updateData('class', false);
    }
  }


  // ================================================
  //  Videos
  // ================================================

  protected function prepareVideo() {
    if($this->data['code']) {
      // Container ratio
      $this->data['style'] = 'padding-top:' . str_replace(',', '.', $this->core->aspectRatio()) . '%';

      // Lazy video
      if($this->options['lazyvideo'] && $this->core->supportsLazyVideo()) {
        $this->lazyVideo();
      }
    }
  }

  protected function lazyVideo() {
    // src -> data-src
    $this->updateData('code', function($code) {
      $pattern = '/(<iframe.*)(src)(="[^[:space:]]*")/';
      $replace = '$1data-src$3';
      return preg_replace($pattern, $replace, $code);
    });

    // thumb
    $this->data['more'] = $this->snippet('thumb', [
      'url' => $this->core->thumb(),
      'alt' => $this->core->title() . ($this->core->authorName() ? ' (by ' . $this->core->authorName() . ')' : '')
    ]);
  }

  // ================================================
  //  Links
  // ================================================

  protected function prepareLink() {
    if(!$this->data['code']) {
      $this->updateData('code', $this->snippet('typeLink', [
        'url'  => $this->core->url(),
        'text' => $this->core->title()
      ]));
    }
  }


  // ================================================
  //  Code validity
  // ================================================
  protected function ensureValidCode() {
    if(c::get('plugin.embed.w3c.enforce', false)) {
      $this->updateData('code', function($code) {
        $pattern = '/(frameborder="0"|allowtransparency="true")/';
        return preg_replace($pattern, '', $code);
      });
    }
  }

  // ================================================
  //  Helpers
  // ================================================

  protected function updateData($data, $value) {
    if(is_callable($value)) {
      $this->data[$data] = $value($this->data[$data]);
    } else {
      $this->data[$data] = $value;
    }
  }

  protected function snippet($name, $data) {
    return tpl::load(__DIR__ . DS . 'snippets' . DS . $name . '.php', $data);
  }

  public static function removeEmojis($string) {
    return trim(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',   mb_convert_encoding($string, "UTF-8")));
  }

}
