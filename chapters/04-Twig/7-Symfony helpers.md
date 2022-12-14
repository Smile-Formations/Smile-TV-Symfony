## Symfony Helpers

The Symfony TwigBundle provides some really useful helpers. Here are a few of them.

**Generating URLs:** use the `path()` and `url()` functions inside a template to generate a relative or absolute URL from a route name.

**Fragments:** use the `render()` function to render and display a piece of HTML provided by another controller. If the controller is associated with a public route, you can combine this with the `path` or `url` functions. If not, a special `controller()` function is available.

This is especially useful for pieces of code that you want to reuse but have to be generated on the fly.

---

## Generating URLs

```php
<a href="{{ path('book_show', {'id': book.id}) }}">
    Show this book (internal link)
</a>
```

```php
<a href="{{ url('https://external-site.com') }}">
    Visit our website (external link)
</a>
```

---

## Fragments

![4.7.1](../assets/04-Twig/7-Symfony%20helpers/4.7.1.png)

```php
# Use a route name...
{{ render(url('book_latest_fragment')) }}

# or a controller name
{{ render(controller('App\\Controller\\BookController::latest', {'max': 3})) }}

# ESI caching strategy, using HTTP cache for the fragment
{{ render_esi(controller('App\\Controller\\BookController::latest', {'max': 3})) }}
```

---

## Exercises

- Update the navbar to create links.
- Optional: add a condition to display an “active” class if the link matches the current route

---

## Resources

- [https://twig.symfony.com/doc/6.x/templates.html](https://twig.symfony.com/doc/6.x/templates.html)
- [https://twig.symfony.com/doc/6.x/#reference](https://twig.symfony.com/doc/6.x/#reference)

