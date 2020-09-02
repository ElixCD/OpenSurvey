<?php
namespace Sysurvey;

class Factores
{
    private $factores = [];
    
    static function getFactores()
    {
        $factores =  ['factor 1', 'factor 2', 'factor 3',$_ENV['S3_BUCKET'],$_ENV['SECRET_KEY'] ];
        return $factores;
    }
}
