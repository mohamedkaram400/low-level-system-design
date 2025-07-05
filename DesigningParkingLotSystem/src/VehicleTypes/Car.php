<?php
namespace MohamedKaram\ParkingLot\VehicleTypes;

use MohamedKaram\ParkingLot\Vehicle;
use MohamedKaram\ParkingLot\Enums\VehicleType;

class Car extends Vehicle
{
    public string $license_plate;
    public VehicleType $type;

    public function __construct(string $license_plate)
    {
        parent::__construct($license_plate, VehicleType::Car);
    }
}