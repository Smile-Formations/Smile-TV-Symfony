## Debug

Twig ships with multiple debugging tools, one from Twig itself and the others thanks to the TwigBridge.

You can first use the `dump()` function. It works just like PHP’s `var_dump` function.

You also have access to the `lint:twig` and `debug:twig` Symfony commands. The first one will check your files’ syntax, while the second one will display Twig’s active features. 

## Dumping variables

```php
{% set names = ['John', 'Tom', 'Paul'] %}
{% set numbers = 1..5 %}

{{ dump(names, numbers) }}
{% dump names %}

{{ dump() }}
{% dump %}
```

---

## Commands

```bash
#Check Twig file syntax
$ symfony console lint:twig templates/

#List Twig active features (filters, functions, ...)
$ symfony console debug:twig

#Dump the exhaustive configuration of Twig in your project
$ symfony console debug:config twig
```

---

## Exercises

- Create a navbar in a specific Twig file, using given template.
  - Display it in your base template and use blocks to make it optional
- Create a MovieController controller and add a route to display a single movie called “app_movie_details” to it:
  - Create an array in your controller to set fake movie data.
- In your “app_movie_details” template:
  - Use Twig to display the movie title, releasedAt, and genres.

