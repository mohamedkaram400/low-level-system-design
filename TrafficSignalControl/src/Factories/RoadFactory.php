<?php
namespace MohamedKaram\TrafficSignalControl\Factories;

use MohamedKaram\TrafficSignalControl\Road;
use MohamedKaram\TrafficSignalControl\TrafficLight;
use MohamedKaram\TrafficSignalControl\Enums\Direction;

class RoadFactory
{
    public function createRoad($id, $name, Direction $direction): Road
    {
        return new Road($id, $name, $direction, new TrafficLight($direction->value));
    }
}