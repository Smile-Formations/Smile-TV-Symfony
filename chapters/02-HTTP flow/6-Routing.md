## What is a route ?

A Route is a set of criteria that matches a request (url) with a controller :
- matches by host, path, method, …
- has a unique name

A controller is a function (any callable) that returns a response

_Tips: Routes can be declared in different formats, such as : annotations, php attributes, yaml, xml or php_

---

## Routing attributes in action

Routes should preferably be declared as attributes in PHP 6
![2.6.1](../assets/02-HTTP%20flow/6-Routing/2.6.1.png)

---

## Routing annotations in action

This is the former best practice, for former PHP versions
![2.6.2](../assets/02-HTTP%20flow/6-Routing/2.6.2.png)

---

## Routing attributes

Routes attributes are dynamic parts of the path. They represent parts of the url that can change and be interpreted as variables by your application. They are defined by writing a parameter name inside curly braces.

A route can contain any number of attributes. Parameters can be  passed directly to the controller as arguments or retrieved from the `$request->attributes` parameter bag.

## Routing parameters

![2.6.3](../assets/02-HTTP%20flow/6-Routing/2.6.3.png)

---

## Route requirements

Routing parameters can be validated against specific regex constraints defined as requirements. These constraints can be defined two ways:
- As key-value pairs in the `requirements` section of the Route definition, the key being the parameter name.
- Inside `<>` characters, placed after the parameter name inside the curly braces 

![2.6.4](../assets/02-HTTP%20flow/6-Routing/2.6.4.png)

---

## Route defaults

Routing parameters can have default values. These values can be defined three ways:
- As the default value of the corresponding argument in the controller function definition
- As key-value pairs in the `defaults` section of the Route definition, the key being the parameter name.
- After a question mark `?` character, placed after the parameter name and the requirements, inside the curly braces 

![2.6.5](../assets/02-HTTP%20flow/6-Routing/2.6.5.png)

---

## Routing options

You can make routes match only for specific HTTP methods by adding the `methods` arrow section to your route. It takes any number of methods which will be the only ones your route will match.

For more complex matching methods, you can use the `condition` section of the route and write a custom condition using the `ExpressionLanguage`.

![2.6.6](../assets/02-HTTP%20flow/6-Routing/2.6.6.png)

---

## Route resolution precisions

- Symfony automatically redirects between urls with or without a trailing slash. If the route is defined as `/foo` and you call `/foo/`, you will receive a 301 Redirect response towards `/foo` and vice versa.
- In a route defining multiple parameter, if the first parameter has a default value (and thus is optional) all the following parameters must also be optional.
- You can define a `priority` parameter to force a route defined after another route to match first. Default priority is 0.

![2.6.7](../assets/02-HTTP%20flow/6-Routing/2.6.7.png)

---

## Debugging routes

![2.6.8](../assets/02-HTTP%20flow/6-Routing/2.6.8.png)

More: [https://symfony.com/doc/current/routing.html](https://symfony.com/doc/current/routing.html)