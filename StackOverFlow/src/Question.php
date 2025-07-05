<?php
namespace MohamedKaram\StackOverFlow;

use Carbon\Carbon;
use MohamedKaram\StackOverFlow\Comment;

class Question
{
    public $id;
    public $title;
    public $content;
    public $auther;
    public $creationDate;
    public $tags;
    public $votes;
    public $comments;


    public function __construct($id, $title, $content, $auther, $tags)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->auther = $auther;
        $this->creationDate = Carbon::now();
        $this->tags = is_array($tags) ? $tags : [$tags]; 
        $this->votes = [];
        $this->comments = [];
    }

    public function addAnswer()
    {
        
    }

    public function addComment($id, $content, $auther)
    {
        $this->comments[] = new Comment($id,$content, $auther);
    }


    public function getComment($id, $title)
    {

    }

    public function vote($user, $value)
    {

    }

    public function getVoteCount($id)
    {

    }
}