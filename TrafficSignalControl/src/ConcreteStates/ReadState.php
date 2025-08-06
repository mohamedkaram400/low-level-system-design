<?php
namespace MohamedKaram\TrafficSignalControl\ConcreteStates;

use MohamedKaram\TrafficSignalControl\Interfaces\SignelStateInterface;


class ReadState implements SignelStateInterface
{
    public function handle($trafficLight, $trafficController, $direction): void
    {

    }

    public function getName(): string
    {
        return 'read state';
    }
}