<?php


use App\StringCalculation;
use PHPUnit\Framework\TestCase;

class StringCalculationTest extends TestCase
{
    /** @test */
    function it_evaluates_an_empty_string_as_0()
    {
        $calculator = new StringCalculation();

        $this->assertEquals(0, $calculator->calculate(''));
    }

    /** @test */
    function it_finds_the_sum_of_single_number()
    {
        $calculator = new StringCalculation();

        $this->assertEquals(5, $calculator->calculate('5'));
    }

    /** @test */
    function it_finds_the_sum_of_two_numbers()
    {
        $calculator = new StringCalculation();

        $this->assertEquals(10, $calculator->calculate('5, 5'));
    }

    /** @test */
    function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $calculator = new StringCalculation();

        $this->assertEquals(20, $calculator->calculate('5, 5, 10'));
    }

    /** @test */
    function it_accept_a_new_line_character_as_a_delimiter()
    {
        $calculator = new StringCalculation();

        $this->assertEquals(15, $calculator->calculate("5\n5, 5"));
    }

    /** @test */
    function negative_numbers_are_not_allowed()
    {
        $calculator = new StringCalculation();

        $this->expectException(Exception::class);

        $calculator->calculate('5, -5');
    }

    /** @test */
    function it_ignores_numbers_greater_than_1000()
    {
        $calculator = new StringCalculation();

        $this->assertEquals(5, $calculator->calculate('5, 1001'));
    }

    /** @test */
    function it_supports_custom_delimiters()
    {
        $calculator = new StringCalculation();

        $this->assertEquals(11, $calculator->calculate("//:\n5:4:2"));
    }
}
