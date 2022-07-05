<?php

class SurveyCounter{

    private int $purchased;
    private int $prefersCitrus;


    public function getPrefersCitrus(): int
    {
        return $this->prefersCitrus;
    }
    public function getPurchased(): int
    {
        return $this->purchased;
    }

    public function countPurchasers(int $surveyed, float $purchasedPercentage):int {
        return $this->purchased = $surveyed * $purchasedPercentage;
    }
    public function countCitrusLovers(float $prefersCitrus):int{
        return $this->prefersCitrus=$this->getPurchased() * $prefersCitrus;
    }

}

$surveyed = 12467;
$purchasedEnergyDrinks = 0.14;
$preferCitrusDrinks = 0.64;

$citrusSurvey=new SurveyCounter();


echo "Total number of people surveyed $surveyed.\n";
echo "Approximately {$citrusSurvey->countPurchasers($surveyed,$purchasedEnergyDrinks)} bought at least one energy drink.\n";
echo "{$citrusSurvey->countCitrusLovers($preferCitrusDrinks)} of those prefer citrus flavored energy drinks.\n";
