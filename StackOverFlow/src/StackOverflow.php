<?php
namespace MohamedKaram\StackOverFlow;

use MohamedKaram\StackOverFlow\User;
use MohamedKaram\StackOverFlow\Enums\ReputationEnum;

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
    
    public function createUser($username, $email): User
    {
        $userId = count($this->users) + 1;
        $user = new User((int) $userId, $username, $email);

        $this->users[] = $user;
        return $user;
    }

    public function askQuestion($user, $title, $content, $tags): Question
    {
        $questionId = count($this->questions) + 1;
        $question = $user->postQuestion($questionId, $title, $content, $tags);

        $user->updateReputation(ReputationEnum::ASK_QUESTION->value);
        $this->questions[] = $question;
        $this->tags = is_array($tags) ? $tags : [$tags]; 
        return $question;
    }

    public function answerQuestion($user, $question, $content): Answer
    {
        $answerId = count($this->answers) + 1;
        $answer = $user->answerQuestion($answerId, $question, $content);
        
        $this->answers[] = $answer;
        return $answer;
    }
    
    public function addComment($user, $commentable, $content): Comment
    {
        return $user->commentOn($commentable, $content);
    }

    public function acceptAnswer($answer): void
    {
        $answer->accept();
    }
}