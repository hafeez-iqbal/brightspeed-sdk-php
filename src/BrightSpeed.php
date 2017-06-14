<?php

namespace BrightSpeed;


class BrightSpeed
{
    public static $apiToken = null;
    public static $apiBaseUrl = "https://portalDev.bright-speed.com";

    /**
     * @param mixed $apiToken
     */
    public static function setApiToken($apiToken)
    {
        self::$apiToken = $apiToken;
    }

    /**
     * @param mixed $apiBaseUrl
     */
    public static function setApiBaseUrl($apiBaseUrl)
    {
        self::$apiBaseUrl = $apiBaseUrl;
    }

}