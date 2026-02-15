<?php

class BankAccount
{
    private string $owner;
    private int $balance;
    private string $accountNumber;

    public function __construct(string $owner, string $accountNumber, int $initialBalance)
    {
        $this->owner = $owner;
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
        if ($initialBalance < 0)
            {
                $this->balance = 0;
            }
    }
    public function getOwner(): string
    {
        return $this->owner;
    }
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }
    public function getBalance(): int
    {
        return $this->balance;
    }

    // 入金
    public function deposit(int $amount): bool
    {
        if ($amount <= 0) {
            return false;
        } else {
            $this->balance += $amount;
            return true;
        }
    }
    // 出金
    public function withdraw(int $amount): bool
    {
        if ($amount <= 0) {
            return false;
        } elseif ($this->balance < $amount) {
            return false;
        } else {
            $this->balance -= $amount;
            return true;
        }
    }
    public function transfer(BankAccount $to, int $amount): bool
    {
        if ($this->withdraw($amount)) {
            $to->deposit($amount);
            return true;
        } else {
            return false;
        }
    }
}

$a = new BankAccount("Taro", "A001", 1000);
$b = new BankAccount("Hanako", "B001", 500);


echo '<pre>';
echo var_dump($a->withdraw(300));
echo '<pre/>';
echo var_dump($a);

echo '<pre>';
echo var_dump($a->withdraw(2000));
echo '<pre/>';
echo var_dump($a);

echo '<pre>';
echo var_dump($a->transfer($b, 400));
echo '<pre/>';
echo var_dump($a);
echo var_dump($b);
