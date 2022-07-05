<?php

class BankAccount{
    private string $name;
    private float $balance;

public function __construct(string $name,float $balance){
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
public function showUserNameAndBalance(){
    if($this->getBalance() >= 0){
        echo $this->getName()
            .', $'
            .number_format($this->getBalance(),2,'.',',')
            .PHP_EOL;
        var_dump($this->getBalance());
    }
    else
    {
        echo $this->getName()
            .', -$'
            .number_format(-$this->getBalance(),2,'.',',')
            .PHP_EOL;
    }
}
}


$ben=new BankAccount('Benson',-17.50);
$ben->showUserNameAndBalance();