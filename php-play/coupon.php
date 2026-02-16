<?php
class CouponCart
{
    private string $owner;
    private array $items; //['name'=>string,'price'=>int,'qty'=>int]
    private int $couponPercent;
    private float $taxRate;

    public function __construct(string $owner, float $taxRate = 0.10)
    {
        $this->owner = $owner;
        $this->items = [];
        $this->couponPercent = 0;

        $this->taxRate = $taxRate;
        if ($this->taxRate < 0) {
            $this->taxRate = 0.10;
        }
    }

    public function addItem(string $name, int $price, int $qty): bool
    {
        $name = trim($name);
        if ($name === '' || $price <= 0 || $qty <= 0) {
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
    public function applyCoupon(int $percent): bool
    {
        if ($percent < 0 || $percent > 50) {
            return false;
        } else {
            $this->couponPercent = $percent;
            return true;
        }
    }
    public function clearCoupon(): void
    {
        $this->couponPercent = 0;
    }
    public function getSubtotal(): int //小計
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }
    public function getDiscountAmount(): int //クーポン金額
    {
        return floor($this->getSubtotal() * $this->couponPercent) / 100;
    }

    public function getTaxableAmount(): int //小計ークーポン
    {
        return $this->getSubtotal() - $this->getDiscountAmount();
    }

    public function getTaxAmount(): int //税
    {
        return floor($this->getTaxableAmount() * $this->taxRate);
    }

    public function getTotal(): int //小計ークーポン*税
    {
        return $this->getTaxableAmount() + $this->getTaxAmount();
    }

    public function getCouponPercent(): int
    {
        return $this->couponPercent;
    }

    public function getSummary(): array
    {
        return $summary = [
            $this->getSubtotal(),
            $this->getCouponPercent(),
            $this->getDiscountAmount(),
            $this->getTaxableAmount(),
            $this->getTaxAmount(),
            $this->getTotal(),
        ];
    }
}

$cartTaro = new CouponCart('Taro');
$cartTaro->addItem('Keyboard', 5000, 1);
$cartTaro->addItem('Mouse', 2500, 2);
// echo '<pre>';
// echo var_dump($cartTaro);
// echo '<pre/>';
var_dump($cartTaro->applyCoupon(15));
var_dump($cartTaro->applyCoupon(80));

echo '<pre>';
echo var_dump($cartTaro);
echo '<pre/>';

echo $cartTaro->getSubtotal();
echo '<br/>';
echo $cartTaro->getDiscountAmount();
echo '<br/>';
echo $cartTaro->getTaxableAmount();
echo '<br/>';
echo $cartTaro->getTaxAmount();
echo '<br/>';
echo $cartTaro->getTotal();
echo '<br/>';

echo '<pre>';
var_dump($cartTaro->getSummary());
echo '<pre/>';


var_dump($cartTaro->clearCoupon());
echo '<pre>';
var_dump($cartTaro->getSummary());
echo '<pre/>';