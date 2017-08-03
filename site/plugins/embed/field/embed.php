<?php

class EmbedField extends UrlField {

  public $preview    = true;
  public $info       = true;
  public $cheatsheet = false;
  public $height     = 'none';

  public static $assets = [
    'css' => [
      '../../../assets/css/embed.css',
      'field.css'
    ],
    'js' => [
      '../../../assets/js/embed.js',
      'field.js'
    ]
  ];

  public function __construct() {
    parent::__construct();

    $this->type = 'embed';
    $this->icon = 'object-group';

    $this->translations();
  }

  public function input() {
    $input = parent::input();
    $input->data('field', 'embedfield');
    $input->data('ajax', url('api/plugin/embed/'));
    return $input;
  }

  public function template() {
    $template = parent::template();

    if($this->preview) {
      $template->append($this->tpl('preview', [
        'height' => $this->height,
      ]));
    }

    if($this->info) $template->append($this->tpl('info'));

    return $template;
  }

  public function label() {
    $label = parent::label();

    if($this->cheatsheet) $label->append($this->tpl('cheatsheet'));

    return $label;
  }

  protected function translations() {
    $root = dirname(__DIR__) . DS . 'translations' . DS;

    // Default (English)
    require($root . 'en.php');

    // Current panel language
    if(file_exists($root . panel()->language()->code() . '.php')) {
      require($root . panel()->language()->code() . '.php');
    }
  }

  protected function tpl($file, $args = []) {
    return tpl::load(__DIR__ . DS . 'templates' . DS . $file . '.php', $args);
  }

}
