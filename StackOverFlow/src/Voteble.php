<?php
namespace MohamedKaram\StackOverFlow;

interface Voteble
{
    public function addVote(User $user, $value);

    public function getVoteCount();
}