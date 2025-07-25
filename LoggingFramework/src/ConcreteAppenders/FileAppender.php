<?php

use MohamedKaram\LoggingFramework\Interfaces\LogAppenderInterface;

class FileAppender implements LogAppenderInterface
{
    public function append(LogMessage $logMessage): void 
    {  
        $logLine = (string)$logMessage . PHP_EOL;  

        try {  
            file_put_contents('test.log', $logLine, FILE_APPEND | LOCK_EX);  
        } catch (\Throwable $e) {  
            error_log('Failed to write log: ' . $e->getMessage());  
        }  
    }  
}