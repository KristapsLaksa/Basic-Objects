<?php

class Account{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance){
        $this->name=$name;
        $this->balance=$balance;

    }
    public function getBalance(): float
    {
        return $this->balance;
    }
    public function getName(): string
    {
        return $this->name;
    }
public function deposit($howMuch){
        $this->balance += $howMuch;
}
public function withdrawal($howMuch){
        $this->balance -= $howMuch;
}

    }
class Bank{
    public function transfer(Account $from,Account $to,float $howMuch){
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }

}
$accountA =new Account("A",100.00);
$accountB =new Account("B",0.00);
$accountC =new Account("C",100.00);

echo 'Account : '.$accountA->getName().' '
    .number_format($accountA->getBalance(),2,'.',',')
    .PHP_EOL
    .'Account : '.$accountB->getName().' '
    .number_format($accountB->getBalance(),2,'.',',')
    .PHP_EOL
    .'Account : '.$accountC->getName().' '
    .number_format($accountC->getBalance(),2,'.',',')
    .PHP_EOL;


$bank = new Bank();
$bank->transfer($accountA,$accountB,50.0);
$bank->transfer($accountB,$accountC,25.0);

echo PHP_EOL;

echo 'Account : '.$accountA->getName().' '
    .number_format($accountA->getBalance(),2,'.',',')
    .PHP_EOL
    .'Account : '.$accountB->getName().' '
    .number_format($accountB->getBalance(),2,'.',',')
    .PHP_EOL
    .'Account : '.$accountC->getName().' '
    .number_format($accountC->getBalance(),2,'.',',')
    .PHP_EOL;