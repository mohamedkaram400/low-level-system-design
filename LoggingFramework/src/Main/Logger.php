<?php
namespace MohamedKaram\LoggingFramework\Main;

use LogMessage;
use MohamedKaram\LoggingFramework\LoggerConfig;
use MohamedKaram\LoggingFramework\Enums\LogLevel;
use MohamedKaram\LoggingFramework\ConcreteAppenders\ConsoleAppender;

class Logger
{
    public static ?Logger $logger = null;

    public LogLevel $logLevel;

    public LoggerConfig $loggerConfig; 

    private function __construct(ConsoleAppender $consoleAppender)
    {
        $this->loggerConfig = new LoggerConfig(LogLevel::INFO, $consoleAppender);
    }

    private function __clone(): void
    {
        throw new \Exception("Cannot clone a singleton.");
    }

    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }  

    public static function getInstance(): Logger
    {
        $consoleAppender = new ConsoleAppender();
        if (self::$logger == null) {
            self::$logger = new self($consoleAppender);
        }
        return self::$logger;
    }

    public function setLoggerConfig(LoggerConfig $loggerConfig)
    {
        $this->loggerConfig = $loggerConfig;
    }

    public function log(LogLevel $logLevel, string $msg)
    {
        if ($logLevel->value >= $this->loggerConfig->getLogLevel()) {
            $logMessage = new LogMessage($logLevel, $msg);
            $this->loggerConfig->getLogAppender()->append($logMessage);
        }
    }

    public function debug(string $msg)
    {
        $this->log(LogLevel::DEBUG, $msg);
    }

    public function info(string $msg)
    {
        $this->log(LogLevel::INFO, $msg);
    }

    public function warning(string $msg)
    {
        $this->log(LogLevel::WARNING, $msg);
    }

    public function error(string $msg)
    {
        $this->log(LogLevel::ERROR, $msg);
    }

    public function fatal(string $msg)
    {
        $this->log(LogLevel::FATAL, $msg);
    }
}