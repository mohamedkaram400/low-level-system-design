<?php
namespace MohamedKaram\StackOverFlow;

class Vote
{
    public User $user;
    public $value;
    public function __construct($user, $value)
    {
        $this->user = $user;
        $this->value = $value;
    }
}