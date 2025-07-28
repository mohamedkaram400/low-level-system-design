<?php
namespace MohamedKaram\LoggingFramework\ConcreteAppenders;

use MohamedKaram\LoggingFramework\LogMessage;
use MohamedKaram\LoggingFramework\Interfaces\LogAppenderInterface;

class ConsoleAppender implements LogAppenderInterface
{
    public function append(LogMessage $logMessage): void 
    {
        echo $logMessage;
    }
}