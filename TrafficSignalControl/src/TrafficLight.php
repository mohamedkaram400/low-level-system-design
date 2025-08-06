<?php
namespace MohamedKaram\TrafficSignalControl;

use MohamedKaram\TrafficSignalControl\Enums\Direction;
use MohamedKaram\TrafficSignalControl\Interfaces\SignelStateInterface;

class TrafficLight
{
    protected ?Direction $direction = null;
    private ?SignelStateInterface $state = null;

    public function __construct(Direction $direction)
    {
        $this->direction = $direction;
    }

    public function getCurrentState(): SignelStateInterface
    {
        return $this->state;
    }

    public function getCurrentDirection(): Direction
    {
        return $this->direction;
    }

    public function setState(SignelStateInterface $state): void
    {
        $this->state = $state;
    }
}