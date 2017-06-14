<?php

namespace BrightSpeed;


class CurlClient
{
    const DEFAULT_TIMEOUT = 60;
    const DEFAULT_CONNECT_TIMEOUT = 30;

    protected $defaultOptions;
    private $timeout = self::DEFAULT_TIMEOUT;
    private $connectTimeout = self::DEFAULT_CONNECT_TIMEOUT;

    public function __construct($defaultOptions = null)
    {
        $this->defaultOptions = $defaultOptions;
    }


    /**
     * @return null
     */
    public function getDefaultOptions()
    {
        return $this->defaultOptions;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = (int) max($timeout, 0);
        return $this;
    }

    /**
     * @return int
     */
    public function getConnectTimeout()
    {
        return $this->connectTimeout;
    }

    /**
     * @param int $connectTimeout
     */
    public function setConnectTimeout($connectTimeout)
    {
        $this->connectTimeout = (int) max($connectTimeout, 0);
        return $this;
    }

    public function request($method, $absUrl, $headers, $params)
    {
        $curl = curl_init();
        $method = strtolower($method);

        $opts = [];
        if (is_array($this->defaultOptions)) {
            $opts = $this->defaultOptions;
        }

        if ($method == 'get') {
            $opts[CURLOPT_HTTPGET] = 1;
            if (count($params) > 0) {
                $encoded = self::_encode($params);
                $absUrl = "$absUrl?$encoded";
            }
        } elseif ($method == 'post') {
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = self::_encode($params);
        } else {
            throw new \Exception("Unrecognized method $method");
        }

        // Create a callback to capture HTTP headers for the response
        $rheaders = array();
        $headerCallback = function ($curl, $header_line) use (&$rheaders) {
            // Ignore the HTTP request line (HTTP/1.1 200 OK)
            if (strpos($header_line, ":") === false) {
                return strlen($header_line);
            }
            $headersArr = explode(":", trim($header_line), 2);
            $key = $headersArr[0];
            $value = $headersArr[1];

            $rheaders[trim($key)] = trim($value);
            return strlen($header_line);
        };

        $opts[CURLOPT_URL] = $absUrl;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_CONNECTTIMEOUT] = $this->connectTimeout;
        $opts[CURLOPT_TIMEOUT] = $this->timeout;
        $opts[CURLOPT_HEADERFUNCTION] = $headerCallback;
        $opts[CURLOPT_HTTPHEADER] = $headers;
        $opts[CURLOPT_SSL_VERIFYPEER] = false;

        curl_setopt_array($curl, $opts);
        $rbody = curl_exec($curl);

        if ($rbody === false) {
            $errno = curl_errno($curl);
            $message = curl_error($curl);
            curl_close($curl);
            $this->_handleCurlError($absUrl, $errno, $message);
        }

        $rcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return ['body' => $rbody, 'code' => $rcode, 'headers' => $rheaders];
    }

    /**
     * @param $url
     * @param $errno
     * @param $message
     * @throws \Exception
     */
    private function _handleCurlError($url, $errno, $message)
    {
        switch ($errno) {
            case CURLE_COULDNT_CONNECT:
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_OPERATION_TIMEOUTED:
                $msg = "Could not connect to BrightSpeed ($url).  Please check your internet connection and try again, or";
                break;
            case 404:
                $msg = "Invalid request to BrightSpeed ($url).  Please check your base URL, or";
                break;
            default:
                $msg = "Unexpected error communicating with BrightSpeed. If this problem persists,";
        }
        $msg .= " let us know at info@bright-speed.com";

        $msg .= "\n\n(Network error [errno $errno]: $message)";
        throw new \Exception($msg);
    }

    /**
     * @param array $arr An map of param keys to values.
     * @param string|null $prefix
     * @return string, querystring
     */
    private static function _encode($arr, $prefix = null)
    {
        if (!is_array($arr)) {
            return $arr;
        }

        $r = array();
        foreach ($arr as $k => $v) {
            if (is_null($v)) {
                continue;
            }

            if ($prefix) {
                if ($k !== null && (!is_int($k) || is_array($v))) {
                    $k = $prefix."[".$k."]";
                } else {
                    $k = $prefix."[]";
                }
            }

            if (is_array($v)) {
                $enc = self::_encode($v, $k);
                if ($enc) {
                    $r[] = $enc;
                }
            } else {
                $r[] = urlencode($k)."=".urlencode($v);
            }
        }

        return implode("&", $r);
    }
}
