<?php
namespace MohamedKaram\TrafficSignalControl\Test;

use MohamedKaram\TrafficSignalControl\Main\TrafficController;
use MohamedKaram\TrafficSignalControl\Road;

class TrafficSignalSystemDemo
{
    public function run(): void
    {
        $trafficController = TrafficController::getInstance();

        # Create roads
        $road1 = new Road("R1", "Main Street");
        $road2 = new Road("R2", "Broadway");
        $road3 = new Road("R3", "Park Avenue");
        $road4 = new Road("R4", "Elm Street");

    }
}