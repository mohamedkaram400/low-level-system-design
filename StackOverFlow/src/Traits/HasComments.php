<?php
namespace MohamedKaram\StackOverFlow\Traits;

use MohamedKaram\StackOverFlow\Comment;

trait HasComments
{
    protected array $comments = [];

    public function addComment(Comment $comment): void
    {
        $this->comments[] = $comment;
    }

    public function getComments(): array
    {
        return $this->comments;
    }
}
