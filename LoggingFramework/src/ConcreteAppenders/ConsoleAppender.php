<?php
namespace MohamedKaram\LoggingFramework\ConcreteAppenders;

use LogMessage;
use MohamedKaram\LoggingFramework\Interfaces\LogAppenderInterface;

class ConsoleAppender implements LogAppenderInterface
{
    public function append(LogMessage $logMessage): void 
    {
        echo $logMessage;
    }
}