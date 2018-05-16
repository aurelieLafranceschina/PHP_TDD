<?php

namespace Tests\Unit;

use App\DonationFee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 10
        $expected = 10;
        $this->assertEquals($expected, $actual);
    }

    public function testAmountCollected()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getAmountCollected();

        // Alors la Valeur de la commission doit être de 10
        $expected = 40;
        $this->assertEquals($expected, $actual);
    }

    public function testCommissionException()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(100, 40);
    }

    public function testDonationException()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(0.1, 20);
    }

    public function testFixedAndCommissionFeeAmount()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getFixedAndCommissionFeeAmount();

        // Alors la Valeur de la commission doit être de 10
        $expected = 60;
        $this->assertEquals($expected, $actual);
    }

    public function testTotalFeesException()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(100, 100);

    }

    public function testSummaryHasKey(){
        //GIVEN
        $donationFees = new DonationFee(100, 10);

        //WHEN
        $actual = $donationFees->getSummary();

        //THEN
        //$expected = [100 , 50 , 10, 60,40];
        $this->assertArrayHasKey('donation', $actual);
        $this->assertArrayHasKey('fixedFee', $actual);
        $this->assertArrayHasKey('commission', $actual);
        $this->assertArrayHasKey('fixedAndCommission', $actual);
        $this->assertArrayHasKey('amountCollected', $actual);
    }

    public function testSummaryHasValue()
    {
        //GIVEN
        $donationFees = new DonationFee(100, 10);

        //WHEN
        $actual = $donationFees->getSummary();

        //THEN

        $expectedDonation = 100;
        $expectedFixedFee = 50;
        $expectedCommission = 10;
        $expectedFixedAndCommission = 60;
        $expectedAmountCollected = 40;

        $this->assertEquals($expectedDonation , $actual['donation']);
        $this->assertEquals($expectedFixedFee , $actual['fixedFee']);
        $this->assertEquals($expectedCommission , $actual['commission']);
        $this->assertEquals($expectedFixedAndCommission , $actual['fixedAndCommission']);
        $this->assertEquals($expectedAmountCollected , $actual['amountCollected']);
    }
}
