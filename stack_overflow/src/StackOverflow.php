<?php
namespace StackOverFlow;

class StackOverflow
{
    private array $users;
    private array $questions;
    private array $answers;
    private array $tags;

    public function __construct()
    {
        $this->users = [];
        $this->questions = [];
        $this->answers = [];
        $this->tags = [];
    }

    public function createUser($username, $email)
    {
        $userId = count($this->users) + 1;
        $user = new User((int) $userId, $username, $email);
        $this->users[] = $user;
        return $user;
    }

    public function askQuestion($user, $title, $content, $tags)
    {
        $question = $user->askQuestion($title, $content, $tags);
        $this->questions[] = $question;
        $this->tags = is_array($tags) ? $tags : [$tags]; 
        return $question;
    }

    public function answerQuestion($user, $question, $content)
    {
        $answer = $user->answerQuestion($question, $content);
        $this->answers[] = $answer;
        return $answer;
    }

    public function addComment($user, $commentable, $content)
    {
        return $user->commentOn($commentable, $content);
    }
}