<?php

// ================================================
//  (embed: …)
// ================================================

$options = [
  'class'     => 'string',
  'thumb'     => 'string',
  'autoload'  => 'bool',
  'lazyvideo' => 'bool',
  'jsapi'     => 'bool',
];

$kirby->set('tag', 'embed', [
  'attr' => array_keys($options),
  'html' => function($tag) use($options) {
    $args = [];

    foreach($options as $option => $mode) {
      if($mode === 'bool') {
        if($tag->attr($option) === 'true')  $args[$option] = true;
        if($tag->attr($option) === 'false') $args[$option] = false;
      } elseif ($mode === 'string') {
        if($tag->attr($option)) $args[$option] = $tag->attr($option);
      }
    }

    return embed($tag->attr('embed'), $args);
  }
]);
