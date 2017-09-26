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
        $path = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
//        $path = $this->request->getPathInfo();
        if ($path === '/admin' || strpos($path, '/admin/') === 0) {
            $runner = require __DIR__ . '/../admin/index.php';
            $admin_path = explode('/admin', $path, 2)[1];
            $runner->run($this, $admin_path);
        } else {
            $this->response->setContent('SERVING ' . $path);
            $this->response->sendHeaders()->sendContent();
        }
    }
}


