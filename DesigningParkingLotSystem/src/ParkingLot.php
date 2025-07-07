<?php
namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Level;
use MohamedKaram\ParkingLot\Vehicle;

class ParkingLot
{
    private static ?ParkingLot $parkingLot = null;
    
    protected array $levels;

    private array $registeredVehicles = [];

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
        if (self::$parkingLot == null) {
            self::$parkingLot = new self();
        }
        return self::$parkingLot;
    }

    public function addLevel(Level $leve): void
    {
        $this->levels[] = $leve;
    }

    public function parkVehicle(Vehicle $vehicle): bool
    {
        $plate = $vehicle->getLicensePlate();

        if (isset($this->registeredVehicles[$plate])) {
            echo "❌ Vehicle with license plate '{$plate}' is already parked.\n";
            return false;
        }

        foreach ($this->levels as $level) {
            if ($level->parkVehicle($vehicle)) {
                $this->registeredVehicles[$plate] = $vehicle;
                return True;
            }
        }
        return false;
    }

    public function unParkVehicle(Vehicle $vehicle): bool
    {
        $plate = $vehicle->getLicensePlate();

        foreach ($this->levels as $level) {
            if ($level->unParkVehicle($vehicle)) {
                unset($this->registeredVehicles[$plate]);
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

    public function getRegisteredVehicles(): array
    {
        return $this->registeredVehicles;
    }
}