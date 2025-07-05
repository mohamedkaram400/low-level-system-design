<?php
namespace MohamedKaram\StackOverFlow;

interface Commentable
{
    public function addComment($content);

    public function getComment();
}