<?php
include_once 'compatibility.php';

class Application
{

    private $_classLoadPaths;

    private $_config;

    private $_errorHandler;

    function __construct()
    {
        $this->_classLoadPaths = [
            __DIR__,
            __DIR__ . '/../vendor/'
        ];
        spl_autoload_register([$this, 'autoload']);

        $this->_errorHandler = new ErrorHandler();

        $this->loadConfig();
    }

    function autoload($class)
    {
        foreach ($this->_classLoadPaths as $path) {
            if (file_exists($file = $path . '/' . $class . '.php')) {
                return includeFile($file);
            }
        }
    }

    function loadConfig()
    {
        $this->_config = Spyc::YAMLLoad(__DIR__ . '/../config/config.yml');
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->_config;
    }

    public function run()
    {

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
