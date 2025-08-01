<?php

namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\ParkingSpot;
use MohamedKaram\ParkingLot\Enums\VehicleType;

class Level
{
    public int $floorNumber;
    
    /** @var ParkingSpot[] */
    public array $parking_spots;
    public function __construct(int $floorNumber, int $num_spots, VehicleType $vehicleType)
    {
        $this->floorNumber = $floorNumber;
        $this->parking_spots = [];

        for ($i = 0; $i < $num_spots; $i++) {
            $this->parking_spots[] = new ParkingSpot($i, $vehicleType); 
        }
    }

    public function parkVehicle(Vehicle $vehicle): bool
    {
        foreach ($this->parking_spots as $park_spot) {

            if ($park_spot->isAvailable() && $park_spot->getVehicleType() === $vehicle->getType()) {
                $park_spot->parkVehicle($vehicle);
                return true;
            }
        }
        return false;
    }

    public function unParkVehicle(Vehicle $vehicle): bool
    {
        foreach ($this->parking_spots as $park_spot) {
            if (!$park_spot->isAvailable() && $park_spot->getVehicleType() == $vehicle->getType()) {
                $park_spot->unParkVehicle($vehicle);
                return true;
            }
        }
        return false;
    }

    public function displayAvailability(): void
    {
        echo "Level {$this->floorNumber} Availability:\n";
        foreach ($this->parking_spots as $parking_spot) {
            echo "Spot " . $parking_spot->getSpotNumber() . ": ";
            
            // Check if the spot is available and print the status
            if ($parking_spot->isAvailable()) {
                echo "Available\n";
            } else {
                echo "Occupied\n";
            }
        }
    }
}