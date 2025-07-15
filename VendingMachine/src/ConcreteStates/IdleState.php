<?php
namespace MohamedKaram\VendingMachine\ConcreteStates;

use MohamedKaram\VendingMachine\VendingMachine;
use MohamedKaram\VendingMachine\ConcreteStates\AwitingPaymentState;
use MohamedKaram\VendingMachine\Exception\ProductNotFoundException;
use MohamedKaram\VendingMachine\Interfaces\VendingMachineStateInterface;

class IdleState implements VendingMachineStateInterface
{
    protected VendingMachine $vendingMachine;

    public function __construct(VendingMachine $vendingMachine)
    {
        $this->vendingMachine = $vendingMachine;
    }

    public function selectProduct($productId): void
    {
        try {
            $this->vendingMachine->selectedProduct = $this->vendingMachine->inventoryManager->getProduct($productId);
            $this->vendingMachine->setState(new AwitingPaymentState($this->vendingMachine));
        } catch (ProductNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function insertCoin($coin): void
    {
        echo "\nPlease select a product first.\n";
    }

    public function insertNote($note): void
    {
        echo "\nPlease select a product first.\n";
    }

    public function dispenseProduct(): void
    {
        echo "\nPlease select a product and make payment.\n";
    }

    public function returnChange(): void
    {
        echo "\nNo change to return.\n";
    }
}
