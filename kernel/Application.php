<?php
/**
 *
 */

Use \Symfony\Component\HttpFoundation\Request;
Use Symfony\Component\HttpFoundation\Response;
Use MtHaml\Environment;
Use MtHaml\Support\Php\Executor;

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

//    /**
//     * @var Response
//     */
//    private $response;

    /**
    * @var Executor
    */
    private $haml;

    /**
     * Application constructor.
     * @throws \MtHaml\Exception
     */
    public function __construct()
    {
        $this->config = Spyc::YAMLLoad(__DIR__ . '/../config/config.yml');
        date_default_timezone_set($this->config['locale']['timezone']);

        new \Pixie\Connection('pgsql', $this->config['database'], 'DB');
      
        $haml_env = new Environment('php');
        $this->haml = new Executor($haml_env, array(
            'cache' => __DIR__ . '/../cache',
        ));

        $this->request = Request::createFromGlobals();
//        $this->response = new Response('', 200); //, ['Content-Type' => 'text/plain']);
//        $this->response->prepare($this->request);
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

//    /**
//     * @return Response
//     */
//    public function getResponse()
//    {
//        return $this->response;
//    }
    
    /**
     * @return Executor
     */
    public function getHaml()
    {
        return $this->haml;
    }

    /**
     *
     */
    public function run()
    {
        $path = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
        if ($path === '/admin' || strpos($path, '/admin/') === 0) {
            $runner = require __DIR__ . '/../admin/admin.php';
            $admin_path = explode('/admin', $path, 2)[1];
            $runner->run($this, $admin_path);
        } else {
            $this->respond_with('SERVING ' . $path, 200, 'text/plain');
        }
    }

    /**
     * @param        $content
     * @param int    $status
     * @param string $content_type
     * @throws \InvalidArgumentException
     * @throws \UnexpectedValueException
     */
    public function respond_with($content, $status = 200, $content_type = 'text/html')
    {
        $response = new Response('', $status, ['Content-Type' => $content_type]);
        $response->prepare($this->request);
        $response->setContent($content);
        $response->sendHeaders()->sendContent();
    }
}


