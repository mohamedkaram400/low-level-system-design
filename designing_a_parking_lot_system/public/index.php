<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Car;
use App\Level;
use App\ParkingLot;

class ParkingLotDemo
{
    public function run()
    {
        $parking_lot = ParkingLot::get_parking_lot();
        $parking_lot->add_level(new Level(1, 5));
        $parking_lot->add_level(new Level(2, 4));
        $parking_lot->add_level(new Level(3, 4));

        $car1 = new Car('QAZwsx123');
        $car2 = new Car('YHNedc567');

        # Park vehicles
        $parking_lot->park_vehicle($car1);
        $parking_lot->park_vehicle($car2);
        // $parking_lot->park_vehicle(truck);
        // $parking_lot->park_vehicle(motorcycle);

        // # Display availability
        $parking_lot->display_availability();

        // # Unpark vehicle
        $parking_lot->unpark_vehicle($car1);

        // # Display updated availability
        $parking_lot->display_availability();
  
    }
}

$lot = new ParkingLotDemo();
echo $lot->run();