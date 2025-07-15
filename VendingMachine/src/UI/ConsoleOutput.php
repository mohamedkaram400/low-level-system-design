<?php

namespace MohamedKaram\VendingMachine\UI;

use MohamedKaram\VendingMachine\Interfaces\OutputInterface;

class ConsoleOutput implements OutputInterface
{
    public function print(string $message): void
    {
        echo $message . PHP_EOL;
    }
}