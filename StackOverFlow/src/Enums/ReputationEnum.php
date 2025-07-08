<?php

namespace MohamedKaram\StackOverFlow\Enums;

enum ReputationEnum : int
{
    case ASK_QUESTION = 5;
    case ANSWER_QUESTION = 10;
    case ACCEPT_ANSWER = 20;
    case ADD_COMMENT = 3;
}