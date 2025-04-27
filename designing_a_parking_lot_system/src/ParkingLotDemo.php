<?php

namespace App;

use App\Level;
use App\ParkingLot;
use App\VehicleFactory;
use App\Enums\VehicleType;

class ParkingLotDemo
{
    public function run()
    {
        $parking_lot = ParkingLot::get_parking_lot();
        var_dump($parking_lot);
        $parking_lot->add_level(new Level(1, 5, VehicleType::Car));
        $parking_lot->add_level(new Level(2, 4, VehicleType::Motorcycle));
        $parking_lot->add_level(new Level(3, 4, VehicleType::Truck));

        $type = readline("Enter vehicle type (car, motorcycle, truck): ");
        $license_plate = readline("Enter vehicle license plate: ");

        try {
            $vehicle = VehicleFactory::createVehicle($type, $license_plate);
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            return;
        }

        if ($parking_lot->park_vehicle($vehicle)) {
            echo "Vehicle parked successfully!" . PHP_EOL;
        } else {
            echo "No available spot for this vehicle type." . PHP_EOL;
        }

        $parking_lot->display_availability();
    }
}
