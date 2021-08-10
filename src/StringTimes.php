<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


class StringTimes extends Command
{
    protected function configure(): void
    {
        $this
			->setName('string_times')
			->setDescription('Принимает 1 обязательный аргумент — строку, которая будет выведена, и необязательную опцию times (по умолчанию 2).')
			->addArgument('string', InputArgument::REQUIRED, 'Initial string.')
            ->addOption(
                'times',
                null,
                InputOption::VALUE_REQUIRED,
                'Сколько раз следует печатать сообщение?',
                2
            )
			->setHelp('Выводит строку: "Привет <аргумент>".')
		;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        for ($i = 0; $i < $input->getOption('times'); $i++) {
            $output->writeln($input->getArgument('string'));
        }

        return Command::SUCCESS;
    }
}