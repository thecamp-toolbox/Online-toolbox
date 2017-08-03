<?php

// ================================================
//  $page->video()->embed()
// ================================================

$kirby->set('field::method', 'embed', function($field, $args = []) {
  return embed($field->value, $args);
});
