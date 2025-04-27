<?php
namespace App;

use App\Level;
use App\Vehicle;

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
        
    public static function get_parking_lot(): ParkingLot
    {
        if (self::$parking_lot == null) {
            self::$parking_lot = new self();
        }
        return self::$parking_lot;
    }

    public function add_level(Level $leve): void
    {
        $this->levels[] = $leve;
    }

    public function park_vehicle(Vehicle $vehicle): bool
    {
        foreach ($this->levels as $level) {
            var_dump($vehicle, $level->park_vehicle($vehicle));
            if ($level->park_vehicle($vehicle)) {
                return True;
            }
        }
        return false;
    }

    public function unpark_vehicle(Vehicle $vehicle): bool
    {
        foreach ($this->levels as $level) {
            if ($level->unpark_vehicle($vehicle)) {
                return True;
            }
        }
        return false;
    }

    public function display_availability(): void
    {
        foreach ($this->levels as $level) {
            $level->display_availability();
        }
    }
}