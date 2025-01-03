<?php

namespace App;

class TennisMatch
{
    protected Player $playerOne;
    protected Player $playerTwo;

    /**
     * @param Player $playerOne
     * @param Player $playerTwo
     */
    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score(): string
    {
        if ($this->hasWinner()) {
            return $this->leader() == 1 ? "Winner: {$this->playerOne->name}" : "Winner: {$this->playerTwo->name}";
        }

        if ($this->hasReachTreacherous()) {
            return $this->isEqualPoints()
                ? 'deuce' :
                ($this->leader() == 1 ?
                    "Advantage {$this->playerOne->name}" :
                    "Advantage {$this->playerTwo->name}"
                );
        }

        return sprintf(
            '%s-%s',
            $this->pointsToTerm($this->playerOne->points),
            $this->pointsToTerm($this->playerTwo->points)
        );
    }

    public function pointTo(Player $player)
    {
        $player->score();
    }

    /**
     * @param $points
     * @return string
     */
    private function pointsToTerm($points): string
    {
        return match ($points) {
            0 => 'love',
            1 => 'fifteen',
            2 => 'thirty',
            3 => 'forty',
            default => '',
        };
    }

    /**
     * @return bool
     */
    private function hasWinner(): bool
    {
        if ($this->playerOne->points > 3 && $this->playerOne->points >= $this->playerTwo->points + 2) {
            return true;
        }

        if ($this->playerTwo->points > 3 && $this->playerTwo->points >= $this->playerOne->points + 2) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    private function leader(): string
    {
        return $this->playerOne->points > $this->playerTwo->points ? 1 : 2;
    }

    /**
     * @return bool
     */
    public function hasReachTreacherous(): bool
    {
        return $this->playerOne->points >= 3 and $this->playerTwo->points >= 3;
    }

    /**
     * @return bool
     */
    public function isEqualPoints(): bool
    {
        return $this->playerOne->points == $this->playerTwo->points;
    }
}