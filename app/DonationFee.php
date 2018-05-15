<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


class DonationFee
{

    private $donation;
    private $commissionPercentage;



    public function __construct($donation, $commissionPercentage)
    {

        if ($commissionPercentage > 30){
            throw new \Exception('Le pourcentage de commission doit être compris entre 0 et 30%');
        }

        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;

    }

    public function getCommissionAmount()
    {

        $amount = $this->donation * $this->commissionPercentage/100 ;
        return $amount;
    }

    public function getAmountCollected()
    {
        $amountCollected = $this->donation -  ($this->donation * $this->commissionPercentage/100);
        return $amountCollected;
    }




}