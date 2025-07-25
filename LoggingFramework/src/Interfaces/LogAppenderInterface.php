<?php
namespace MohamedKaram\LoggingFramework\Interfaces;

use LogMessage;

interface LogAppenderInterface
{
    public function append(LogMessage $logMessage): void;
}