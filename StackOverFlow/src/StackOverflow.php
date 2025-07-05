<?php
namespace MohamedKaram\StackOverFlow;

use Ramsey\Uuid\Uuid;
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
    
    public function createUser($username, $email)
    {
        $userId = count($this->users) + 1;
        $user = new User((int) $userId, $username, $email);
        $this->users[] = $user;
        return $user;
    }

    public function askQuestion($user, $title, $content, $tags)
    {
        $questionId = Uuid::uuid4()->toString();
        $question = $user->postQuestion($questionId, $title, $content, $tags);
        $user->updateReputation(ReputationEnum::ASK_QUESTION->value);
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

    public function voteQuestion($user, $question, $value)
    {
        $question->vote($user, $value);
    }

    public function voteAnswer($user, $answer, $value)
    {
        $answer->vote($user, $value);
    }

    public function acceptAnswer($answer)
    {
        $answer->accept();
    }

    public function getQuestionsByUser($user)
    {
        return $user->questions;
    }

    // public function getUser($userId)
    // {
    //     return $this->users->get($userId);
    // }

    // public function getQuestion($questionId)
    // {
    //     return $this->questions->get($questionId);
    // }

    // public function getAnswer($answerId)
    // {
    //     return $this->answers->get($answerId);
    // }

    // public function getTag($name)
    // {
    //     return $this->tags->get($name);
    // }
}