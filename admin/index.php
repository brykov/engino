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
    private $mode;

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

        @list($this->mode, $this->uri) = explode('/', trim($path, '/'), 2);

        if (!$this->mode) {
            $this->mode = 'index';
        }

        if (!method_exists($this, $this->mode . '_mode'))
        {
            $this->mode = 'bad_request';
        }

        $this->{$this->mode . '_mode'}();;
    }

    private function javascripts_mode()
    {
        $js = new AssetCollection([
            new FileAsset(__DIR__ . '/assets/js/application.js')
        ]);
        $this->app->respond_with(
            $js->dump(),
            200,
            'application/js'
        );
    }

    private function index_mode()
    {
        $this->app->respond_with(
            $this->app->getHaml()->render(__DIR__ . '/views/index.html.haml', []),
            200,
            'text/html'
        );
    }

    private function bad_request_mode()
    {
        $this->app->respond_with(
            'Bad Request',
            400,
            'text/plain'
        );
    }

}

return new Admin();