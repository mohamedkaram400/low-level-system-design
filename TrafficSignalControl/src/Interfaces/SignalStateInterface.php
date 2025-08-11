<?php
namespace MohamedKaram\TrafficSignalControl\Interfaces;


interface SignalStateInterface
{
    public function handle($trafficLight, $direction): void;
}