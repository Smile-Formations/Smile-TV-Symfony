## Controllers

In Symfony, the name “controller” is usually used for the classes containing the actual callable controllers.

Controllers are callables whose only job is to send back a response.

As a best practice, you should keep your controllers as small as possible. Your functions should only contain what code is necessary to coordinate your services and return the response.


## Generate a controller

To create easily new controllers just use the MakerBundle

```bash
$ symfony console make:controller
```

---

## Generated controller

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
}
```

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route('/book', name='app_book')
     */
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
}
```

## Role of a controller

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/book', name: 'book_')]
class BookController extends AbstractController
{
    #[Route('/{id}', name: 'update', methods: ['GET', 'POST'])]
    public function update(int $id, Request $request): Response
    {
        // Handle a request
        
        // Use some *services* for the domain logic if needed
        
        return new Response(); // Return a Response
    }
}
```

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route('/book', name: 'book_')
 */
class BookController extends AbstractController
{
    /**
     * @Route("/{id}", name="update", methods={"GET", "POST"})
     */
    public function update(int $id, Request $request): Response
    {
        // Handle a request
        
        // Use some *services* for the domain logic if needed
        
        return new Response(); // Return a Response
    }
}
```

---

## Controller helpers

In your application, every controller should extend the `AbstractController` class from the FrameworkBundle.

This class gives you access to the Dependency Injection container and to many valuable shortcuts and helpers.

More: [https://symfony.com/doc/current/controller.html](https://symfony.com/doc/current/controller.html)

![2.7.6](../assets/02-HTTP%20flow/7-Controllers/2.7.6.png)

---

## Exercises

- Create a hello world page
  - Create a controller and a route matching /hello
  - Try to add an optional parameter: /hello/Name
- Generate routes and controllers for the index and a contact page

---

## Resources

- [https://symfony.com/doc/current/routing.html](https://symfony.com/doc/current/routing.html)
- [https://symfony.com/doc/current/controller.html](https://symfony.com/doc/current/controller.html)

