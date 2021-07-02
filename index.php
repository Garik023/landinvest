<?php

require './vendor/autoload.php';


use App\Invest;


$result = Invest::start()
    ->setMaxAmount(1000)
    ->setDates('10.01.2021', '15.11.2021')
    ->setPercents(3, 6)
    ->setAmountsToTranches([
        Invest::TRANCHE_A => 500,
        Invest::TRANCHE_B => 600
    ])
    ->calculate();


echo "<pre>";
print_r($result);
