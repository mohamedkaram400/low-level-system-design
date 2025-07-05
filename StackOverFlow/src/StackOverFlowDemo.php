<?php
namespace MohamedKaram\StackOverFlow;

class StackOverFlowDemo
{
    public function run()
    {
        $system = new StackOverflow();

        $mohamed = $system->createUser('mohamed', 'mohamed@gmail.com');
        $ali = $system->createUser('ali', 'ali@gmail.com');
        $question1 = $system->askQuestion($mohamed,'What is dependency injection?', 'I need help understanding DI', ['php', 'design-patterns']);

        // var_dump($question1);
        $mohamed->printUser();
    }
}