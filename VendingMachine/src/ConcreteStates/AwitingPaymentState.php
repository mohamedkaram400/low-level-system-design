<?php
namespace MohamedKaram\VendingMachine\ConcreteStates;

use MohamedKaram\VendingMachine\VendingMachine;
use MohamedKaram\VendingMachine\ConcreteStates\DispenseState;
use MohamedKaram\VendingMachine\Interfaces\VendingMachineStateInterface;


class AwitingPaymentState implements VendingMachineStateInterface
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
        $vendingMachine = $this->vendingMachine;

        $vendingMachine->totalPayment += $coin;
        echo "\nCoin inserted: {$coin}\n";

        if ($vendingMachine->totalPayment >= $vendingMachine->selectedProduct->price) {
            $vendingMachine->setState(new DispenseState($this->vendingMachine));
        }
    }

    public function insertNote($note): void
    {
        $vendingMachine = $this->vendingMachine;

        $vendingMachine->totalPayment += $note;
        echo "\nNote inserted: {$note}\n";

        if ($vendingMachine->totalPayment >= $vendingMachine->selectedProduct->price) {
            $vendingMachine->setState(new DispenseState($this->vendingMachine));
        }
    }

    public function dispenseProduct(): void
    {
        echo "\nPlease make payment first.\n";
    }

    public function returnChange(): void
    {
        echo "\nNo change to return.\n";
    }
}
