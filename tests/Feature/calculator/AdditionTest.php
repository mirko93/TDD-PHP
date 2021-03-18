<?php

namespace Feature\calculator;

use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandsException;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    /** @test */
    public function adds_up_given_operands()
    {
        $addition = new Addition();
        $addition->setOperands([
            5, 10
        ]);

        $this->assertEquals(15, $addition->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandsException::class);

        $addition = new Addition();
        $addition->calculate();
    }
}
