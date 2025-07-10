<?php
namespace MohamedKaram\StackOverFlow;

use Carbon\Carbon;
use MohamedKaram\StackOverFlow\Enums\ReputationEnum;
use MohamedKaram\StackOverFlow\Traits\HasVotes;
use MohamedKaram\StackOverFlow\Traits\HasComments;

class Question implements Commentable, Voteble
{
    use HasComments, HasVotes;

    public $id;
    public $title;
    public $content;
    public $author;
    public $creationDate;
    public $tags;
    public $answers;


    public function __construct($id, $title, $content, $author, $tags)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->creationDate = Carbon::now();
        $this->answers = [];
        $this->tags = array_map(
            fn($name, $index) => new Tag($index + 1, $name),
            $tags,
            array_keys($tags)
        );       
    }

    public function addAnswer($answer): void
    {
        if (in_array($answer, $this->answers)) {
            throw new \Exception('This answer is already registerd');
        }

        $this->answers = $answer;
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

        // Update the post author's reputation
        if ($value === 1) {
            var_dump(ReputationEnum::UPVOTE_QUESTION->value);
            $this->author->updateReputation(ReputationEnum::UPVOTE_QUESTION->value);
        } else {
            $this->author->updateReputation(ReputationEnum::DOWNVOTED->value);
            $voter->updateReputation(ReputationEnum::CAST_DOWNVOTE->value); // penalize the voter
        }
    }

    public function getVoteCount(): int
    {
        return count($this->votes);
    }
}