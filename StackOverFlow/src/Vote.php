<?php
namespace MohamedKaram\StackOverFlow;

class Vote
{
    public User $user;
    public int $value;
    public function __construct(User $user, $value)
    {
        $this->user = $user;
        $this->value = $value;
    }
}