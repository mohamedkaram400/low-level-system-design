<?php
namespace MohamedKaram\StackOverFlow;

class Tag
{
    public $id;
    public $name;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    } 
}