<?php
namespace MohamedKaram\TrafficSignalControl\Main;

use InvalidArgumentException;
use MohamedKaram\TrafficSignalControl\Road;
use MohamedKaram\TrafficSignalControl\TrafficLight;
use MohamedKaram\TrafficSignalControl\Enums\Direction;

class TrafficController
{
    public static ?TrafficController $trafficController = null;

    /** @var Road[] */
    private array $roads = [];

    private function __construct()
    {
        // 
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

    public function addRoad($id, $name, $direction): void 
    {
        $directionEnum = match($direction) {
            'north' => Direction::NORTH,
            'south' => Direction::SOUTH,
            'east'  => Direction::EAST,
            'west'  => Direction::WEST,
            default => throw new InvalidArgumentException("Invalid direction: $direction"),
        };
        
        $this->roads[] = new Road(
            $id, 
            $name, 
            $directionEnum, 
            new TrafficLight($directionEnum->value)
        );
    }

    public function start() 
    {
        while (true) {
            foreach ($this->roads as $road) {
                $state = $road->getTrafficLight()->getState();
                $state->handle($road->getTrafficLight(), $road->getDirection());
            }
        }
    }
}
