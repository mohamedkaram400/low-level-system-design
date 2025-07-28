<?php
namespace MohamedKaram\LoggingFramework\Test;

use MohamedKaram\LoggingFramework\Main\Logger;
use MohamedKaram\LoggingFramework\LoggerConfig;
use MohamedKaram\LoggingFramework\Enums\LogLevel;
use MohamedKaram\LoggingFramework\ConcreteAppenders\FileAppender;
use MohamedKaram\LoggingFramework\ConcreteAppenders\ConsoleAppender;

class LoggingDemo
{
    public function run(): void
    {
        $logger = Logger::getInstance();

        # Logging with default configuration
        $logger->info("This is an information message");
        $logger->warning("This is a warning message");
        $logger->debug("This is a debug message");
        $logger->error("This is an error message");
        

        # Changing log level and appender
        $LoggerConfig = new LoggerConfig(LogLevel::INFO, new FileAppender('app.log'));
        // $LoggerConfig = new LoggerConfig(LogLevel::ERROR, new ConsoleAppender());
        $logger->setLoggerConfig($LoggerConfig);

        
        $logger->debug("This is a debug message");
        $logger->error("This is a error message");
        $logger->info("This is an information message");
    }
}