<?php
namespace MohamedKaram\LoggingFramework\ConcreteAppenders;

use MohamedKaram\LoggingFramework\LogMessage;
use MohamedKaram\LoggingFramework\Interfaces\LogAppenderInterface;

class FileAppender implements LogAppenderInterface
{
    private string $filePath;

    public function __construct(string $filePath = 'default.log')
    {
        $this->filePath = $filePath;
    }

    public function append(LogMessage $logMessage): void
    {  
        $logLine = (string)$logMessage . PHP_EOL;  

        try {  
            file_put_contents($this->filePath, $logLine, FILE_APPEND | LOCK_EX);  
        } catch (\Throwable $e) {  
            error_log('Failed to write log: ' . $e->getMessage());  
        }  
    }  
}