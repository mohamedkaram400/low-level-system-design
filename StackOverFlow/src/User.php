<?php

namespace MohamedKaram\StackOverFlow;

require __DIR__ . '/../../vendor/autoload.php';

use MohamedKaram\StackOverFlow\Comment;
use MohamedKaram\StackOverFlow\Question;
use MohamedKaram\StackOverFlow\Enums\ReputationEnum;

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
        $this->comments = [];
    }

    public function postQuestion($questionId, $title, $content, $tags): Question
    {
        $newQuestion = new Question($questionId, $title, $content, $this, $tags);
        $this->questions[] = $newQuestion;
        $this->updateReputation(ReputationEnum::ASK_QUESTION->value);
        return $newQuestion; 
    }

    public function answerQuestion($answerId, $question, $content): Answer
    {
        $newAnswer = new Answer($answerId, $question, $content, $this);
        $this->answers[] = $newAnswer;
        $question->addAnswer($newAnswer);
        $this->updateReputation(ReputationEnum::ANSWER_QUESTION->value);
        return $newAnswer;
    }

    public function commentOn($commentable, $content): Comment
    {
        $commentId = count($this->comments) + 1;
        $newComment = new Comment($commentId, $content, $this);
        
        $this->comments[] = $newComment;
        $commentable->addComment($newComment);
        $this->updateReputation(ReputationEnum::ADD_COMMENT->value);
        return $newComment;
    }
    
    public function updateReputation(int $value): void
    {
        $this->reputation += $value;
        $this->reputation = max(0, $this->reputation); # Ensure reputation doesn't go below 0
    }

    public function getUserId(): int
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->username;
    }

    public function getReputation(): int
    {
        return $this->reputation;
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
                $tagNames = array_map(fn($tag) => $tag->name, $question->tags);
                $tagList = !empty($tagNames) ? implode(', ', $tagNames) : 'No tags';
                echo "  - [{$question->id}] {$question->title} (Tags: {$tagList})\n";
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
        echo "\n===============================================================\n";
    }
}

