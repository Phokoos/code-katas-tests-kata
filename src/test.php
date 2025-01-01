<?php

require __DIR__ . '/../vendor/autoload.php';

use App\StringCalculation;

$calculator = new StringCalculation();
$result = $calculator->calculate("//;\n5;4");

echo "The result is: " . $result . PHP_EOL;