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
    private const fixedFee = 50;




    public function __construct($donation, $commissionPercentage)
    {

        if ($commissionPercentage > 30){
            throw new \Exception('Le pourcentage de commission doit être compris entre 0 et 30%');
        }

        if(!is_int($donation)|| $donation < 100){
            throw new \Exception('La donation doit être un entier positif supérieur ou égal à 100');
        }

        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;

    }

    public function getCommissionAmount()
    {
        $amount = $this->donation * $this->commissionPercentage/100 ;
        $maxCom = (500 - self::fixedFee);
        if($amount > $maxCom){
            return $maxCom;
        }
        return $amount;
    }

    public function getAmountCollected()
    {
        $amountCollected = $this->donation - $this->getFixedAndCommissionFeeAmount() ;
        return $amountCollected;
    }

    public function getFixedAndCommissionFeeAmount(){
        $totalAmount = $this->getCommissionAmount() + self::fixedFee ;
        return $totalAmount;
    }

    public function getSummary(){
        $summary = array(
          "donation" => $this->donation,
            "fixedFee"=> self::fixedFee,
            "commission"=> $this->getCommissionAmount(),
            "fixedAndCommission"=> $this->getFixedAndCommissionFeeAmount(),
            "amountCollected"=>$this->getAmountCollected(),

        );
        return $summary;
    }




}