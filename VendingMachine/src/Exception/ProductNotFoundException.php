<?php

namespace MohamedKaram\VendingMachine\Exception;

use Exception;

class ProductNotFoundException extends Exception
{
    // Optional: Customize constructor if needed
    public function __construct($productId = "", $code = 0, Exception $previous = null)
    {
        $message = "Product with ID '{$productId}' not found.";
        parent::__construct($message, $code, $previous);
    }
}