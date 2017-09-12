<?php
/**
 *
 */

Use \GuzzleHttp\Psr7\ServerRequest;
Use \Psr\Http\Message\ServerRequestInterface;
Use \GuzzleHttp\Psr7\Response;

class Application
{

    private $config;

    private $request;

    public function __construct()
    {
        $this->request = ServerRequest::fromGlobals();
        $this->config = Spyc::YAMLLoad(__DIR__ . '/../config/config.yml');
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return ServerRequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }



    public function run()
    {
        return new Response(
            200,
            ['Content-Type' => 'text/plain'],
            'Hello World'
        );
    }
}


