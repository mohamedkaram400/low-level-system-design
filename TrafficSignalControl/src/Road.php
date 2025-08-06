<?php
namespace MohamedKaram\TrafficSignalControl;

class Road
{
    protected $id;
    protected $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}