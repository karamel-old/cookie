<?php

namespace Karamel\Cookie;
class Cookie
{
    public function set($key, $value, $expire = KM_COOKIE_DEFAULT_EXPIRE, $path = KM_COOKIE_DEFAULT_PATH, $domain = KM_COOKIE_DEFAULT_DOMAIN)
    {
        $value = (new \Karamel\Encrypt\Encrypt(KM_COOKIE_DEFAULT_KEY))->encrypt($value);
        setcookie($key, $value, time() + $expire, $path, $domain);
    }

    public function get($key, $default = null)
    {
        if (!isset($_COOKIE[$key]))
            return $default;

        return (new \Karamel\Encrypt\Encrypt(KM_COOKIE_DEFAULT_KEY))->decrypt($_COOKIE[$key]);
    }

    public function delete($key)
    {
        setcookie($key, null, -1);
    }
}