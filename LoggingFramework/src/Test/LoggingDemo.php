<?php
namespace MohamedKaram\LoggingFramework\Test;

use MohamedKaram\LoggingFramework\Main\Logger;
use MohamedKaram\LoggingFramework\LoggerConfig;
use MohamedKaram\LoggingFramework\Enums\LogLevel;

class LoggingDemo
{
    public function run()
    {
        $logger = Logger::getInstance();

        # Logging with default configuration
        $logger->info("This is an information message");
        $logger->warning("This is a warning message");
        $logger->error("This is an error message");
        
        # Changing log level and appender
        $LoggerConfig = new LoggerConfig(LogLevel::DEBUG, 'app.log');
        $logger->setLoggerConfig($LoggerConfig);
        
        $logger->debug("This is a debug message");
        $logger->info("This is an information message");
    }
}