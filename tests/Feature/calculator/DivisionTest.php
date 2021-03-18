<?php

namespace Feature\calculator;

use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandsException;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    /** @test */
    public function divides_given_operands()
    {
        $divison = new Division();
        $divison->setOperands([100, 2]);

        $this->assertEquals(50, $divison->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandsException::class);

        $addition = new Division();
        $addition->calculate();
    }

    /** @test */
    public function removes_division_by_zero_operands()
    {
        $divison = new Division();
        $divison->setOperands([10, 0, 0, 5, 0]);

        $this->assertEquals(2, $divison->calculate());
    }
}
