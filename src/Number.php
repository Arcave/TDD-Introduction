<?php
declare(strict_types=1);

class Number
{
    /** @var int */
    private $number;

    public $message;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function isPrime(): bool
    {
        if($this->number <= 1){
            $this->message = 'number is lower than 2';
            return false;
        }

        if($this->number % 2 === 0 && $this->number !== 2){
            $this->message = 'divisible by ' . 2;
            return false;
        }

        if($this->number > 3){
            for($n = 3; $n < $this->number; $n = $n+2){
                if($this->number % $n == 0 && $this->number != $n){
                    $this->message = 'divisible by ' . $n;
                    return false;
                }
            }
        }
        
        return true;
    }
}