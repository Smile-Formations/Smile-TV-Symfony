## What is a route ?

A Route is a set of criteria that matches a request (url) with a controller :
- matches by host, path, method, …
- has a unique name

A controller is a function (any callable) that returns a response

_Tips: Routes can be declared in different formats, such as : annotations, php attributes, yaml, xml or php_

---

## Routing attributes in action

Routes should preferably be declared as attributes in Symfony 6

```php
use Symfony\Component\Routing\Annotation\Route;

#[Route('/book', name: 'book_')]
class BookController extends AbstractController
{
    #[Route('/{page<\d+>?1}', name: 'list', methods: ['GET'])]
    public function index(int $page)
    {
        //..
    }
}
```

---

## Routing annotations in action

This is the former best practice, for former PHP versions

```php
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/book", name="book_")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/{page<\d+>?1}", name="list", methods={"GET"})
     */
    public function index(int $page)
    {
        //..
    }
}
```

---

## Routing attributes

Routes attributes are dynamic parts of the path. They represent parts of the url that can change and be interpreted as variables by your application. They are defined by writing a parameter name inside curly braces.

A route can contain any number of attributes. Parameters can be  passed directly to the controller as arguments or retrieved from the `$request->attributes` parameter bag.

## Routing parameters

```php
class BookController extends AbstractController
{
    #[Route('/blog/{post}', name: 'show', methods: ['GET'])]
    public function show(Request $request, $post)
    {
        // In this Route, {post} is a parameter.
        // It can be retrieved as the $post controller argument or in the request :
        $post = $request->attributes->get('post');
        //...
    }
}
```

---

## Route requirements

Routing parameters can be validated against specific regex constraints defined as requirements. These constraints can be defined two ways:
- As key-value pairs in the `requirements` section of the Route definition, the key being the parameter name.
- Inside `<>` characters, placed after the parameter name inside the curly braces 

```php
class BookController extends AbstractController
{
    #[Route('/blog/{post}', name: 'show', requirements: ['post' => '\w+'])]
    public function show(string $post)
    {
        //...
    }
    
    // Equivalent to :
    #[Route('/blog/{post<\w+}', name: 'show')]
    public function show(string $post)
    {
        //...
    }
}
```

---

## Route defaults

Routing parameters can have default values. These values can be defined three ways:
- As the default value of the corresponding argument in the controller function definition
- As key-value pairs in the `defaults` section of the Route definition, the key being the parameter name.
- After a question mark `?` character, placed after the parameter name and the requirements, inside the curly braces 

```php
class BookController extends AbstractController
{
    #[Route('/blog/{page}', name: 'show')]
    public function show(int $page = 1)
    {
        //...
    }
    
    // Equivalent to :
    #[Route('/blog/{page}', name: 'show', defaults: ['page' => 1])]
    public function show(int $page)
    {
        //...
    }
    
    // Equivalent to :
    #[Route('/blog/{page?1}', name: 'show')]
    public function show(int $page)
    {
        //...
    }
    
    // Can be combined with requirements :
    #[Route('/blog/{page<\d>?1}', name: 'show')]
    public function show(int $page)
    {
        //...
    }
}
```

---

## Routing options

You can make routes match only for specific HTTP methods by adding the `methods` arrow section to your route. It takes any number of methods which will be the only ones your route will match.

For more complex matching methods, you can use the `condition` section of the route and write a custom condition using the `ExpressionLanguage`.

```php
class BookController extends AbstractController
{
    #[Route('/blog/{page}', name: 'show', methods: ['GET', 'POST'])]
    public function show(int $page = 1)
    {
        //...
    }
    
    #[Route(
        '/blog/{page}',
         name: 'show',
         condition: "request.headers,get('User-Agent') matches '%env(ALLOWED_BROWSERS)%'"
    )]
    public function show(int $page)
    {
        //...
    }
}
```

---

## Route resolution precisions

- Symfony automatically redirects between urls with or without a trailing slash. If the route is defined as `/foo` and you call `/foo/`, you will receive a 301 Redirect response towards `/foo` and vice versa.
- In a route defining multiple parameter, if the first parameter has a default value (and thus is optional) all the following parameters must also be optional.
- You can define a `priority` parameter to force a route defined after another route to match first. Default priority is 0.

```php
class BookController extends AbstractController
{
    #[Route('/blog/{slug<\w+}', name: 'show')]
    public function show(string $slug)
    {
        // should match /blog/list
    }
    
    #[Route('/blog/list}', name: 'show', priority: 2)]
    public function show()
    {
        // will match first
    }
}
```

---

## Debugging routes

```bash
$ symfony console debug:router
$ symfony console debug:router book_list
$ symfony console debug:router --show-controllers
$ symfony console router:match /book/1
```

More: [https://symfony.com/doc/current/routing.html](https://symfony.com/doc/current/routing.html)