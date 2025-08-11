<?php
namespace MohamedKaram\TrafficSignalControl\ConcreteStates;

use MohamedKaram\TrafficSignalControl\Interfaces\SignalStateInterface;


class GreenState implements SignalStateInterface
{
    public function handle($trafficLight, $direction): void
    {
        echo "Direction {$direction->value} is GREEN\n";
        sleep($trafficLight->getDuration('green'));
        $trafficLight->setState(new YellowState());
    }
}