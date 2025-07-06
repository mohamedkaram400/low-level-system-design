<?php
namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Level;
use MohamedKaram\ParkingLot\Vehicle;

class ParkingLot
{
    private static ?ParkingLot $parking_lot = null;
    
    protected array $levels;

    private function __construct(){}

    private function __clone(): void
    {
        throw new \Exception("Cannot clone a singleton.");
    }

    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
        
    public static function getParkingLot(): ParkingLot
    {
        if (self::$parking_lot == null) {
            self::$parking_lot = new self();
        }
        return self::$parking_lot;
    }

    public function addLevel(Level $leve): void
    {
        $this->levels[] = $leve;
    }

    public function parkVehicle(Vehicle $vehicle): bool
    {
        foreach ($this->levels as $level) {
            if ($level->parkVehicle($vehicle)) {
                return True;
            }
        }
        return false;
    }

    public function unParkVehicle(Vehicle $vehicle): bool
    {
        foreach ($this->levels as $level) {
            if ($level->unParkVehicle($vehicle)) {
                return True;
            }
        }
        return false;
    }

    public function displayAvailability(): void
    {
        foreach ($this->levels as $level) {
            $level->displayAvailability();
        }
    }
}