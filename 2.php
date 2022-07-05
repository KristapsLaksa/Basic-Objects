<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x,int $y){
        $this->x=$x;
        $this->y=$y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
    public function swapPoints(Point $pointOne, Point $pointTwo): void
    {

        $temp =$pointOne->x;
        $temp2 =$pointTwo->x;
        $pointOne->x = $temp2;
        $pointTwo->x =  $temp;

        $temp3 =$pointOne->y;
        $temp4 =$pointTwo->y;
        $pointOne->y = $temp4;
        $pointTwo->y = $temp3;

    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo "{$p1->getX()} {$p1->getY()}".PHP_EOL;
echo "{$p2->getX()} {$p2->getY()}".PHP_EOL;

$p1->swapPoints($p1,$p2);


echo PHP_EOL;
echo "{$p1->getX()} {$p1->getY()}".PHP_EOL;
echo "{$p2->getX()} {$p2->getY()}".PHP_EOL;

