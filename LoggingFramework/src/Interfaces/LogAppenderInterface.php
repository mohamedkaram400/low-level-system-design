<?php
namespace MohamedKaram\LoggingFramework\Interfaces;

use MohamedKaram\LoggingFramework\LogMessage;

interface LogAppenderInterface
{
    public function append(LogMessage $logMessage): void;
}