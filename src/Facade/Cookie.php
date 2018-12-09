<?php

namespace Karamel\Cookie\Facade;
class Cookie
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new \Karamel\Cookie\Cookie();
        return self::$instance;
    }

    public static function set($key, $value, $expire = KM_COOKIE_DEFAULT_EXPIRE, $path = KM_COOKIE_DEFAULT_PATH, $domain = KM_COOKIE_DEFAULT_DOMAIN)
    {
        self::getInstance()->set($key, $value, $expire, $path, $domain);
    }

    public static function get($key, $default = null)
    {
        return self::getInstance()->get($key, $default);
    }

    public static function delete($key)
    {
        return self::getInstance()->delete($key);
    }
}