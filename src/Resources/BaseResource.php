<?php

namespace jdombroski\DocuSign\Resources;

use jdombroski\DocuSign\ApiRequestor;
use jdombroski\DocuSign\Exceptions\ResourceException;

abstract class BaseResource
{
    protected $map;
    protected $apiRequestor;

    public function __construct(ApiRequestor $apiRequestor)
    {
        $this->apiRequestor = $apiRequestor;
    }

    /**
     * Make a request to the api requestor.
     * @param string $name The name of the request mapping.
     * @param array $pathParameters The parameters to bind to the path.
     * @param array $queryParameters The query parameters.
     * @param array|null $body The request body.
     */
    protected function request($name, $pathParameters = [], $queryParameters = [], $body = null) 
    {
        //  Check for the method in the resource 
        //  map. Throw exception if it does not exist.
        if(!isset($this->map[$name])) {
            throw new ResourceException("Unknown method '{$name}'.");
        }

        $endpoint = $this->map[$name];

        $url = $this->bindPathParameters($endpoint['url'], $pathParameters);

        return $this->apiRequestor->request($endpoint['method'], $url, $queryParameters, $body);
    }

    /**
     * Replace the path parameters in a url with their values.
     * @param string $url The url.
     * @param array $parameters The parameters to bind.
     */
    private function bindPathParameters($url, $parameters = []) 
    {
        foreach($parameters as $var => $val) {
            $url = str_replace('{' . $var . '}', $val, $url);
        }

        return $url;
    }
}