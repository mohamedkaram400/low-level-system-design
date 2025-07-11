<?php

namespace MohamedKaram\VendingMachine;

use MohamedKaram\VendingMachine\Product;
use MohamedKaram\VendingMachine\VendingMachine;

class VendingMachineDemo
{
    public function run()
    {
        // ✅ Correct Singleton usage
        $vendingMachine = VendingMachine::getVendingMachine();

        $coke = new Product(1, "Coke", 4);
        $pepsi = new Product(2, "Pepsi", 2.5);
        $water = new Product(3, "Water", 1);

        // Make sure inventoryManager is initialized in the VendingMachine constructor
        $vendingMachine->inventoryManager->addProduct($coke, 5);
        $vendingMachine->inventoryManager->addProduct($pepsi, 3);
        $vendingMachine->inventoryManager->addProduct($water, 2);

        // Select a product
        $vendingMachine->selectProduct($coke);
    }
}