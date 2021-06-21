<?php

namespace OurVoice;

class Config
{
    static $Factor;
    static $Module;
    static $ModuleAccess;
    static $Permission;
    static $Question;
    static $Rol;
    static $Rubric;
    static $Survey;
    static $User;
    static $UserRol;
    static $UserSurvey;

    function __construct()
    {
        self::$Factor = "Data\\" . $_ENV['DBTYPE'] . "\\Factor";
        self::$Module = "Data\\" . $_ENV['DBTYPE'] . "\\Module";
        self::$ModuleAccess = "Data\\" . $_ENV['DBTYPE'] . "\\ModuleAccess";
        self::$Permission = "Data\\" . $_ENV['DBTYPE'] . "\\Permission";
        self::$Question = "Data\\" . $_ENV['DBTYPE'] . "\\Question";
        self::$Rol = "Data\\" . $_ENV['DBTYPE'] . "\\Rol";
        self::$Rubric = "Data\\" . $_ENV['DBTYPE'] . "\\Rubric";
        self::$Survey = "Data\\" . $_ENV['DBTYPE'] . "\\Survey";
        self::$User = "Data\\" . $_ENV['DBTYPE'] . "\\User";
        self::$UserRol = "Data\\" . $_ENV['DBTYPE'] . "\\UserRol";
        self::$UserSurvey = "Data\\" . $_ENV['DBTYPE'] . "\\UserSurvey";
    }
}
