<?php 

namespace jdombroski\DocuSign;

use GuzzleHttp\Client;
use jdombroski\DocuSign\Exceptions\ApiException;
use jdombroski\DocuSign\Apis\EnvelopesApi;

/**
 * @method EnvelopesApi envelopes
 */
class DocuSign
{

    protected $apis = [
        'envelopes' => EnvelopesApi::class
    ];

    function __construct()
    {
        //
    }

    public function __call($method, $args) {

        //  Check that the api exists. If 
        //  it is does not exist, throw an exception.
        if(!isset($this->apis[$method])) {
            throw new ApiException("Api {$method} does not exist.");
        }

        //  Instantiate a new api if this 
        //  is the first time it has been called.
        if(!isset($this->$method)) {
            $api = $this->apis[$method];
            $this->$method = new $api;
        }

        return $this->$method;
    }
}