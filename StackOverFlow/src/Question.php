<?php
namespace MohamedKaram\StackOverFlow;

use Carbon\Carbon;

class Question implements Commentable
{
    public $id;
    public $title;
    public $content;
    public $auther;
    public $creationDate;
    public $tags;
    public $votes;
    public $comments;
    public $answers;


    public function __construct($id, $title, $content, $auther, $tags)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->auther = $auther;
        $this->creationDate = Carbon::now();
        $this->comments = [];
        $this->answers = [];
        $this->votes = [];
        $this->tags = array_map(
            fn($name, $index) => new Tag($index + 1, $name),
            $tags,
            array_keys($tags)
        );       
    }

    public function addAnswer($answer): void
    {
        if (in_array($answer, $this->answers)) {
            throw \Exception('This answer is already registerd');
        }

        $this->answers = $answer;
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