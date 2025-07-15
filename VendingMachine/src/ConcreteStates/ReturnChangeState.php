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
        echo "\nProduct already selected. Please make payment.\n";
    }

    public function insertCoin($coin): void
    {
        echo "\nCoin inserted: {$coin->name}\n";
    }

    public function insertNote($note): void
    {
        echo "\nNote inserted: {$note->name}\n";
    }

    public function dispenseProduct(): void
    {
        echo "\nPlease make payment first.\n";
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