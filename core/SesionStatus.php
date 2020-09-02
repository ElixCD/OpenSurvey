<?php
namespace Sysurvey;

class SesionStatus{
    static function startSession(){
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    
    static function endSession(){
        if (isset($_SESSION)) {
            session_unset();
            setcookie(session_name(), 0, 1, ini_get("session.cookie_path"));    // Eliminar la cookie
            session_destroy();
        }  
    }
}


?>