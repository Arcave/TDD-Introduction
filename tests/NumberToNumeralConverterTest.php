<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class NumberToNumeralConverterTest extends TestCase
{
    /**
     * @test
     */
    public function itConvertsOneToI()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(1);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'I');
    }

    /**
     * @test
     */
    public function itConvertsThreeToThreeIs()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(3);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'III');
    }

    /**
     * @test
     */
    public function itConvertsFiveToV()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(5);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'V');
    }

    /**
     * @test
     */
    public function itConvertsTenToX()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(10);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'X');
    }

    /**
     * @test
     */
    public function itConvertsEightToVIII()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(8);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'VIII');
    }

    /**
     * @test
     */
    public function itConvertsThirteenToXIII()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(13);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'XIII');
    }

    /**
     * @test
     */
    public function itCanOverrideItsNumberAfterConstructed()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(11);

        $numberToNumeralConverter->setNumber(13);
        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'XIII');
    }

    /**
     * @test
     */
    public function itConvertsFourToIV()
    {
        $numberToNumeralConverter = new NumberToNumeralConverter(4);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, 'IV');
    }

    /**
     * @test
     * @dataProvider cases
     */
    public function numeralChecks($number, $numeral)
    {
        $numberToNumeralConverter = new NumberToNumeralConverter($number);

        $result = $numberToNumeralConverter->getNumeral();

        $this->assertEquals($result, $numeral);
    }

    public function cases()
    {
        return [
            '1 to I' => [1, 'I'],
            '3 to III' => [3, 'III'],
            '4 to IV' => [4, 'IV'],
            '5 to V' => [5, 'V'],
            '6 to VI' => [6, 'VI'],
            '9 to IX' => [9, 'IX'],
            '10 to X' => [10, 'X'],
            '11 to XI' => [11, 'XI'],
            '15 to XV' => [15, 'XV'],
            '40 to XL' => [40, 'XL'],
            '90 to XC' => [90, 'XC'],
            '100 to C' => [100, 'C'],
            '400 to CD' => [400, 'CD'],
            '500 to D' => [500, 'D'],
            '900 to CM' => [900, 'CM'],
            '1000 to M' => [1000, 'M'],
            '2494 to MMCDXCVI' => [2494, 'MMCDXCIV'],
        ];
    }
}
