<?php

class Admin
{
    /**
     * @param Application $app
     * @param string      $path
     */
    public function run($app, $path)
    {
        $html = $app->getHaml()->render(__DIR__ . '/views/index.html.haml', []);
        $app->getResponse()->setContent($html);
        $app->getResponse()->sendHeaders()->sendContent();
    }

}

return new Admin();