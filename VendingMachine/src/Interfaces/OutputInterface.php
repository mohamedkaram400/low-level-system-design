<?php

namespace MohamedKaram\VendingMachine\Interfaces;

interface OutputInterface
{
    public function print(string $message): void;
}