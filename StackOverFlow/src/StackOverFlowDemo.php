<?php
namespace MohamedKaram\StackOverFlow;

class StackOverFlowDemo
{
    public function run()
    {
        $system = new StackOverflow();

        # Create users
        $mohamed = $system->createUser('mohamed', 'mohamed@gmail.com');
        $ali = $system->createUser('ali', 'ali@gmail.com');
        $ahmed = $system->createUser('ahmed', 'ahmed@gmail.com');

        # Mohamed ask question
        $mohamedQuestion = $system->askQuestion($mohamed,'What is polymorphism in Java?', 'Can someone explain polymorphism in Java with an example?', ['java', 'oop']);

        # Ali answers Mohamed question
        $aliAnswer = $system->answerQuestion($ali,$mohamedQuestion, "Polymorphism in Java is the ability of an object to take on many forms...");

        # Mohamed accept ali answer
        $system->acceptAnswer($aliAnswer);

        # Ahmed comments on the question
        $system->addComment($ahmed, $mohamedQuestion, "Great question! I'm also interested in learning about this.");

        # Mohamed comments on the ali answer
        $system->addComment($mohamed, $aliAnswer, "Thanks for the explanation! Could you provide a code example?");

        # Ahmed votes in mohamed question and ali answer
        $system->voteQuestion($ahmed, $mohamedQuestion, 1);
        $system->voteQuestion($ahmed, $aliAnswer, 1);

        // var_dump($question1);
        $mohamed->printUser();
        $ali->printUser();
    }
} 