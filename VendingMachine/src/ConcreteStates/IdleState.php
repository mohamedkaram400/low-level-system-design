<?php
namespace MohamedKaram\VendingMachine\ConcreteStates;

use MohamedKaram\VendingMachine\VendingMachine;
use MohamedKaram\VendingMachine\Interfaces\VendingMachineStateInterface;
use OutOfStockException;

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
            if ($this->vendingMachine->inventoryManager->isAvilable($productId)) {

                $this->vendingMachine->selectedProduct = $this->vendingMachine->inventoryManager->getProduct($productId);
                $this->vendingMachine->setState(new ReadyState($this->vendingMachine));
            } else {
                throw new OutOfStockException("Product Number '{$productId}' is out of stock.");
            }
        } catch (OutOfStockException $e) {
            echo $e->getMessage();
        }
    }

    public function insertCoin($coin): void
    {
        echo "Please select a product first.";
    }

    public function insertNote($note): void
    {
        echo "Please select a product first.";
    }

    public function dispenseProduct(): void
    {
        echo "Please select a product and make payment.";
    }

    public function returnChange(): void
    {
        echo "No change to return.";
    }
}
