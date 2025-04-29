<?php


class User
{
    public int $id;
    public string $username;
    public string $email;
    public int $reputation;
    public array $questions;
    public array $answers;
    public array $comments;


    public function __construct($id, $username, $email, $reputation)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->reputation = $reputation;
    }

    public function postQuestion($title, $content, $tags)
    {

    }

    public function answerQuestion($content)
    {

    }

    public function commentOn($content, $commentable)
    {

    }
    public function update_reputation($value)
    {
        $this->reputation += $value;
        $this->reputation = max(0, $this->reputation); # Ensure reputation doesn't go below 0

    }

    public function printUser()
    {
        echo 
        "
            ID: {$this->id}
            Username: {$this->username}
            Email: {$this->email}
            Reputation: {$this->reputation}
        ";
    }
}

$user = new User(1, 'mohamed', 'mohamed@gmail.com', 1);
$user->printUser();
