<?php
namespace MohamedKaram\LoggingFramework;

use MohamedKaram\LoggingFramework\Enums\LogLevel;
use MohamedKaram\LoggingFramework\Interfaces\LogAppenderInterface;

class LoggerConfig
{
    public LogLevel $logLevel;

    public LogAppenderInterface $appender;

    public function __construct(LogLevel $logLevel, LogAppenderInterface $appender)
    {
        $this->logLevel = $logLevel;
        $this->appender = $appender;
    }

    public function addAppender($logAppender): void
    {
        $this->appender = $logAppender;
    }

    public function setLogLevel($LogLevel): void
    {
        $this->logLevel = $LogLevel->value;
    }

    public function getLogAppender(): LogAppenderInterface
    {
        return $this->appender;
    }

    public function getLogLevel(): LogLevel
    {
        return $this->logLevel;
    }
}