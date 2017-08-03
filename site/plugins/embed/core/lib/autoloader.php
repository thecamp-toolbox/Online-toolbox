<?php

namespace Kirby\Embed;

use Dir;

class Autoloader {
  public static function load($paths) {
    foreach($paths as $group => $files) {

      // single file
      if(!is_array($files)) {
        static::loadFile($group . '.php');

      // directory
      } else {
        foreach($files as $file) {

          // load all files from this directory
          if($file === true) {
            foreach(dir::read(dirname(dirname(__DIR__)) . DS . $group) as $file) {
              static::loadFile($group . DS . $file);
            }

          // load specified files
          } else {
            static::loadFile($group . DS . $file . '.php');
          }
        }
      }
    }
  }

  protected static function loadFile($path) {
    $file = dirname(dirname(__DIR__)) . DS . str_replace('/', DS, $path);
    if(file_exists($file)) {
      require_once($file);
    }
  }
}
