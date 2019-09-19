<?php
declare(strict_types=1);

use Carbon\Carbon;

class RomanClock
{
    /** @var Carbon */
    private $carbon;

    /** @var NumberToNumeralConverter */
    private $numberToNumeralConverter;

    public function __construct(Carbon $carbon, NumberToNumeralConverter $numberToNumeralConverter)
    {
        $this->carbon = $carbon;
        $this->numberToNumeralConverter = $numberToNumeralConverter;
    }

    public function getHourNumeral()
    {
        $hour = $this->getHour();

        if($this->getMinutes() >= 30){
            $hour++;
        }

        if($hour > 12){
            $hour = $hour - 12;
        }

        $this->numberToNumeralConverter->setNumber($hour);

        return $this->numberToNumeralConverter->getNumeral();
    }

    public function getHour(): int
    {
        return $this->carbon->hour;
    }

    private function getMinutes(): int
    {
        return $this->carbon->minute;
    }
}