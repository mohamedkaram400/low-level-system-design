<?php
namespace MohamedKaram\LoggingFramework\Enums;

enum LogLevel : int
{
    case DEBUG = 1; 
    case INFO = 2;
    case WARNING = 3; 
    case ERROR = 4;
    case FATAL = 5;
}