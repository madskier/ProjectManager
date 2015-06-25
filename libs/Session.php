<?php

class Session
{
    public static function startSession()
    {
        @session_start();
    }
    
    public static function endSession()
    {
        //unset($_SESSION);
        session_destroy();
    }
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }        
    }
}

