<?php

namespace MohamedKaram\ParkingLot;

use MohamedKaram\ParkingLot\Level;
use MohamedKaram\ParkingLot\ParkingLot;
use MohamedKaram\ParkingLot\VehicleFactory;
use MohamedKaram\ParkingLot\Enums\VehicleType;

class ParkingLotDemo
{
    public function run(): void
    {
        $parking_lot = ParkingLot::getParkingLot();
        $parking_lot->addLevel(new Level(1, 5, VehicleType::Car));
        $parking_lot->addLevel(new Level(2, 4, VehicleType::Motorcycle));
        $parking_lot->addLevel(new Level(3, 4, VehicleType::Truck));

        $type = readline("Enter vehicle type (car, motorcycle, truck): ");
        $license_plate = readline("Enter vehicle license plate: ");

        try {
            $vehicle = VehicleFactory::createVehicle($type, $license_plate);
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            return;
        }

        if ($parking_lot->parkVehicle($vehicle)) {
            echo "Vehicle parked successfully!" . PHP_EOL;
        } else {
            echo "No available spot for this vehicle type." . PHP_EOL;
        }

        $parking_lot->displayAvailability();
    }
}
