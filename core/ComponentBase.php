<?php

namespace OurVoice;

abstract class ComponentBase
{
    static $ViewFile = "";
    private $NewType = "";
    private $Dir = "";

    public function __construct()
    {
        $complete = get_class($this);
        $parts = explode('\\', $complete);
        $this->NewType = end($parts);
        $this->init();
    }

    abstract public function init();
    abstract public function drawComponent();

    public function readView()
    {
        echo $this->NewType . "<br />";
        echo $this->Dir . "<br />";
        echo $this->Dir . "/" . $this->NewType . ".layout.php";
    }
}
