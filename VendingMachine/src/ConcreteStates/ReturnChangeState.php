<?php
namespace MohamedKaram\VendingMachine\ConcreteStates;

use MohamedKaram\VendingMachine\VendingMachine;
use MohamedKaram\VendingMachine\Interfaces\VendingMachineStateInterface;

class ReturnChangeState implements VendingMachineStateInterface
{
    protected VendingMachine $vendingMachine;

    public function __construct(VendingMachine $vendingMachine)
    {
        $this->vendingMachine = $vendingMachine;
    }

    public function selectProduct($productId): void
    {
        $this->vendingMachine->output->print("Product already selected. Please make payment.");
    }

    public function insertCoin($coin): void
    {
        $this->vendingMachine->output->print("Coin inserted: {$coin->name}");
    }

    public function insertNote($note): void
    {
        $this->vendingMachine->output->print("Note inserted: {$note->name}");
    }

    public function dispenseProduct(): void
    {
        $this->vendingMachine->output->print("Please make payment first. (Insert Coins or Notes)");
    }

    public function returnChange(): int
    {
        $charge = $this->vendingMachine->totalPayment;
        $this->vendingMachine->totalPayment = 0;

        $this->vendingMachine->setState(new IdleState($this->vendingMachine));

        echo "\nChange returned: {$charge} \n";
        return $charge;
    }
}