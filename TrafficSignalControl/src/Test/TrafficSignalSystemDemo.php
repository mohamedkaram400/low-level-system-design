<?php
namespace MohamedKaram\TrafficSignalControl\Test;

use MohamedKaram\TrafficSignalControl\Enums\Direction;
use MohamedKaram\TrafficSignalControl\Main\TrafficController;
use MohamedKaram\TrafficSignalControl\Road;
use MohamedKaram\TrafficSignalControl\TrafficLight;

class TrafficSignalSystemDemo
{
    public function run(): void
    {
        $trafficController = TrafficController::getInstance();

        # Create roads
        $trafficController->addRoad(new Road("R1", "Main Street", Direction::EAST, new TrafficLight(Direction::EAST->value)));
        $trafficController->addRoad(new Road("R2", "Broadway", Direction::WEAST, new TrafficLight(Direction::EAST->value)));
        $trafficController->addRoad(new Road("R3", "Park Avenue", Direction::SOUTH, new TrafficLight(Direction::EAST->value)));
        $trafficController->addRoad(new Road("R4", "Elm Street", Direction::NORTH,new TrafficLight(Direction::NORTH->value)));

        $trafficController->start();

    }
}