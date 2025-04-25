<?php
namespace App;

use App\Vehicle;
use App\Enums\VehicleType;

class Car extends Vehicle
{
    public string $license_plate;
    public VehicleType $type;

    public function __construct(string $license_plate)
    {
        $this->license_plate = $license_plate;
        $this->type = VehicleType::Car;
    }
}