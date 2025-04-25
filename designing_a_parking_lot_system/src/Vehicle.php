<?php
namespace App;

use App\Enums\VehicleType;

abstract class Vehicle
{
    public string $license_plate;
    public VehicleType $type;

    public function __construct($license_plate, $type)
    {
        $this->license_plate = $license_plate;
        $this->type = $type;
    }
    public function get_type(): VehicleType
    {
        return $this->type;
    }
}