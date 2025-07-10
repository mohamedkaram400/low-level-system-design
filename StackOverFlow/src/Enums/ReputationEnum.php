<?php

namespace MohamedKaram\StackOverFlow\Enums;

enum ReputationEnum : int
{
    case ASK_QUESTION = 1;
    case ANSWER_QUESTION = 2;
    case UPVOTE_QUESTION = 3;
    case ADD_COMMENT = 4;
    case UPVOTE_ANSWER = 5;
    case DOWNVOTED = 6;
    case CAST_DOWNVOTE = 7;
    case ACCEPTED_ANSWER = 8;
    case ACCEPT_SOMEONE_ELSE_ANSWER = 9;
}