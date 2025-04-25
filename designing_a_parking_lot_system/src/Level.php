<?php

namespace App;

use App\ParkingSpot;

class Level
{
    public int $number;
    
    /** @var ParkingSpot[] */
    public array $parking_spots;
    public function __construct($number, $num_spots)
    {
        $this->number = $number;
        $this->parking_spots = [];

        for ($i = 0; $i < $num_spots; $i++) {
            $this->parking_spots[] = new ParkingSpot($i); // Assumes ParkingSpot constructor takes spot number as parameter
        }
    }

    public function park_vehicle(Vehicle $vehicle): bool
    {
        foreach ($this->parking_spots as $park_spot) {
            if ($park_spot->is_available() && $park_spot->get_vehicle_type() == $vehicle->get_type()) {
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
        echo "Level {$this->number} Availability:\n";
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