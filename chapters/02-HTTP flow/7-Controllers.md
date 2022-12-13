## Controllers

In Symfony, the name “controller” is usually used for the classes containing the actual callable controllers.

Controllers are callables whose only job is to send back a response.

As a best practice, you should keep your controllers as small as possible. Your functions should only contain what code is necessary to coordinate your services and return the response.


## Generate a controller

To create easily new controllers just use the MakerBundle

![2.7.1](../assets/02-HTTP%20flow/7-Controllers/2.7.1.png)

---

## Generated controller

![2.7.2](../assets/02-HTTP%20flow/7-Controllers/2.7.2.png)
![2.7.3](../assets/02-HTTP%20flow/7-Controllers/2.7.3.png)

## Role of a controller

![2.7.4](../assets/02-HTTP%20flow/7-Controllers/2.7.4.png)
![2.7.5](../assets/02-HTTP%20flow/7-Controllers/2.7.5.png)

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

