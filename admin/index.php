<?php

class Admin
{  
    public function run($app, $path) 
    {
        $app->getResponse()->setContent($path);
        $app->getResponse()->sendHeaders()->sendContent();
    }

}

return new Admin();