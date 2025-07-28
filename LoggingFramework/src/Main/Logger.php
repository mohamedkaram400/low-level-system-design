<?php
namespace MohamedKaram\LoggingFramework\Main;

use MohamedKaram\LoggingFramework\LogMessage;
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
        if (self::$logger == null) {
            self::$logger = new self(new ConsoleAppender());
        }
        return self::$logger;
    }

    public function setLoggerConfig(LoggerConfig $loggerConfig): void
    {
        $this->loggerConfig = $loggerConfig;
    }

    public function log(LogLevel $logLevel, string $msg): void
    {
        if ($logLevel->value >= $this->loggerConfig->getLogLevel()->value) {
            $logMessage = new LogMessage($logLevel, $msg);

            $this->loggerConfig->getLogAppender()->append($logMessage);
        }
    }

    public function debug(string $msg): void
    {
        $this->log(LogLevel::DEBUG, $msg);
    }

    public function info(string $msg): void
    {
        $this->log(LogLevel::INFO, $msg);
    }

    public function warning(string $msg): void
    {
        $this->log(LogLevel::WARNING, $msg);
    }

    public function error(string $msg): void
    {
        $this->log(LogLevel::ERROR, $msg);
    }

    public function fatal(string $msg): void
    {
        $this->log(LogLevel::FATAL, $msg);
    }
}