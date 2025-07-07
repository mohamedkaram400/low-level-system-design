<?php
namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Enums\VehicleType;

abstract class Vehicle
{
    protected string $licensePlate;
    
    protected VehicleType $type;

    public function __construct(string $licensePlate, VehicleType $type)
    {
        $this->licensePlate = $licensePlate;
        $this->type = $type;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function getType(): VehicleType
    {
        return $this->type;
    }
}
