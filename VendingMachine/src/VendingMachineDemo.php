<?php

namespace MohamedKaram\VendingMachine;

use MohamedKaram\VendingMachine\Product;
use MohamedKaram\VendingMachine\Enums\CoinEnum;
use MohamedKaram\VendingMachine\Enums\NoteEnum;
use MohamedKaram\VendingMachine\VendingMachine;

class VendingMachineDemo
{
    public function run()
    {
        // ✅ Correct Singleton usage
        $vendingMachine = VendingMachine::getVendingMachine();

        # Add products to the inventory
        $coke = new Product(1, "Coke", 4);
        $pepsi = new Product(2, "Pepsi", 2.5);
        $water = new Product(3, "Water", 1);
        $chips = new Product(4, "Chips", 5.0);

        $vendingMachine->inventoryManager->addProduct($coke, 15);
        $vendingMachine->inventoryManager->addProduct($pepsi, 20);
        $vendingMachine->inventoryManager->addProduct($water, 10);
        $vendingMachine->inventoryManager->addProduct($chips, 5);

        # Select a product
        $vendingMachine->selectProduct($coke);

        # Insert coins
        // $vendingMachine->insertCoin(CoinEnum::QUARTER->value);
        // $vendingMachine->insertCoin(CoinEnum::QUARTER->value);
        
        # Insert a note
        $vendingMachine->insertNote(NoteEnum::TWENTY->value);
        $vendingMachine->insertNote(NoteEnum::TWENTY->value);

        # Dispense the product
        $vendingMachine->dispenseProduct();

        # Return change
        $vendingMachine->returnChange();

        # Remove a product
        $vendingMachine->inventoryManager->removeProduct(1);
    }
}