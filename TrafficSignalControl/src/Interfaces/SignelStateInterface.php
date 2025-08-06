<?php
namespace MohamedKaram\TrafficSignalControl\Interfaces;


interface SignelStateInterface
{
    public function handle($trafficLight, $trafficController, $direction): void;
    public function getName(): string;
}