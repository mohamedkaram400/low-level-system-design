<?php
namespace App\VehicleTypes;

use App\Vehicle;
use App\Enums\VehicleType;

class Car extends Vehicle
{
    public string $license_plate;
    public VehicleType $type;

    public function __construct(string $license_plate)
    {
        parent::__construct($license_plate, VehicleType::Car);
    }
}