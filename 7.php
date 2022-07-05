<?php

class Dog {
    private string $name;
    private string $gender;
    private ?Dog $mother = null;
    private ?Dog $father = null;

    public function __construct(string $name,string $gender){
        $this->name=$name;
        $this->gender=$gender;

    }
    public function fathersName():string
    {
        if(! $this->father) return 'Unknown';
        return $this->father->name;
    }
    public function hasSameMotherAs(Dog $otherDog):bool{
        return $this->mother === $otherDog->mother;
    }
    public function setMother(Dog $mother):void{
        $this->mother=$mother;
    }

    public function setFather(?Dog $father): void
    {
        $this->father = $father;
    }
}

$dogs = [
    $sparky = new Dog('Sparky','male'),
    $sam = new Dog('Sam','male'),
    $lady = new Dog('Lady','female'),
    $molly = new Dog('Molly','female'),
    $rocky = new Dog('Rocky','male'),
    $max = new Dog('Max','male'),
    $buster = new Dog('Buster','male'),
    $coco = new Dog('Coco','female'),
];

$rocky->setMother($molly);
$rocky->setFather($sam);

$max->setMother($lady);
$max->setFather($rocky);

$buster->setMother($lady);
$buster->setFather($sparky);

$coco->setMother($molly);
$coco->setFather($buster);

var_dump($max->hasSameMotherAs($buster));
