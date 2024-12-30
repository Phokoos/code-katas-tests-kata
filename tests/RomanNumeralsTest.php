<?php


use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     *  @dataProvider numbers
     */
    function it_generates_the_roman_numeral($number, $expected)
    {
        $this->assertEquals($expected, RomanNumerals::generate($number));
    }


    /** @test */
    function if_cannot_generate_a_roman_numeral_for_less_than_1()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /** @test */
    function if_cannot_generate_a_roman_numeral_for_more_than_3999()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public static function numbers()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [11, 'XI'],
            [12, 'XII'],
            [13, 'XIII'],
            [14, 'XIV'],
            [15, 'XV'],
            [16, 'XVI'],
            [17, 'XVII'],
            [18, 'XVIII'],
            [19, 'XIX'],
            [20, 'XX'],
            [40, 'XL'],
            [50, 'L'],
            [84, 'LXXXIV'],
            [90, 'XC'],
            [93, 'XCIII'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [1984, 'MCMLXXXIV'],
            [3999, 'MMMCMXCIX'],
        ];
    }
}
