<?php
namespace MohamedKaram\VendingMachine;

use MohamedKaram\VendingMachine\Product;
use MohamedKaram\VendingMachine\InventoryManager;
use MohamedKaram\VendingMachine\ConcreteStates\IdleState;
use MohamedKaram\VendingMachine\ConcreteStates\ReadyState;
use MohamedKaram\VendingMachine\Interfaces\VendingMachineStateInterface;

class VendingMachine
{
    private static ?VendingMachine $vendingMachine = null;
    public VendingMachineStateInterface $vendingMachineStateInterface;
    public InventoryManager $inventoryManager;
    public VendingMachineStateInterface $state;
    public IdleState $idleState;
    public ReadyState $readyState;
    public Product $selectedProduct;
    private int $balance;
    private int $totalCoins;

    private function __construct()
    {
        $this->inventoryManager = new InventoryManager();
        $this->idleState = new IdleState($this);
        $this->readyState = new ReadyState($this);
        $this->state = $this->idleState;
    }

    private function __clone(): void
    {
        throw new \Exception("Cannot clone a singleton.");
    }

    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }  

    public static function getVendingMachine() : self
    {
        if (self::$vendingMachine == null) {
            self::$vendingMachine = new self();
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