<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PrimeNumberRecognitionTest extends TestCase
{
    /**
     * @test
     * @dataProvider nonePrimeNumbers
     */
    public function itCanReconiseNonePrimeNumbers(int $number)
    {
        $number = new Number($number);

        $this->assertFalse($number->isPrime());
    }

    public function nonePrimeNumbers()
    {
        return [
            "-1" => [-1],
            "0" => [0],
            "1" => [1],
            "4" => [4],
            "6" => [6],
            "8" => [8],
            "9" => [9],
            "10" => [10],
            "15" => [15],
            "21" => [21],
            "25" => [25],
            "33" => [33],
            "100" => [100],
        ]; 
    }

    /**
     * @test
     * @dataProvider primeNumbers
     */
    public function itCanRecognisePrimeNumbers(int $number)
    {
        $number = new Number($number);

        $this->assertTrue($number->isPrime());
    }

    public function primeNumbers()
    {
        return [
            "2" => [2],
            "3" => [3],
            "5" => [5],
            "7" => [7],
            "11" => [11],
            "13" => [13],
            "17" => [17],
            "19" => [19],
            "23" => [23],
            "29" => [29],
            "31" => [31],
            "37" => [37],
            "41" => [41],
            "43" => [43],
            "47" => [47],
            "53" => [53],
            "59" => [59],
            "61" => [61],
            "67" => [67],
            "71" => [71],
            "73" => [73],
            "79" => [79],
            "83" => [83],
            "89" => [89],
            "97" => [97],
            "617" => [617],
        ];
    }

    /**
     * @test
     */
    public function itCanStoreAMessageWhenFalse()
    {
        $number = new Number(4);
        $number->isPrime();
        $this->assertEquals($number->message, 'divisible by 2');

        $number = new Number(1);
        $number->isPrime();
        $this->assertEquals($number->message, 'number is lower than 2');
    }

    /**
     * @test
     */
    public function outputALoadOfNumbersToSenseCheck()
    {
        $numbersToTest = 100;
        $primeCount = 0;
        for($n = -10; $n <= $numbersToTest; $n++){
            $number = new Number($n);
            echo "\r\nNumber $n: " . ($number->isPrime() ? 'true': 'false - ' . $number->message);
        }
        $this->assertEquals($n, $numbersToTest+1);
    }
}
