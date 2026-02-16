<?php
class Cart
{
    private string $owner;
    private array $items;

    public function __construct(string $owner)
    {
        $this->owner = $owner;
        $this->items = [];
    }

    public function addItem(string $name, int $price, int $qty): bool
    {
        $name = trim($name);
        if ($name === '') {
            return false;
        }
        if ($price <= 0 || $qty <= 0) {
            return false;
        }
        // 同名商品が既にあれば qty を加算 新規なら追加
        foreach ($this->items as &$item) {
            if ($item['name'] === $name) {
                $item['qty'] += $qty;
                return true;
            }
        }
        $this->items[] = [
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
        ];
        return true;
    }
    public function removeItem(string $name): bool
    {
        foreach ($this->items as $index => $item) {
            if ($item['name'] === $name) {
                unset($this->items[$index]);
                $this->items = array_values($this->items);
                return true;
            }
        }
        return false;
    }
    public function updateQty(string $name, int $qty): bool
    {
        foreach ($this->items as $index => $item) {
            if ($item['name'] === $name) {
                if ($qty <= 0) {
                    unset($this->items[$index]);
                    $this->items = array_values($this->items);
                    return true;
                } else {
                    $this->items[$index]['qty'] = $qty;
                    return true;
                }
            }
        }
        return false;
    }
    public function getItems(): array
    {
        return $this->items;
    }
    public function getSubtotal(): int
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }
    public function getDiscountAmount(): int
    {
        if ($this->getSubtotal() >= 10000) {
            return floor($this->getSubtotal() * 0.1);
        } else {
            return 0;
        }
    }
    public function getTotal(): int
    {
        return $this->getSubtotal() - $this->getDiscountAmount();
    }
}

$taroCart = new Cart('Taro');
$taroCart->addItem('Keyboard', 4000, 1);
// echo '<pre>';
// echo var_dump($taroCart);
// echo '<pre/>';

$taroCart->addItem('Mouse', 2000, 2);
// echo '<pre>';
// echo var_dump($taroCart);
// echo '<pre/>';

$taroCart->addItem('Mouse', 2000, 1);
// echo '<pre>';
// echo var_dump($taroCart);
// echo '<pre/>';

$taroCart->updateQty('Keyboard', 2);
// echo '<pre>';
// echo var_dump($taroCart);
// echo '<pre/>';

echo $taroCart->removeItem('Notfound');
// echo '<pre>';
// echo var_dump($taroCart);
// echo '<pre/>';

$taroCart->getItems();
echo '<pre>';
echo var_dump($taroCart);
echo '<pre/>';
echo '<br/>';

echo $taroCart->getSubtotal();
echo '<br/>';

echo $taroCart->getDiscountAmount();
echo '<br/>';

echo $taroCart->getTotal();
echo '<br/>';

echo $taroCart->updateQty('Keyboard', 0);
echo '<pre>';
echo var_dump($taroCart);
echo '<pre/>';
echo '<br/>';