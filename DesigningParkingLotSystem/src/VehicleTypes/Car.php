<?php
namespace MohamedKaram\ParkingLot\VehicleTypes;

use MohamedKaram\ParkingLot\Vehicle;
use MohamedKaram\ParkingLot\Enums\VehicleType;

class Car extends Vehicle
{
    public string $licensePlate;
    public VehicleType $type;

    public function __construct(string $licensePlate)
    {
        parent::__construct($licensePlate, VehicleType::Car);
    }
}