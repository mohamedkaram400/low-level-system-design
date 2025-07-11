<?php
namespace MohamedKaram\VendingMachine\Exception;

use Exception;

class OutOfStockException extends Exception
{
    public function __construct(string $message = "Product is out of stock.", int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}