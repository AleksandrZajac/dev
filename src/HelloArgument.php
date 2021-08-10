<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class HelloArgument extends Command
{
    protected function configure(): void
    {
        $this
			->setName('say_hello')
			->setDescription('Kоманда принимает 1 обязательный аргумент и выводит строку: "Привет <аргумент>".')
			->addArgument('string', InputArgument::REQUIRED, 'Initial string.')
			->setHelp('Выводит строку: "Привет <аргумент>".')
		;
    }
	
	protected function helloString($string)
    {
        return 'Привет ' . $string;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
		$output->writeln($this->helloString($input->getArgument('string')));
		
        return Command::SUCCESS;
    }
}