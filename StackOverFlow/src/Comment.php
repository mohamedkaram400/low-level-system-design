<?php
namespace MohamedKaram\StackOverFlow;

use Carbon\Carbon;

class Comment
{
    public $id;
    public $content;
    public $author;
    public $creationDate;
    public function __construct($id, $content, $author)
    {
        $this->id = $id;
        $this->content = $content;
        $this->author = $author;
        $this->creationDate = Carbon::now();
    }
}