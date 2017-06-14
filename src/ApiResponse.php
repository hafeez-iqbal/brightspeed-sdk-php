<?php

namespace BrightSpeed;


class ApiResponse
{
    public $body;
    public $code;
    public $headers;
    public $json;

    private $_message     = null;
    private $_errorCode   = null;
    private $_errorDetail = null;
    private $_errors      = null;
    private $_warnings    = null;

    public function __construct($body, $code, $headers, $json, $url)
    {
        $this->body = $body;
        $this->code = $code;
        $this->headers = $headers;
        $this->json = $json;

        if ($code == 200 && !empty($json)) {
            $this->_message = $json->message;
            if (isset($json->error)) {
                $this->_errorCode = $json->error;
                $this->_errors = $json->errors;
                $this->_errorDetail = implode("\n", $json->errors);
            }
            if (isset($json->warnings)) {
                $this->_warnings = implode("\n", $json->warnings);
            }
        } else {
//            print_r($body);die;
            switch ($code) {
                case 404:
                    $msg = "Invalid request to BrightSpeed (".BrightSpeed::$apiBaseUrl.$url.").  Please check your base URL, or";
                    break;
                default:
                    $msg = "Unexpected error communicating with BrightSpeed (".BrightSpeed::$apiBaseUrl.$url."). If this problem persists,";
            }
            $msg .= " let us know at info@bright-speed.com";

            $msg .= "\n\n(Error Code: $code )";
            throw new \Exception($msg);
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->_errorCode;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /**
     * @return null|string
     */
    public function getErrorDetail()
    {
        return $this->_errorDetail;
    }

    /**
     * @return null|string
     */
    public function getWarnings()
    {
        return $this->_warnings;
    }


}