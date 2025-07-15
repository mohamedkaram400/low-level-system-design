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
        $this->vendingMachine->output->print("Product already selected. Please make payment.");
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
        $this->vendingMachine->output->print("Please make payment first. (Insert Coins or Notes)");
    }

    public function returnChange(): void
    {
        $this->vendingMachine->output->print("No change to return.");
    }
}
