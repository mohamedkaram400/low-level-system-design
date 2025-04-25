<?php
namespace App;

use App\Vehicle;
use App\Enums\VehicleType;

class ParkingSpot
{
    public int $spot_number;
    public VehicleType $vehicle_type = VehicleType::Car;
    public ?Vehicle $parked_vehicle;

    public function __construct($spot_number)
    {
        $this->vehicle_type = VehicleType::Car;
        $this->spot_number = $spot_number;
        $this->parked_vehicle = null;
    }

    public function is_available() : bool 
    {
        return $this->parked_vehicle == null;
    }

    public function park_vehicle(Vehicle $vehicle): void
    {
        if ($this->is_available() && $vehicle->get_type() == $this->get_vehicle_type()) {
            $this->parked_vehicle = $vehicle;
        }
    }

    public function unpark_vehicle(Vehicle $vehicle): void
    {
        if (!$this->is_available() && $vehicle->get_type() == $this->get_vehicle_type()) {
            $this->parked_vehicle = null;
        }
        
    }

    public function get_parked_vehicle() : Vehicle 
    {
        return $this->parked_vehicle;
    }
    public function get_vehicle_type() : VehicleType 
    {
        return $this->vehicle_type;
    }
    public function get_spot_number() : int 
    {
        return $this->spot_number;
    }
}