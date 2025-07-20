<?php
namespace MohamedKaram\LoggingFramework\Main;

use LogLevel;
use MohamedKaram\LoggingFramework\LoggerConfig;

class Logger
{
    public LogLevel $logLevel;
    public LoggerConfig $loggerConfig; 

    public function setLoggerConfig(LoggerConfig $loggerConfig)
    {
        $this->loggerConfig = $loggerConfig;
    }
}