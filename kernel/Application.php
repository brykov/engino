<?php
/**
 *
 */

Use \Symfony\Component\HttpFoundation\Request;
Use Symfony\Component\HttpFoundation\Response;

class Application
{

    /**
     * @var array
     */
    private $config;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    public function __construct()
    {
        $this->config = Spyc::YAMLLoad(__DIR__ . '/../config/config.yml');
        date_default_timezone_set($this->config['locale']['timezone']);
      
        new \Pixie\Connection('pgsql', $this->config['database'], 'DB');

        $this->request = Request::createFromGlobals();
        $this->response = new Response('', 200, ['Content-Type' => 'text/plain']);
        $this->response->prepare($this->request);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     *
     */
    public function run()
    {
        $this->response->setContent('hello world');
        $this->response->sendHeaders()->sendContent();
    }
}


