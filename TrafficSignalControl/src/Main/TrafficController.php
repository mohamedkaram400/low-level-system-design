<?php
namespace MohamedKaram\TrafficSignalControl\Main;

use InvalidArgumentException;
use MohamedKaram\TrafficSignalControl\Road;
use MohamedKaram\TrafficSignalControl\Enums\Direction;
use MohamedKaram\TrafficSignalControl\Factories\RoadFactory;

class TrafficController
{
    private static ?TrafficController $trafficController = null;

    private RoadFactory $roadFactory;

    /** @var Road[] */
    private array $roads = [];

    private function __construct(RoadFactory $roadFactory)
    {
        $this->roadFactory = $roadFactory;
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
            self::$trafficController = new self(new RoadFactory());
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
        
        $this->roads[] = $this->roadFactory->createRoad($id, $name, $directionEnum);
    }

    public function start($cycles) 
    {
        for ($i = 0; $i < $cycles; $i++) {
            foreach ($this->roads as $road) {
                $state = $road->getTrafficLight()->getState();
                $state->handle($road->getTrafficLight(), $road->getDirection());
            }
        }
    }
}
