## Template inclusion

The first type of relationship between templates is inclusion.

You can create template parts and include them into other templates. This is can be done by means of the include function (best practice) or the include statement.

By default, templates included have access to the context and variables of the template in which they are included. You can pass additional variables or disable this access.

```php
<header>
    {{ include('_menu.html.twig') }}
    # Has the same effect as:
    {% include '_menu.html.twig' %}
</header>
```

## Template scopes

```php
<header>
    {{ include('_menu.html.twig', {foo: 'bar'}, with_context = false) }}
</header>
```

## Template inheritance

Twig also supports template inheritance.

This feature allows you to have templates that extend other templates.

You can define blocks in the parent template, and have the children fill in these blocks according to their specific needs.

![4.5.1](../assets/04-Twig/5-Template%20relationships/4.5.1.png)

---

## Use cases

```php
{% extends 'base.html.twig' %}

# Remove the parent's content
{% block stylesheets %}
{% endblock %}

# Replace the parent's content
{% block stylesheets %}
    <link rel="stylesheet" href="file.css">
{% endblock %}

# Prepend the parent's content
{% block stylesheets %}
    {{ parent() }}
    
    <link rel="stylesheet" href="file.css">
{% endblock %}
```

---

## Block syntax

The block statement supports two different syntaxes, short and long.

The short syntax is useful for small modifications, like the title of a page. The longer one gives you total control on the content.

```php
{% extends 'base.html.twig' %}

{% block title 'Latest Posts' %}
{% block description '...' %}

{% block body %}
    <h2>Latest posts</h2>
{% endblock body %}
```
