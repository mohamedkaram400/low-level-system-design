<?php
namespace StackOverFlow;

use Carbon\Carbon;
use StackOverFlow\Comment;

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
}