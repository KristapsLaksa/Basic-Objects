<?php

class SavingAccount {
    private float $balance;

    public function __construct(float $balance){
       $this->balance=$balance;
    }
    public function getBalance(): float
    {
        return $this->balance;
    }
    public function withdraw($howMuch):float{
        return $this->balance -= $howMuch;
    }
    public function deposit($howMuch):float{
       return $this->balance += $howMuch;
    }
    public function interestRate($annualInterestRate){
        $rate = $this->balance * (($annualInterestRate/12));
        return $this->balance += $rate;
    }
}

class savingCalculator {

    private SavingAccount $user;

    public function calculate(){
        $startingBalance = (float) readline('How much money is in the account?: ');
        $this->user=new SavingAccount($startingBalance);
        $annualInterestRate=(float) readline('Enter the annual interest rate: ');
        $numberOfMonths=readline('How long has the account been opened? ');
        $totalDeposit=0;
        $totalWithdrawn=0;
        $interestEarned=0;
        for($i=1;$i<=$numberOfMonths; $i++){
           $deposited = (float) readline("Enter amount deposited for month: $i: ");
           $totalDeposit +=$deposited;
           $this->user->deposit($deposited);
           $withdrawn = (float) readline("Enter amount withdrawn for $i: ");
           $totalWithdrawn +=$withdrawn;
           $this->user->withdraw($withdrawn);
            $interestEarned = $interestEarned + ($this->user->getBalance()*($annualInterestRate/12));
           $this->user->interestRate($annualInterestRate);

        } echo "Total deposited: $".number_format($totalDeposit,2,'.',',').PHP_EOL
            ."Total withdrawn: $".number_format($totalWithdrawn,2,'.',',').PHP_EOL
            ."Interest earned: $"
            .number_format($interestEarned,2,'.',',').PHP_EOL
            ."Ending balance: $"
            .number_format($this->user->getBalance(),2,'.','.').PHP_EOL;

    }


}

$calculator= new SavingCalculator;
$calculator->calculate();