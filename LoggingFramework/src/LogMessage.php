<?php
namespace MohamedKaram\LoggingFramework;

use Carbon\Carbon;
use MohamedKaram\LoggingFramework\Enums\LogLevel;

class LogMessage
{
    private string $content;
    private LogLevel $level;
    private string $timestamp;

    public function __construct($level, $content)
    {
        $this->content = $content;
        $this->level = $level;
        $this->timestamp = Carbon::now()->format('Y-m-d H:i:s');
    }

    public function __toString(): string
    {
        return "[{$this->timestamp}] [{$this->level->name}] {$this->content}" . PHP_EOL;
    }
}