<?php
namespace MohamedKaram\VendingMachine\Interfaces;


interface VendingMachineStateInterface
{
    public function selectProduct($productId);

    public function insertCoin($coin);

    public function insertNote($note);

    public function dispenseProduct();

    public function returnChange();
}