<?php

namespace MohamedKaram\StackOverFlow\Observers;

use SplSubject;
use SplObserver;
use MohamedKaram\StackOverFlow\User;

class ReputationSubject implements SplSubject
{
    /** @var SplObserver[] */
    private array $observers = [];

    private User $user;
    private int $change;

    public function __construct(User $user, int $change)
    {
        $this->user = $user;
        $this->change = $change;
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers = array_filter($this->observers, fn($o) => $o !== $observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getChange(): int
    {
        return $this->change;
    }
}
