<?php
namespace ParkingLot\Enums;

enum VehicleType : string
{
    case Car = 'car';
    case Motorcycle = 'motorcycle';
    case Truck = 'truck';
}