<?php
// session_start();

class Session {
    public static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function flash($key, $value = null) {
        if ($value) {
            $_SESSION[$key] = $value;
        } else {
            if (isset($_SESSION[$key])) {
                $flash = $_SESSION[$key];
                unset($_SESSION[$key]);
                return $flash;
            }
        }
        return null;
    }

    public static function remove($key) {
        unset($_SESSION[$key]);
    }

    public static function removeAll() {
        session_unset();
    }

    public static function getAll() {
        return $_SESSION;
    }

    public static function check($key) {
        return isset($_SESSION[$key]);
    }
}