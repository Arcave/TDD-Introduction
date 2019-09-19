<?php
declare(strict_types=1);

class NumberToNumeralConverter
{
    /** @var int */
    private $int;

    private $allNumerals = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    public function __construct(int $int)
    {
        $this->int = $int;
    }

    public function getNumeral(): string
    {
        $valueInProgress = $this->int;
        $numeral = '';

        while($valueInProgress > 0){
            foreach($this->allNumerals as $numeralCharacter => $valueToDeduct){
                if($valueInProgress - $valueToDeduct < 0){
                    continue;
                }

                if($valueInProgress - $valueToDeduct >= 0){
                    $numeral = $numeral . $numeralCharacter;
                    $valueInProgress = $valueInProgress - $valueToDeduct;
                    break;
                }
            }
        }

        return $numeral;
    }

    public function setNumber($int)
    {
        $this->int = $int;
    }
}