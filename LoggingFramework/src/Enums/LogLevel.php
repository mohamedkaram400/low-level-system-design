<?php
namespace MohamedKaram\LoggingFramework\Enums;

enum LogLevel : int
{
    case INFO = 1;
    case DEBUG = 2; 
    case WARNING = 3; 
    case ERROR = 4;
    case FATAL = 5;
}