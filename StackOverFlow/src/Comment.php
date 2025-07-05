<?php
namespace MohamedKaram\StackOverFlow;

use Carbon\Carbon;

class Comment
{

    public $id;
    public $content;
    public $auther;
    public $creationDate;
    public function __construct($id, $content, $auther)
    {
        $this->id = $id;
        $this->content = $content;
        $this->auther = $auther;
        $this->creationDate = Carbon::now();
    }
}