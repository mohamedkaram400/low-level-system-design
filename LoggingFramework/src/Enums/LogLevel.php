<?php

enum LogLevel : string
{
    case DEBUG = 'debug'; 
    case INFO = 'info';
    case WARNING = 'wrning'; 
    case ERROR = 'error';
    case FATAL = 'fatal';
}