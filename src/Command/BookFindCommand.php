<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:book:find',
    description: 'Add a short description for your command',
    aliases: ['a:b:f']
)]
class BookFindCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setHelp('Ask mummy to give some help')
            ->addArgument('isbn', InputArgument::REQUIRED, 'ISBN code required to retrieve a book')
            ->addOption('option1', null, InputOption::VALUE_OPTIONAL, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $isbn = $input->getArgument('isbn');
        $io->title('Fierce Book Intelligence');

        $io->section('Found book');
        $io->table([
            'Title',
            'Isbn',
        ],[
            ['Toto à la plage', $isbn]
        ]);

        $io->note(sprintf('You passed an argument: %s', $isbn));

        if ($input->getOption('option1')) {
            $io->note(sprintf('You passed option: %s', $input->getOption('option1')));
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
