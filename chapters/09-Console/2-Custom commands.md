## New Command

```bash
$ symfony console make:command
```

## New empty command

PHP 7.X :

```php
<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
// ...
class BookFindCommand extends Command
{
    protected static $defaultName = 'app:book:find';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Demo code
    }
}
```

PHP 8.X :

```php
<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
// ...

#[AsCommand(
    name: 'app:book:find',
    description: 'Add a short description for your command',
)]
class BookFindCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Demo code
    }
}
```

## Use the command

```bash
$ symfony console app:book:find
```

## Configuration

```php
protected function configure(): void
{
    $this
        ->setName('app:book:find')
        ->setAliases('book:find')
        ->setDescription('Find a book by isbn')
        ->setHelp('...')
    ;
}
```

---

## Options and arguments

Each command can have:
- Arguments
- Options :
  - Long options: --help
  - Short options: -h
  - Combined short options: -abc (equivalent to: -a -b -c)
  Values can be given:
- When calling the command
- Interactively during the command process

## Arguments

```php
protected function configure(): void
{
    $this
        ->setName('app:book:find')
        ->addArgument('isbn', InputArgument::REQUIRED, 'ISBN code required to retrieve a book')
    ;
}

protected function execute(InputInterface $input, OutputInterface $output): int
{
    $output->writeln('ISBN: ' . $input->getArgument('isbn'));
    
    return 0;
}
```

Arguments are positional but can be optional.

This means that in a command expecting `<first-name>` `<last-name>` as arguments (the order defined in the PHP file), the first argument you give will always be interpreted as the first-name.

There are three modes that can be given to an argument:
- `InputArgument::REQUIRED`
- `InputArgument::OPTIONAL`
- `InputArgument::IS_ARRAY`

The mode IS_ARRAY is only applicable to the last argument you define. It will take whatever string is given as argument in the command line starting the position of this argument to the end of the command or the first option.
The mode IS_ARRAY can also be combined with any of the other two by means of a pipe: `InputArgument::REQUIRED|InputArgument::IS_ARRAY`

```bash
$ symfony console app:book:find

  Not enough arguments (missing: "isbn").
  
app:book:find <isbn>

$ symfony console app:book:find "2-266-11151-5"
ISBN: 2-266-11121-5
```

## Options

You can also define options for your commands. These options’ values must have a mode:
- InputOption::VALUE_REQUIRED (`--option=value`)
- InputOption::VALUE_OPTIONAL (`--option or --option=value` or nothing)
- InputOption::VALUE_NONE (`--option` this is the default)
- InputOption::VALUE_NEGATABLE (`--option` or `--no-option`)
- InputOption::VALUE_IS_ARRAY (`--option=value1` `--option=value2` …)

Like for arguments, VALUE_IS_ARRAY can be combined with REQUIRED or OPTIONAL

