<?php
namespace MohamedKaram\TrafficSignalControl\Test;

use MohamedKaram\TrafficSignalControl\Main\TrafficController;

class TrafficSignalSystemDemo
{
    public function run(): void
    {
        $trafficController = TrafficController::getInstance();

        # Create roads
        $trafficController->addRoad("R1", "Main Street", 'east');
        $trafficController->addRoad("R1", "Main Street", 'west');
        $trafficController->addRoad("R1", "Main Street", 'south');
        $trafficController->addRoad("R1", "Main Street", 'north');

        $trafficController->start(5);

    }
}