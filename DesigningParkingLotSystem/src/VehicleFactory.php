<?php

namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Vehicle;
use MohamedKaram\ParkingLot\VehicleTypes\Car;

class VehicleFactory
{
    public static function createVehicle(string $type, string $license_plate): Vehicle
    {
        return match (strtolower($type)) {
            'car' => new Car($license_plate),
            // 'motorcycle' => new Motorcycle(),
            // 'truck' => new Truck(),
            default => throw new \Exception("Invalid vehicle type: $type"),
        };
    }
}