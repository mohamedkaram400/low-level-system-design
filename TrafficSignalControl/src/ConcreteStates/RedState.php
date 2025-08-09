<?php
namespace MohamedKaram\TrafficSignalControl\ConcreteStates;

use MohamedKaram\TrafficSignalControl\Interfaces\SignalStateInterface;


class RedState implements SignalStateInterface
{
    public function handle($trafficLight, $direction): void
    {
        echo "Direction {$direction->value} is Red\n";
        sleep($trafficLight->getDuration('red'));
        $trafficLight->setState(new GreenState());
    }

    public function getName(): string
    {
        return 'read state';
    }
}