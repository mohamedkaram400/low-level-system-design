<?php
namespace MohamedKaram\StackOverFlow;

use Carbon\Carbon;
use Exception;
use MohamedKaram\StackOverFlow\Enums\ReputationEnum;

class Answer implements Commentable 
{
    public $id;
    public $question;
    public $content;
    public $auther;
    public $creationDate;
    public $votes;
    public $comments;
    public $isAccepted;

    public function __construct($answerId, $question, $content, $auther)
    {
        $this->id = $answerId;
        $this->question = $question;
        $this->content = $content;
        $this->auther = $auther;
        $this->creationDate = Carbon::now();
        $this->votes = [];
        $this->comments = [];
        $this->isAccepted = false;
    }

    public function accept(): void
    {
        if ($this->isAccepted) {
            throw \Exception('This answer is already accepted');
        }

        $this->isAccepted = true;
        $this->auther->updateReputation(ReputationEnum::ACCEPT_ANSWER->value);
    }

    public function addComment($comment): void
    {
        $this->comments[] = $comment;
    }

    public function getComment(): array
    {
        return $this->comments;
    }
}