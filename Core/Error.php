<?php

namespace Core;

/**
 * Error and exception handler
 *
 * PHP version 5.4
 */
class Error
{

    /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
     *
     * @param int $level  Error level
     * @param string $message  Error message
     * @param string $file  Filename the error was raised in
     * @param int $line  Line number in the file
     *
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {  // to keep the @ operator working
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     *
     * @param Exception $exception  The exception
     *
     * @return void
     */
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        if(\App\Config::SHOW_ERRORS){
            $response = [
                'title' => 'Fatal error', 
                'Uncaught exception' => get_class($exception), 
                'Message' => $exception->getMessage(), 
                'Stack trace' => $exception->getTraceAsString(), 
                'Thrown in' => $exception->getFile() . 'on line' . $exception->getLine(), 
            ];

            header('Content-Type: application/json');
            http_response_code($code);
            echo json_encode($response);
        } else {
            $log = dirname(__DIR__).'/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);
            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= "Message: '" . $exception->getMessage() . "'";
            $message .= "Stack trace:" . $exception->getTraceAsString() . "";
            $message .= "Thrown in '" . $exception->getFile() . "' on line " . 
            $exception->getLine() . "";

            error_log($message);
            if($code == 404) {
                $response = "Page not found";
            } else {
                $response = "An error occurred";
            }

            header('Content-Type: application/json');
            http_response_code($code);
            echo json_encode($response);
        }
    }
}
