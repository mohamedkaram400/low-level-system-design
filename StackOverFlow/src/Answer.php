<?php
namespace MohamedKaram\StackOverFlow;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class Answer
{
    public $id;
    public $question;
    public $content;
    public $auther;
    public $creationDate;

    public $tags;
    public $votes;
    public $comments;
    public $isAccepted;

    public function __construct($question, $content, $auther)
    {
        $this->id = Uuid::uuid4()->toString(); // Generate a UUID v4 string
        $this->question = $question;
        $this->content = $content;
        $this->auther = $auther;
        $this->creationDate = Carbon::now();
        $this->tags = [];
        $this->votes = [];
        $this->comments = [];
        $this->isAccepted = false;
    }

    public function addAnswer($id, $title)
    {

    }

    public function addComment($comment)
    {
        $this->comments[] = $comment;
    }

    public function getComment($id, $title)
    {

    }

    public function vote($user, $value)
    {
        if (!in_array($value, [1, -1])) {
            return false;
        }
                                                                                                                                                                                        
    }

    public function getVoteCount($id)
    {

    }
}