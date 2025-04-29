<?php

namespace ParkingLot;
use ParkingLot\Vehicle;
use ParkingLot\VehicleTypes\Car;

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