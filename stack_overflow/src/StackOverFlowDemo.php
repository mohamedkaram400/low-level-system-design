<?php
namespace StackOverFlow;

use StackOverFlow\User;

class StackOverFlowDemo
{
    public function run()
    {
        $user = new User( 1,'mohamed', 'mohamed@gmail.com');
        $question1 = $user->postQuestion(1,'What is dependency injection?', 'I need help understanding DI', ['php', 'design-patterns']);
        $user->printUser();
    }
}