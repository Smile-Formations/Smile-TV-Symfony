## About helpers

Console helpers are classes and functions made to ease some common and recurring tasks to make your commands interactive.

Many helpers are available to help style the console:
- `QuestionHelper`
- `Table`
- `ProgressBar`
- `FormatterHelper`
- ...

You can also use `SymfonyStyle`, a meta helper designed to provide you with shortcuts for the main usages of the other helpers

---

## SymfonyStyle

```php
protected function execute(InputInterface $input, OutputInterface $output): int
{
    $io = new SymfonyStyle($input, $output);
    $io->title('Fierce Book Intelligence');
    
    $io->section('Found Book');
    $io->table([
        'Title',
        'Publication date'
    ], [
        ['...', '...']
    ]);
    
    $io->note('Keep this command secret.');
    
    return 0;
}
```

[See more](https://symfony.com/doc/current/console/style.html)

## SymfonyStyle - Output

```bash
$ symfony console app:book:find "2-266-11151-5"

Fierce Book Intelligence
========================

Found book
----------

 ------- ------------------
  Title   Publication date
 ------- ------------------  
  ...     ...
 ------- ------------------
 
 ! [NOTE] Keep this command secret.
```

---

## Exercises

**Create a new command to perform a data import for OMDB API into our database.**

- The command will ask for either a OMBD id or a movie title
- The command will display the steps processed, and the movie information once imported, such as:
  - ids (the one from the API and ours from the database)
  - title
  - MPAA restriction (Movie::rated)

---

## Resources

[https://symfony.com/doc/current/console.html](https://symfony.com/doc/current/console.html)