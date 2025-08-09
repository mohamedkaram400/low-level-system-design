<?php
namespace MohamedKaram\TrafficSignalControl\ConcreteStates;

use MohamedKaram\TrafficSignalControl\Interfaces\SignalStateInterface;


class YellowState implements SignalStateInterface
{
    public function handle($trafficLight, $direction): void
    {
        echo "Direction {$direction->value} is Yellow\n";
        sleep($trafficLight->getDuration('yellow'));
        $trafficLight->setState(new RedState());
    }

    public function getName(): string
    {
        return 'yellow state';
    }
}