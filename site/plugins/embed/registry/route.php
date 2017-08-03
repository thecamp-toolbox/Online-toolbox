<?php

use Kirby\Embed\Html;

$kirby->set('route', [
  'pattern' => 'api/plugin/embed/preview',
  'action'  => function() {
    $embed   = embed(get('url'), ['lazyvideo' => true]);
    $response = [];

    if($embed->data === false) {
      $response['success'] = 'false';

    } else {
      $response['success']      = 'true';
      $response['title']        = Html::removeEmojis($embed->title());
      $response['authorName']   = $embed->authorName();
      $response['authorUrl']    = $embed->authorUrl();
      $response['providerName'] = $embed->providerName();
      $response['providerUrl']  = $embed->url();
      $response['type']         = ucfirst($embed->type());
      $response['parameters']   = Html::cheatsheet($embed->urlParameters());
    }

    if(get('code') === 'true') {
      $response['code'] = (string)$embed;
    }

    return \response::json($response);
  },
  'method'  => 'POST'
]);
