<?php

namespace jdombroski\DocuSign\Exceptions;

use Exception;

class ApiException extends Exception 
{
    public function __construct($message = "", $code = 0, $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
    }
}