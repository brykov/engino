<?php

class ErrorHandler
{
    function __construct()
    {
        error_reporting(0);

        set_error_handler(function ($level, $message, $file = '', $line = 0) {
            if (error_reporting() & $level) {
                throw new ErrorException($message, 0, $level, $file, $line);
            }
        });

        set_exception_handler([$this, 'handleException']);
        register_shutdown_function([$this, 'handleShutdown']);
    }

    function handleException($e)
    {
        header('Content-Type: text/plain');
        print_r($e);
        die();
    }

    function handleShutdown()
    {
        if (! is_null($error = error_get_last()) && $this->isFatalError($error['type'])) {
            $this->handleException(new ErrorException(
                $error['message'], $error['type'], 0, $error['file'], $error['line']
            ));
        }
    }

    protected function isFatalError($type)
    {
        $errorCodes = [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE];

        return in_array($type, $errorCodes);
    }

}