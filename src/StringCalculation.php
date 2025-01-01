<?php

namespace App;

use Exception;

class StringCalculation
{
    const MAX_NUMBER_ALLOWED = 1000;
    protected string $delimiter = ",|\n";

    /**
     * @throws Exception
     */
    public function calculate($numbers): float|int
    {
        if (empty($numbers)) {
            return 0;
        }

        $this->disallowNegative($numbers = $this->parseString($numbers));

        return array_sum(
            $this->ignoreGreaterThan($numbers)
        );
    }


    /**
     * @param $numbers
     * @return array
     */
    private function ignoreGreaterThan($numbers): array
    {
        return array_filter($numbers, fn ($number) => $number <= self::MAX_NUMBER_ALLOWED);
    }


    /**
     * @param $numbers
     * @return array
     */
    private function parseString($numbers): array
    {
        $customDelimiter = "\/\/(.)\n";

        if (preg_match("/$customDelimiter/", $numbers, $matches)) {
            $this->delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/[$this->delimiter]+/", $numbers);
    }

    /**
     * @param array $numbers
     * @return void
     * @throws Exception
     */
    protected function disallowNegative(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are not allowed.');
            }
        }
    }
}