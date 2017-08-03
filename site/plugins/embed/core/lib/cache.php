<?php

namespace Kirby\Embed;

class Cache {

  public function __construct($plugin, $url) {
    $this->plugin = $plugin;
    $this->key    = md5($url);

    // Cache DirectoryIterator
    $dir = kirby()->roots()->cache() . DS . $this->plugin;
    if(!file_exists($dir)) mkdir($dir);

    // Cache setup
    $this->cache = \cache::setup('file', ['root' => $dir]);

    // Cache clean-up
    if($this->cache->expired($this->key)) {
      $this->cache->remove($this->key);
    }
  }

  public function __call($name, $args = []) {
    return $this->cache->{$name}($this->key, $args);
  }

}
