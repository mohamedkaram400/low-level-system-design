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
        $this->vendingMachine->output->print("Please select a product first.");
    }

    public function insertNote($note): void
    {
        $this->vendingMachine->output->print("Please select a product first.");
    }

    public function dispenseProduct(): void
    {
        $this->vendingMachine->output->print("Please select a product and make payment.");
    }

    public function returnChange(): void
    {
        $this->vendingMachine->output->print("No change to return.");
    }
}
