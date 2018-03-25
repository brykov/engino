<?php
use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;

class Admin
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $uri;

    /**
     * @param Application $app
     * @param string      $path
     */
    public function run($app, $path)
    {
        $this->app = $app;
        @list($this->action, $this->uri) = explode('/', trim($path, '/'), 2);

        if (!$this->action) {
            $this->action = 'index';
        }

        if (!method_exists($this, $this->action . '_action'))
        {
            $this->action = 'bad_request';
        }

        $this->{$this->action . '_action'}();;
    }

//    private function javascripts_action()
//    {
//        $js = new AssetCollection([
//            new FileAsset(__DIR__ . '/assets/js/application.js')
//        ]);
//        $this->app->respond_with(
//            $js->dump(),
//            200,
//            'application/js'
//        );
//    }

    private function index_action()
    {
        $this->app->respond_with(
            $this->app->getHaml()->render(__DIR__ . '/views/index.html.haml', []),
            200,
            'text/html'
        );
    }

    private function bad_request_action()
    {
        $this->app->respond_with(
            'Bad Request',
            400,
            'text/plain'
        );
    }

}

return new Admin();