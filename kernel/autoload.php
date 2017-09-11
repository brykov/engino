<?php

require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(
  function($class)
  {
      foreach ([__DIR__] as $path) {
          if (file_exists($file = $path . '/' . $class . '.php')) {
              return includeFile($file);
          }
      }
  }
);

/**
 * Scope isolated include.
 *
 * Prevents access to $this/self from included files.
 */
function includeFile($file)
{
    return include $file;
}