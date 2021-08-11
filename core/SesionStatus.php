<?php
namespace OurVoice;

class SesionStatus{
    static function startSession(){
        // session_start();
        if (isset($_SESSION['user'])) {
            session_start();
        }
    }

    static function sessionStarted() : bool{
        session_start();
        if (isset($_SESSION['user'])) {
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

    
    static function EndSession(){
        if (self::sessionStarted()) {
            session_unset();
            setcookie(session_name(), 0, 1, ini_get("session.cookie_path"));    // Eliminar la cookie
            session_destroy();
        }  
    }
}


?>