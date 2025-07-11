<?php

namespace MohamedKaram\StackOverFlow\Observers;

use SplObserver;
use SplSubject;

class ReputationChangeHandler implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        $user = $subject->getUser();
        $change = $subject->getChange();
        $user->updateReputation($change);
    }
}