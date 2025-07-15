<?php
namespace MohamedKaram\VendingMachine\ConcreteStates;

use MohamedKaram\VendingMachine\VendingMachine;
use MohamedKaram\VendingMachine\Interfaces\VendingMachineStateInterface;

class DispenseState implements VendingMachineStateInterface
{
    protected VendingMachine $vendingMachine;

    public function __construct(VendingMachine $vendingMachine)
    {
        $this->vendingMachine = $vendingMachine;
    }

    public function selectProduct($productId): void
    {
        echo "\nProduct already selected. Please collect the dispensed product.\n";
    }

    public function insertCoin($coin): void
    {
        echo "\nPayment already made. Please collect the dispensed product.\n";
    }

    public function insertNote($note): void
    {
        echo "\nPayment already made. Please collect the dispensed product.\n";
    }

    public function dispenseProduct(): void
    {
        $vendingMachine = $this->vendingMachine;

        $vendingMachine->inventoryManager->removeProduct($vendingMachine->selectedProduct->id);
        $vendingMachine->totalPayment -= $vendingMachine->selectedProduct->price;
        echo "\nProduct dispensed: {$vendingMachine->selectedProduct->name}\n";
        $vendingMachine->selectedProduct = null;
        $vendingMachine->setState(new ReturnChangeState($vendingMachine));
    }

    public function returnChange(): void
    {
        echo "\nPlease collect the dispensed product first.\n";
    }
}