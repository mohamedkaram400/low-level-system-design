<?php

use Carbon\Traits\Timestamp;

class LogMessage
{
    private string $content;
    private LogLevel $level;
    private Timestamp $timestamp;

}