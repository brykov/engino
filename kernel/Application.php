<?php
class Application
{

    private $_config;

    private $_errorHandler;

    function __construct()
    {
        $this->loadConfig();
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


