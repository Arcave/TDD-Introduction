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
        ];
    }
}
