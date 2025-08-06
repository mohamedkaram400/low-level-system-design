<?php
namespace MohamedKaram\VendingMachine\Interfaces;


interface SignelStateInterface
{
    public function handle($trafficLight, $trafficController, $direction): void;
    public function getName(): string;
}