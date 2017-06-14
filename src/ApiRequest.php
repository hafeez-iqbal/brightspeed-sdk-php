<?php

namespace BrightSpeed;


class ApiRequest
{
    private $_apiToken;
    private $_apiBaseUrl;

    public function __construct($apiToken = null, $apiBaseUrl = null)
    {
        $this->_apiToken = (!$apiToken) ? BrightSpeed::$apiToken : $apiToken;
        $this->_apiBaseUrl = (!$apiBaseUrl) ? BrightSpeed::$apiBaseUrl : $apiBaseUrl;
    }


    /**
     * @param string $method
     * @param string $url
     * @param array|null $params
     * @param array|null $headers
     *
     * @return array An array whose first element is an API response and second
     *    element is the API key used to make the request.
     */
    public function request($method, $url, $params = [], $headers = [])
    {
        $response = $this->_curlRequest($method, $url, $params, $headers);
        $json = json_decode($response['body']);
        $resp = new ApiResponse(
            $response['body'],
            $response['code'],
            $response['headers'],
            $json, $url);
        return $resp;
    }

    private function _curlRequest($method, $url, $params, $headers)
    {
        $apiToken = $this->_apiToken;
        $absUrl = $this->_apiBaseUrl.$url;

        if (!$apiToken) {
            $msg = 'No API key provided.  (HINT: set your API key using "BrightSpeed::setApiToken(<API-KEY>)". '
                . 'See https://portal.bright-speed.com/api for details, or email info@bright-speed.com if you have any questions.';
            throw new \Exception($msg);
        }

        $defaultHeaders = [];
        $defaultHeaders['Content-Type'] = 'application/x-www-form-urlencoded';
        $combinedHeaders = array_merge($defaultHeaders, $headers);

        $rawHeaders = [];
        foreach ($combinedHeaders as $header => $value) {
            $rawHeaders[] = $header . ': ' . $value;
        }

        $curlOpts = [];
        $curlOpts[CURLOPT_USERPWD] = $apiToken.":".$apiToken;

        $curlClient = new CurlClient($curlOpts);
        $response = $curlClient->request( $method, $absUrl, $rawHeaders, $params );
        return $response;
    }

}
