<?php

class InventoryItem
{
    private string $name;
    private string $sku; //最小単位
    private int $stock;
    private int $unitPrice; //単価

    public function __construct(string $name, string $sku, int $stock, int $unitPrice)
    {
        $this->name = $name;
        $this->sku = $sku;
        $this->stock = $stock;
        $this->unitPrice = $unitPrice;

        if ($stock < 0) {
            $this->stock = 0;
        }
        if ($unitPrice <= 0) {
            $this->unitPrice = 1;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getSku(): string
    {
        return $this->sku;
    }
    public function getStock(): int
    {
        return $this->stock;
    }
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    public function addStock(int $qty): bool
    {
        if ($qty <= 0) {
            return false;
        }
        $this->stock += $qty;
        return true;
    }
    public function removeStock(int $qty): bool
    {
        if ($qty <= 0 || $qty > $this->stock) {
            return false;
        }
        $this->stock -= $qty;
        return true;
    }
    public function getTotalValue(): int
    {
        return $this->stock * $this->unitPrice;
    }
    public function isLowStock(): bool
    {
        if ($this->stock < 5) {
            return true;
        } else {
            return false;
        }
    }
}

$cable = new InventoryItem('USB cable', 'CBL-001', 10, 1200);
echo '<pre>';
echo var_dump($cable);
echo '<pre/>';

echo $cable->removeStock(3);

echo $cable->removeStock(20);

echo $cable->addStock(5);
echo '<br/>';

echo $cable->getStock();
echo '<br/>';

echo $cable->getTotalValue();
echo '<br/>';

var_dump($cable->isLowStock());