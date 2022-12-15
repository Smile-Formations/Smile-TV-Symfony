## Context

Voters are the way Symfony internally determines access with the various isGranted declinations.
The previous chapter showed you the most basic voter in Symfony, the RoleVoter, and its usage.
But sometimes you need to vote on more specific attributes.

```php
class BookController extends AbstractController
{
    #[Route('/book/{book}', name: 'book_update', methods: ['GET', 'POST'])]
    public function update(Request $request, Book $book): Response
    {
        if (!$this->isGranted('book', $book)) {
            // Not authorized, throw exception or something
        }
        //...
    }
}
```

## How to answer?

By default, the system does not know how to determine access for:
- Attributes: ‘book’
- Subject: $book
The app will finally answer “no” every time
We need to create a voter

## Voter

- The VoterInterface contains only the `vote()` method implemented in the abstract class Voter.
The `vote()` method is responsible for answering with `ACCESS_GRANTED`, `ACCESS_ABSTAIN`, or `ACCESS_DENIED`
- The Voter abstract class also contains the `supports()` abstract method. As every voter is called at every `isGranted()` call, it has to be implemented to determine if the voter can vote on the given attributes and subject.
- It also contains the `voteOnAttribute()` abstract method which will contain your business logic.

![10.5.1](../assets/10-Security/5-Custom%20voters/10.5.1.png)

---

## New voter

```bash
$ symfony console make:voter
```

[See more](https://symfony.com/doc/current/security/voters.html)

---

## Exercises

- Filter users so that only administrators can access ^/admin URLs.
- Ensure a customer cannot order a movie if he does not meet age requirements.

>The MPAA defines the following movie restrictions:
>- “PG”, “PG-13” require 13 y.o. to watch the movie
>- “R”, “NC-17” require 17 y.o. to watch the movie

---

## Resources

- [https://symfony.com/doc/current/security.html](https://symfony.com/doc/current/security.html)
- [https://symfony.com/doc/current/components/security/authentication.html](https://symfony.com/doc/current/components/security/authentication.html)
- [https://symfony.com/doc/current/security/auth_providers.html](https://symfony.com/doc/current/security/auth_providers.html)
- [https://symfony.com/doc/current/security/guard_authentication.html](https://symfony.com/doc/current/security/guard_authentication.html)
- [https://symfony.com/doc/current/security/voters.html](https://symfony.com/doc/current/security/voters.html)

