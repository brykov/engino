<?php
class Application {
  
  private $loadPaths;
  
  private $config;
  
  function __construct() {
    $this->loadPaths = [
      __DIR__,
      __DIR__ . '/../vendor/'
    ];
    spl_autoload_register([$this, 'autoload']);
    
    $this->container = new Container();
  }
  
  function autoload($class) {
    foreach($this->loadPaths as $path) {
      if(file_exists($file = $path . '/' . $class . '.php')) {
        return includeFile($file);
      }
    }
  }
  
  function loadConfig() {
    $this->config = Spyc::YAMLLoad(__DIR__ . '/../config/config.yml');
  }
}

/**
 * Scope isolated include.
 *
 * Prevents access to $this/self from included files.
 */
function includeFile($file)
{
    return include $file;
}


return new Application();
