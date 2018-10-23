<?php

namespace jdombroski\DocuSign\Apis;

use jdombroski\DocuSign\Exceptions\ApiException;

abstract class BaseApi 
{
    public function __call($method, $args) {

        //  Check that the resource is present for the 
        //  api. If it is not present, throw an exception.
        if(!isset($this->resources[$method])) {
            throw new ApiException("Resource {$method} is not present for the " . static::class . " api.");
        }

        //  Instantiate a new resource if this 
        //  is the first time it has been called.
        if(!isset($this->$method)) {
            $resource = $this->resources[$method];
            $this->$method = resolve($resource);
        }

        return $this->$method;
    }
}