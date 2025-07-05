<?php
namespace MohamedKaram\StackOverFlow;

interface Voteble
{
    public function addVote($user, $value);

    public function getVoteCount();
}