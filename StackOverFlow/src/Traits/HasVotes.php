<?php
namespace MohamedKaram\StackOverFlow\Traits;

use MohamedKaram\StackOverFlow\Vote;

trait HasVotes
{
    protected array $votes = [];

    public function addVote(Vote $vote): void
    {
        $this->votes[] = $vote;
    }

    public function getVotes(): array
    {
        return $this->votes;
    }
}
