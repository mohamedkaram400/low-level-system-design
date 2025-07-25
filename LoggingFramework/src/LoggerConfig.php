<?php
namespace MohamedKaram\LoggingFramework;

use MohamedKaram\LoggingFramework\Enums\LogLevel;

class LoggerConfig
{
    public LogLevel $logLevel;

    public $appender;

    public function __construct(LogLevel $logLevel, $appender)
    {
        $this->logLevel = $logLevel;
        $this->appender = $appender;
    }

    public function addAppender($logAppender)
    {
        $this->appender = $logAppender;
    }

    public function setLogLevel($LogLevel)
    {
        $this->logLevel = $LogLevel;
    }

    public function getLogAppender()
    {
        return $this->appender;
    }

    public function getLogLevel()
    {
        return $this->logLevel;
    }
}