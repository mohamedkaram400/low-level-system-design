<?php
namespace MohamedKaram\StackOverFlow;

use Exception;
use Carbon\Carbon;
use MohamedKaram\StackOverFlow\Voteble;
use MohamedKaram\StackOverFlow\Traits\HasVotes;
use MohamedKaram\StackOverFlow\Traits\HasComments;
use MohamedKaram\StackOverFlow\Enums\ReputationEnum;
use MohamedKaram\StackOverFlow\Observers\ReputationSubject;
use MohamedKaram\StackOverFlow\Observers\ReputationChangeHandler;

class Answer implements Commentable, Voteble
{
    use HasComments, HasVotes;

    public $id;
    public $question;
    public $content;
    public $author;
    public $creationDate;
    public $isAccepted;

    public function __construct($answerId, $question, $content, $author)
    {
        $this->id = $answerId;
        $this->question = $question;
        $this->content = $content;
        $this->author = $author;
        $this->creationDate = Carbon::now();
        $this->isAccepted = false;
    }

    public function accept(): void
    {
        if ($this->isAccepted) {
            throw new \Exception('This answer is already accepted');
        }

        $this->isAccepted = true;
        $this->author->updateReputation(ReputationEnum::ACCEPTED_ANSWER->value);
    }

    public function addComment($comment): void
    {
        $this->comments[] = $comment;
    }

    public function getComment(): array
    {
        return $this->comments;
    }

    public function addVote(User $voter, $value): void
    {
        if (! in_array($value, [-1, 1])) {
            throw new \Exception('Vote value must be either 1 or -1');
        }

        // Prevent same user from voting multiple times
        foreach ($this->votes as $existingVote) {
            if ($existingVote->voter === $voter) {
                throw new \Exception('You have already voted on this post.');
            }
        }

        
        $vote = new Vote($voter, $value);
        $this->votes[] = $vote;


        if ($value === 1) {
            $subject = new ReputationSubject($this->author, ReputationEnum::UPVOTE_ANSWER->value);
            $subject->attach(new ReputationChangeHandler());
            $subject->notify();
        } else {
            // Author loses reputation
            $subject = new ReputationSubject($this->author, ReputationEnum::DOWNVOTED->value);
            $subject->attach(new ReputationChangeHandler());
            $subject->notify();

            // Voter loses for casting a downvote
            $subject = new ReputationSubject($voter, ReputationEnum::CAST_DOWNVOTE->value);
            $subject->attach(new ReputationChangeHandler());
            $subject->notify();
        }
    }

    public function getVoteCount(): int
    {
        return count($this->votes);
    }
}