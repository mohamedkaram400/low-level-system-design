<?php

namespace StackOverFlow;

require __DIR__ . '/../../vendor/autoload.php';

use StackOverFlow\Comment;
use StackOverFlow\Question;

class User
{
    public string $id;
    public string $username;
    public string $email;
    public int $reputation;
    public array $questions;
    public array $answers;
    public array $comments;


    public function __construct($id, $username, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->reputation = 0;
    }

    public function postQuestion($id, $title, $content, $tags): Question
    {
        $newQuestion = new Question($id, $title, $content, $this, $tags);
        $this->questions[] = $newQuestion;
        $this->updateReputation(5);
        return $newQuestion; 
    }

    public function answerQuestion($question, $content, $auther): Answer
    {
        $newAnswer = new Answer($question, $content, $auther);
        $this->answers[] = $newAnswer;
        $question->addAnswer($newAnswer);
        $this->updateReputation(10);
        return $newAnswer;
    }

    public function commentOn($id, $commentable, string $content, $auther): Comment
    {
        $newComment = new Comment($id, $content, $auther);
        $this->comments[] = $newComment;
        $commentable->addComment($newComment);
        $this->updateReputation(2);
        return $newComment;
    }
    public function updateReputation(int $value): void
    {
        $this->reputation += $value;
        $this->reputation = max(0, $this->reputation); # Ensure reputation doesn't go below 0

    }

    public function printUser(): void
    {
        echo "
        ID: {$this->id}
        Username: {$this->username}
        Email: {$this->email}
        Reputation: {$this->reputation}
        ";
    
        echo "\nQuestions:\n";
        if (!empty($this->questions)) {
            foreach ($this->questions as $question) {
                echo "  - [{$question->id}] {$question->title}\n";
            }
        } else {
            echo "  No questions posted.\n";
        }
    
        echo "\nAnswers:\n";
        if (!empty($this->answers)) {
            foreach ($this->answers as $answer) {
                echo "  - [{$answer->id}] Answer to question ID {$answer->question->id}: {$answer->content}\n";
            }
        } else {
            echo "  No answers posted.\n";
        }
    
        echo "\nComments:\n";
        if (!empty($this->comments)) {
            foreach ($this->comments as $comment) {
                echo "  - [{$comment->id}] {$comment->content}\n";
            }
        } else {
            echo "  No comments posted.\n";
        }
    }
}

