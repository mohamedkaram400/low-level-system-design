<?php
namespace MohamedKaram\VendingMachine;

use MohamedKaram\VendingMachine\Product;
use MohamedKaram\VendingMachine\Exception\ProductNotFoundException;
 
class InventoryManager
{
    private array $products = [];

    public function getProduct($productId)
    {
        $this->checkProudctFound($productId);

        return $this->products[$productId]['product'];
    }

    public function addProduct(Product $product, int $qty): void
    {
        $this->products[$product->id] = [
            'product' => $product,
            'qty' => $qty
        ];
    }

    public function updateProductQty($productId, $qty): void
    {
        $this->checkProudctFound($productId);

        $this->products[$productId]['qty'] += $qty;
    }

    public function removeProduct($productId): void
    {
        $this->checkProudctFound($productId);

        $this->products[$productId]['qty'] -= 1;
    }

    public function getProductQty($productId)
    {
        $this->checkProudctFound($productId);

        return $this->products[$productId]['qty'];
    }

    public function isAvailable($productId): bool
    {
        return isset($this->products[$productId]) && $this->products[$productId]['qty'] > 0;
    }

    private function checkProudctFound($productId): void
    {
        if (!isset($this->products[$productId])) {
            throw new ProductNotFoundException($productId);
        }
    }
}