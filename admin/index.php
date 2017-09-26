<?php

class Admin
{
    /**
     * @param Application $app
     * @param string      $path
     */
    public function run($app, $path)
    {
        $app->getResponse()->setContent('ADMIN ' . $path);
        $app->getResponse()->sendHeaders()->sendContent();
    }

}

return new Admin();