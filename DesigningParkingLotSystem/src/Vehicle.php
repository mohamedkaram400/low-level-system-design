<?php
namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Enums\VehicleType;

abstract class Vehicle
{
    protected string $license_plate;
    protected VehicleType $type;

    public function __construct(string $license_plate, VehicleType $type)
    {
        $this->license_plate = $license_plate;
        $this->type = $type;
    }

    public function get_license_plate(): string
    {
        return $this->license_plate;
    }

    public function get_type(): VehicleType
    {
        return $this->type;
    }
}
