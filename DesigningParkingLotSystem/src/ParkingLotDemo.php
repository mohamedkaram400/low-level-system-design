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
        $parkingLot = ParkingLot::getParkingLot();
        $parkingLot->addLevel(new Level(1, 5, VehicleType::Car));
        $parkingLot->addLevel(new Level(2, 4, VehicleType::Motorcycle));
        $parkingLot->addLevel(new Level(3, 4, VehicleType::Truck));


        while (true) {
            echo "\n--- Parking Lot Menu ---\n";
            echo "1. Park a vehicle\n";
            echo "2. Unpark a vehicle\n";
            echo "3. Show availability\n";
            echo "4. Exit\n";

            $choice = readline("Choose an option (1-4): ");

            match ($choice) {
                '1' => $this->parkVehicleFlow($parkingLot),
                '2' => $this->unparkVehicleFlow($parkingLot),
                '3' => $parkingLot->displayAvailability(),
                '4' => exit("Exiting the parking system. 👋\n"),
                default => print("Invalid option. Try again.\n")
            };
        }

        // Loop to park multiple vehicles
        while (true) {
            


            $continue = strtolower(readline("Do you want to park another vehicle? (yes/no): "));
            if ($continue !== 'yes') {
                echo "Exiting the parking system. 👋\n";
                break;
            }
        }
    }

    private function parkVehicleFlow($parkingLot)
    {
        $type = readline("Enter vehicle type (car, motorcycle, truck): ");
        $licensePlate = readline("Enter vehicle license plate: ");

        try {
            $vehicle = VehicleFactory::createVehicle($type, $licensePlate);
        } catch (\Exception $e) {
            echo "❌ " . $e->getMessage() . PHP_EOL;
            return;
        }

        if ($parkingLot->parkVehicle($vehicle)) {
            echo "✅ Vehicle parked successfully!\n";
        } else {
            echo "❌ No available spot or duplicate plate.\n";
        }
    }

    private function unparkVehicleFlow($parkingLot)
    {
        $licensePlate = readline("Enter vehicle license plate: ");

        // Check if vehicle is in registry
        $registeredVehicles = $parkingLot->getRegisteredVehicles();
        
        if (!isset($registeredVehicles[$licensePlate])) {
            echo "❌ No vehicle found with license plate '$licensePlate'.\n";
            return;
        }
    
        $vehicle = $registeredVehicles[$licensePlate];

        if ($parkingLot->unparkVehicle($vehicle)) {
            echo "✅ Vehicle unparked successfully!\n";
        } else {
            echo "❌ Failed to unpark the vehicle.\n";
        }
    }
}
