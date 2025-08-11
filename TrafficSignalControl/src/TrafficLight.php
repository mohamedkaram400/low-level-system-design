<?php
namespace MohamedKaram\TrafficSignalControl;

use MohamedKaram\TrafficSignalControl\ConcreteStates\GreenState;
use MohamedKaram\TrafficSignalControl\Enums\Direction;
use MohamedKaram\TrafficSignalControl\Interfaces\SignalStateInterface;

class TrafficLight
{
    protected ?Direction $direction = null;
    private ?SignalStateInterface $state = null;
    private array $durations = [
        'green' => 5,
        'yellow' => 3,
        'red' => 4
    ];

    public function __construct(string $direction)
    {
        $this->direction = Direction::from($direction);
        $this->state = new GreenState();
    }

    public function setState(SignalStateInterface $state): void
    {
        $this->state = $state;
    }

    public function getState(): SignalStateInterface
    {
        return $this->state;
    }

    public function setDuration(string $stateName, int $seconds): void {
        $this->durations[$stateName] = $seconds;
    }

    public function getDuration(string $stateName): int {
        return $this->durations[$stateName] ?? 0;
    }
}