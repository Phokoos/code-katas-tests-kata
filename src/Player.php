<?php

namespace App;

class Player
{

    public string $name;
    public int $points = 0;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }
}