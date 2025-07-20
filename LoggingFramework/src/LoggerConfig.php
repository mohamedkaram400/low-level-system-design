<?php
namespace MohamedKaram\LoggingFramework;

use LogLevel;

class LoggerConfig
{
    public LogLevel $logLevel;

    public array $appenders;

    public function addAppender($logAppender)
    {
        $this->appenders[] = $logAppender;
    }

    public function setLogLevel($LogLevel)
    {
        $this->$LogLevel = $LogLevel;
    }
}