<?php

namespace Kirby\Embed;

use C;
use F;

class Thumb {

  protected $dir;
  protected $root;
  protected $url = '';

  public function __construct($plugin, $url, $lifetime) {
    $this->plugin    = $plugin;
    $this->source    = $url;
    $this->lifetime  = $lifetime;

    $this->root      = kirby()->roots()->thumbs() . DS . '_plugins';
    $this->dir       = $this->root . DS . $this->plugin;
    $this->extension = pathinfo(strtok($this->source, '?'), PATHINFO_EXTENSION);
    $this->file      = md5($this->source) . '.' . $this->extension;
    $this->path      = $this->dir . DS . $this->file;
    $this->url       = $url;

    $this->cache();
  }

  public function __toString() {
    return $this->url;
  }

  protected function cache() {
    $cache = url('thumbs/_plugins/' . $this->plugin . '/' . $this->file);

    if(f::exists($this->path) and !$this->expired()) {
      return $this->url = $cache;
    } else {
      try {
        if(is_writable(kirby()->roots()->thumbs())) {
          if(!file_exists($this->root)) mkdir($this->root, 0755, true);
          if(!file_exists($this->dir))  mkdir($this->dir, 0755, true);
          file_put_contents($this->path, file_get_contents($this->source));
          $this->url = $cache;
        }
      } catch (Exception $e) {}
    }
  }

  protected function expired() {
    if((f::modified($this->path) + $this->lifetime) < time()) {
      return f::remove($this->path);
    }

    return false;
  }
}
