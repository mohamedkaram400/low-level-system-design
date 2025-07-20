<?php
namespace MohamedKaram\VendingMachine;

use MohamedKaram\VendingMachine\Product;
use MohamedKaram\VendingMachine\InventoryManager;
use MohamedKaram\VendingMachine\ConcreteStates\IdleState;
use MohamedKaram\VendingMachine\Interfaces\OutputInterface;
use MohamedKaram\VendingMachine\Interfaces\VendingMachineStateInterface;

class VendingMachine
{
    private static ?VendingMachine $vendingMachine = null;
    public InventoryManager $inventoryManager;
    public VendingMachineStateInterface $state;
    public OutputInterface $output;
    public ?Product $selectedProduct;
    public int $totalPayment;

    private function __construct(OutputInterface $output)
    {
        $this->output = $output;
        $this->inventoryManager = new InventoryManager();
        $this->state = new IdleState($this);
        $this->totalPayment = 0;
    }

    private function __clone(): void
    {
        throw new \Exception("Cannot clone a singleton.");
    }

    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }  

    public static function getVendingMachine(OutputInterface $output) : self
    {
        if (self::$vendingMachine == null) {
            self::$vendingMachine = new self($output);
        }   
        return self::$vendingMachine;
    }

    public function setState(VendingMachineStateInterface $state): void
    {
        $this->state = $state;
    }

    public function selectProduct(Product $product): void
    {
        $this->state->selectProduct($product->id);
    }

    public function insertCoin($coin): void
    {
        $this->state->insertCoin($coin);
    }

    public function insertNote($note): void
    {
        $this->state->insertNote($note);
    }

    public function dispenseProduct(): void
    {
        $this->state->dispenseProduct();
    }

    public function returnChange(): void
    {
        $this->state->returnChange();
    }   
}