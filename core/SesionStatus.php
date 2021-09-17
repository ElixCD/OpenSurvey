<?php
namespace OurVoice;

class SesionStatus{
    static function startSession($name){
        // session_start();
        if (isset($_SESSION[$name])) {
            session_start();
        }
    }

    static function sessionStarted($name) : bool{
        session_start();
        if (isset($_SESSION[$name])) {
            return true;
        }
        else{
            return false;
        }
    }

    static function CreateSession($name, $value) : void {
        session_start();
        $_SESSION[$name] = $value;
    }

    static function GetSessionData($name) {
        session_start();
        return $_SESSION[$name];
    }

    
    static function EndSession($name){
        if (self::sessionStarted($name)) {
            session_unset();
            setcookie(session_name(), 0, 1, ini_get("session.cookie_path"));    // Eliminar la cookie
            session_destroy();
        }  
    }
}


?>