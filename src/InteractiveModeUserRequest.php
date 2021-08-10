<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class InteractiveModeUserRequest extends Command
{
    protected function configure()
    {
        $this
            ->setName('ask_user')
            ->setDescription('Запросить у пользователя имя вораст и пол');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $questionName = new Question('Введите ваше имя: ');
        $questionAge = new Question('Введите ваш возраст: ');
        $questionName->setValidator(function ($answer) {
            if (!is_string($answer)) {
                throw new \RuntimeException(
                    'Ваше имя должно быть введено'
                );
            }
    
            return $answer;
        });
        $questionAge->setValidator(function ($answer) {
            if (is_integer($answer) || $answer !== (string)(int)$answer) {
                throw new \RuntimeException(
                    'Возраст должен быть целым десятичным числом ' . gettype($answer)
                );
            }
    
            return $answer;
        });
        $questionGender = new ChoiceQuestion('Ваш пол (м): ', ['м', 'ж'], '0, 1');

        $name = $helper->ask($input, $output, $questionName);
        $age = $helper->ask($input, $output, $questionAge);
        $gender = $helper->ask($input, $output, $questionGender);

        $output->writeln('Здравствуйте, ' . $name . ' Ваш возраст: ' . $age . ' Ваш пол: ' . $gender);
        return Command::SUCCESS;
    }
}