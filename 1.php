<?php

class Product
{
private string $name;
private float $startPrice;
private int $amount;

    public function __construct(string $name,float $startPrice,int $amount){
        $this -> name = $name;
        $this->startPrice = $startPrice;
        $this ->amount = $amount;

    }
    public function  setAmount(int $newAmount):void{
        $this->amount = $newAmount;
    }
    public function  setPrice(float $newPrice):void{
        $this->startPrice = $newPrice;
    }
    public function  getAll():string{
        return $this->name." ".$this->startPrice." Eur ".$this->amount." units".PHP_EOL;
    }

}

$product1=new Product("Logitech mouse",70.00,14);
$product2=new Product("iPhone 5s", 999.99,3);
$product3=new Product("Epson EB-U05", 440.46,1);

echo $product1->getAll();

$product1->setPrice(55.00);
$product2->setAmount(1);

echo $product1->getAll();

