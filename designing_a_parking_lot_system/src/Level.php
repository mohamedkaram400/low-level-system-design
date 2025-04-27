<?php

namespace App;

use App\Enums\VehicleType;
use App\ParkingSpot;

class Level
{
    public int $floor_number;
    
    /** @var ParkingSpot[] */
    public array $parking_spots;
    public function __construct($floor_number, $num_spots, VehicleType $vehicle_type)
    {
        $this->floor_number = $floor_number;
        $this->parking_spots = [];

        for ($i = 0; $i < $num_spots; $i++) {
            $this->parking_spots[] = new ParkingSpot($i, $vehicle_type); 
        }
    }

    public function park_vehicle(Vehicle $vehicle): bool
    {
        foreach ($this->parking_spots as $park_spot) {

            if ($park_spot->is_available() && $park_spot->get_vehicle_type() === $vehicle->get_type()) {
                $park_spot->park_vehicle($vehicle);
                return true;
            }
        }
        return false;
    }

    public function unpark_vehicle(Vehicle $vehicle): bool
    {
        foreach ($this->parking_spots as $park_spot) {
            if (!$park_spot->is_available() && $park_spot->get_vehicle_type() == $vehicle->get_type()) {
                $park_spot->unpark_vehicle($vehicle);
                return true;
            }
        }
        return false;
    }

    public function display_availability(): void
    {
        echo "Level {$this->floor_number} Availability:\n";
        foreach ($this->parking_spots as $parking_spot) {
            echo "Spot " . $parking_spot->get_spot_number() . ": ";
            
            // Check if the spot is available and print the status
            if ($parking_spot->is_available()) {
                echo "Available\n";
            } else {
                echo "Occupied\n";
            }
        }
    }
}