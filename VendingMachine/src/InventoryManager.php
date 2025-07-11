<?php
namespace MohamedKaram\VendingMachine;

use MohamedKaram\VendingMachine\Product;
 
class InventoryManager
{
    private array $products = [];

    public function addProduct(Product $product, int $qty): void
    {
        $this->products[$product->id] = [
            'product' => $product,
            'qty' => $qty
        ];
    }
    public function removeProduct($productName)
    {
        
    }
    public function updateProductQty($product)
    {
        
    }
    public function getProductQty($product)
    {
        
    }
    public function getProduct($productId)
    {
        if (in_array($productId, $this->products[$productId])) {
            return $this->products[$productId]['product'] ?? null;
        }
    }
    public function isAvilable($productId)
    {
        if (in_array($productId, $this->products)) {
            return true;
        }
        return false;
    }

}