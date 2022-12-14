## Basic Syntax

- Twig syntax consist is used in addition to regular HTML.
- It allows you to add variables, control structures, and comments to your templates.
- It provides data manipulation filters and functions, and extensibility to create yours.
- It also provides a strong template relationship system.

```php
{# Comment here... #}
{% do something... %}
{{ display something... }}

{# Combine with filters and function: #}}
{{ something|some_filter }}
{{ some_function(something) }}
```

```php
<p>
    {# Display some sentence #}
    {% set sentence = 'Hello, ' ~ random(['John', 'Tom', 'Paul']) %}
    {{ sentence|upper }}
</p>
```

---

## Syntax reference

- Official documentation:
  - [https://twig.symfony.com/doc/6.x](https://twig.symfony.com/doc/6.x)
- Syntax:
  - Tags
  - Filters
  - Functions
  - Operators, tests, misc.
