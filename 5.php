<?php

class Date{

    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month,int $day,int $year){
        if(checkdate($month,$day,$year)){
        $this->month=$month;
        $this->day=$day;
        $this->year=$year;
        }
        else
        {
        echo 'Invalid date!'.PHP_EOL;
        }
    }

    public function getMonth(): int
    {
        return $this->month;
    }
    public function getDay(): int
    {
        return $this->day;
    }
    public function getYear(): int
    {
        return $this->year;
    }

    public function displayDate(){
        echo "{$this->getMonth()} / {$this->getDay()} / {$this->getYear()}".PHP_EOL;
    }
}

$movieDate = new Date(05,25,1977);

$movieDate->displayDate();