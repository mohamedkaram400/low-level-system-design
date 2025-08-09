<?php
namespace MohamedKaram\TrafficSignalControl\Main;

use MohamedKaram\TrafficSignalControl\Road;

class TrafficController
{
    public static ?TrafficController $trafficController = null;

    /** @var Road[] */
    private array $roads = [];

    private function __construct()
    {
    }

    private function __clone(): void
    {
        throw new \Exception("Cannot clone a singleton.");
    }

    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }  

    public static function getInstance(): TrafficController
    {
        if (self::$trafficController == null) {
            self::$trafficController = new self();
        }
        return self::$trafficController;
    }

    public function addRoad(Road $road): void 
    {
        $this->roads[] = $road;
    }

    public function start(): void 
    {
        while (true) {
            foreach ($this->roads as $road) {
                $state = $road->getTrafficLight()->getState();
                $state->handle($road->getTrafficLight(), $road->getDirection());
            }
        }
    }
}