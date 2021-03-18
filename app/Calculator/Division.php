<?php


namespace App\Calculator;


use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (count((array)$this->operands) === 0) {
            throw new NoOperandsException();
        }

//        $result = 0;
//
//        foreach ($this->operands as $index => $operand) {
//            if ($index === 0) {
//                $result = $operand;
//                continue;
//            }
//
//            $result = $result / $operand;
//        }
//
//        return $result;

        // returns the resulting value and filtered array.
        // divides given operands and removes division by zero operands
        return array_reduce(array_filter($this->operands), function ($a, $b) {
            if ($a !== null && $b !== null) {
                return $a / $b;
            }

            return $b;
        }, null);
    }
}