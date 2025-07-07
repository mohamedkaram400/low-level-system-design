<?php

namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Vehicle;
use MohamedKaram\ParkingLot\VehicleTypes\Car;
use MohamedKaram\ParkingLot\VehicleTypes\Truck;
use MohamedKaram\ParkingLot\VehicleTypes\Motorcycle;

class VehicleFactory
{
    public static function createVehicle(string $type, string $licensePlate): Vehicle
    {
        return match (strtolower($type)) {
            'car' => new Car($licensePlate),
            'truck' => new Truck($licensePlate),
            'motorcycle' => new Motorcycle($licensePlate),
            default => throw new \Exception("Invalid vehicle type: $type"),
        };
    }
}