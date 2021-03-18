<?php


namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;
use function PHPUnit\Framework\countOf;

class Addition extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
//        $result = 0;
//
//        foreach ($this->operands as $operand) {
//            $result = $result + $operand;
//        }
//
//        return $result;

        if (count((array)$this->operands) === 0) {
            throw new NoOperandsException();
        }

        // returns the sum of values in an array
        return array_sum($this->operands);
    }
}