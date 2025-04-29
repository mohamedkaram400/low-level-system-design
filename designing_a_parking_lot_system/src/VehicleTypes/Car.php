<?php
namespace ParkingLot\VehicleTypes;

use ParkingLot\Vehicle;
use ParkingLot\Enums\VehicleType;

class Car extends Vehicle
{
    public string $license_plate;
    public VehicleType $type;

    public function __construct(string $license_plate)
    {
        parent::__construct($license_plate, VehicleType::Car);
    }
}