<?php

namespace Kirby\Embed {

  use Kirby\Embed\Autoloader;
  require_once('core/lib/autoloader.php');

  $kirby    = kirby();
  $language = $kirby->site()->language();

  Autoloader::load([
    'vendor'         => ['Embed/src/autoloader'],
    'translations'   => ['en', $language ? $language->code() : null],
    'core'           => ['core', 'data', 'url', 'html'],
    'core/lib'       => ['cache', 'thumb'],
    'core/providers' => ['provider', true],
  ]);

  include('registry/field-method.php');
  include('registry/tag.php');
  include('registry/field.php');
  include('registry/route.php');

}


// ================================================
//  Global helper
// ================================================

namespace {
  function embed($url, $args = []) {
    return new Kirby\Embed\Core($url, $args);
  }
}
