<?php
namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Vehicle;
use MohamedKaram\ParkingLot\Enums\VehicleType;

class ParkingSpot
{
    public int $spotNumber;
    public VehicleType $vehicleType;
    public ?Vehicle $parkedVehicle;

    public function __construct(int $spotNumber, VehicleType $vehicleType)
    {
        $this->vehicleType = $vehicleType;
        $this->spotNumber = $spotNumber;
        $this->parkedVehicle = null;
    }

    public function isAvailable() : bool 
    {
        return $this->parkedVehicle == null;
    }

    public function parkVehicle(Vehicle $vehicle): void
    {
        if ($this->isAvailable() && $vehicle->getType() === $this->getVehicleType()) {
            $this->parkedVehicle = $vehicle;
        }
    }

    public function unParkVehicle(Vehicle $vehicle): void
    {
        if (!$this->isAvailable() && $vehicle->getType() == $this->getVehicleType()) {
            $this->parkedVehicle = null;
        }
        
    }

    public function getParkedVehicle() : Vehicle 
    {
        return $this->parkedVehicle;
    }
    
    public function getVehicleType() : VehicleType 
    {
        return $this->vehicleType;
    }

    public function getSpotNumber() : int  
    {
        return $this->spotNumber;
    }
}