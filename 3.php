<?php

class FuelGauge
{
    private int $fuel;

    public function __construct(int $fuel){
        $this->fuel=$fuel;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }
public function addFuel():int{
        if($this->fuel < 70) {
             $this->fuel ++;
        } return $this->fuel;
}
public function useFuel():int{
    if($this->fuel > 0) {
        $this->fuel --;
    } return $this->fuel;
}
}

class Odometer
{
    private int $mileage;

    public function __construct(int $mileage)
    {
        $this->mileage = $mileage;
    }
    public function getMileage(): int
    {
        return $this->mileage;
    }
    public function addMileage():int{
        if($this->mileage < 999999){
            $this->mileage=$this->mileage+1;
        }else{
            $this->mileage=0;
        } return $this->mileage;
    }
}

class Car {
    private string $name;
    private int $consumption;
    private Odometer $mileage;
    private FuelGauge $fuelInCar;

    public function __construct(string $name,int $consumption,int $km , int $fuel){
        $this->name = $name;
        $this->consumption=$consumption;
        $this->mileage =  new Odometer($km);
        $this->fuelInCar = new FuelGauge($fuel);
    }


    public function getName(): string
    {
        return $this->name;
    }
    public function fillUp(int $liters)
    {
        for ($i = 0; $i < $liters; $i++)
        {
            $this->fuelInCar->addFuel();
        }
    }
public function start():void{
        $num = 0;
        while($this->fuelInCar->getFuel()>0){
            $num++;
            $this->mileage->addMileage();
            if($num % $this->consumption==0){
                $this->fuelInCar->useFuel();
            }
            echo "Mileage: {$this->mileage->getMileage()} km" . PHP_EOL;
            echo "Fuel left: {$this->fuelInCar->getFuel()} l" . PHP_EOL;
        }
    }

}






$honda = new Car('Honda',10,0,0);

$honda->fillUp(3);
$honda->start();



