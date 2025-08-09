<?php
namespace MohamedKaram\TrafficSignalControl;

use MohamedKaram\TrafficSignalControl\Enums\Direction;

class Road
{
    protected string $id;
    protected string $name;
    protected Direction $direction;
    protected TrafficLight $trafficLight;

    public function __construct($id, $name, $direction, $trafficLight)
    {
        $this->id = $id;
        $this->name = $name;
        $this->direction = $direction;
        $this->trafficLight = $trafficLight;
    }

    public function getTrafficLight(): TrafficLight
    {
        return $this->trafficLight;
    }

    public function getDirection()
    {
        return $this->direction;
    }
}