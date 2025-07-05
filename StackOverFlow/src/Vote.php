<?php
namespace MohamedKaram\StackOverFlow;

class Vote
{
    public string $user;
    public int $value;
    public function __construct($user, $value)
    {
        $this->user = $user;
        $this->value = $value;
    }
}