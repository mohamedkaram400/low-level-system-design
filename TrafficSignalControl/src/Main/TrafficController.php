<?php
namespace MohamedKaram\TrafficSignalControl\Main;

use MohamedKaram\TrafficSignalControl\Road;


class TrafficController
{
    public static ?TrafficController $trafficController = null;

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

    public function addRoad($road)	
    {
        $roadData = new Road($road->id, $road->name);
    }
}