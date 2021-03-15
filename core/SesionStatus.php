<?php
namespace Sysurvey;

class SesionStatus{
    static function startSession(){
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    static function sessionStarted() : bool{
        if (isset($_SESSION)) {
            return true;
        }
        else{
            return false;
        }
    }
    
    static function endSession(){
        if (self::sessionStarted()) {
            session_unset();
            setcookie(session_name(), 0, 1, ini_get("session.cookie_path"));    // Eliminar la cookie
            session_destroy();
        }  
    }
}


?>