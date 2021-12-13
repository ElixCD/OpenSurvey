<?php

namespace OurVoice;

abstract class ComponentBase
{
    protected static $ViewFile = "";
    protected $NewType = "";
    protected $Dir = "";

    public function __construct()
    {
      
        $complete = get_class($this);
        $parts = explode('\\', $complete);
        $this->NewType = end($parts);

        $self = trim($_SERVER['PHP_SELF'], '/');
        $self  = explode('/', $self)[0];
        
        $filename = trim($_SERVER['SCRIPT_FILENAME']);

        $this->Dir = strstr($filename, $self, true);
        $this->Dir = $this->Dir.$self."\\components\\".$this->NewType."\\".$this->NewType. ".layout.php";

        $this->init();
    }

    abstract public function init();
    abstract public function drawComponent();

    public function readView()
    {
        // echo $this->NewType . "<br />";
        // echo __DIR__  . "<br />";

        // echo $this->Dir . "<br />";
        // echo $this->Dir . "/" . $this->NewType . ".layout.php";


        // echo "<pre>";
        // print_r($this->Dir[0]."/components/".$this->NewType);
        // echo "</pre>";

        
        // $path = "/".$this->Dir[0]."/components/".$this->NewType."/".$this->NewType. ".layout.php";
        //  echo $this->Dir;

        //  include_once $this->Dir;

        // $layout = file_get_contents($this->Dir);
        // echo $layout;
    }
}
