<?php

use LogMessage;

interface LogAppender
{
    public function append(LogMessage $logMessage): void;
}