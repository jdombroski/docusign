<?php 

namespace jdombroski\DocuSign;

use GuzzleHttp\Client as HttpClient;

class ApiRequestor
{
    /** @var HttpClient */
    protected $client;

    /** @var array */
    protected $headers = [];


    public function __construct()
    {
        //  Set the headers.
        $this->headers = [
            'X-DocuSign-Authentication' => '{"Username":"' . config("docusign.username") . '","Password":"' . config("docusign.password") . '","IntegratorKey":"' . config("docusign.integrator_key") . '"}',
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        //  Initialize client.
        $this->client = new HttpClient([
            'base_uri' => config("docusign.host"),
            "verify"   => false
        ]);

        $this->login();
    }

    /**
     * Log in the api user. 
     * This validates the authentication information for
     * the user and sets the base uri for future requests.
     */
    private function login() 
    {
        $response = $this->request('GET', 'v2/login_information');
        $loginAccounts = $response['loginAccounts'];

        //  Update the base url for requests to be relative to the account.
        if(count($loginAccounts) > 0) {
            $this->client = new HttpClient([
                'base_uri' => $loginAccounts[0]['baseUrl'] . '/',   //  Add trailing slash or account number will be removed.
                "verify"   => false
            ]);
        }
    }

    /**
     * Make an api request.
     * @param string $method The request method.
     * @param string $uri The uri of the request.
     * @param array|null $parameters Any query string parameters.
     * @param array|null $body Any body content for the request.
     */
    public function request($method, $uri, $parameters = null, $body = null) 
    {
        //  Set options.
        $options = [
            'headers' => $this->headers
        ];

        //  Add query.
        if($parameters) {
            $options['query'] = $parameters;
        }

        //  Add body.
        if($body) {
            $options['json'] = $body;
        }

        $response = $this->client->request($method, $uri, $options);
        return $this->decodeResponse($response);
    }

    /**
     * Decode an api response.
     * @param $response
     */
    private function decodeResponse($response) 
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}