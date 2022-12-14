## What is Twig

- Template engine for PHP
- Symfony official library
- Based on Jinja from Python-land
- Why?
  - Concise syntax
  - Extensible
  - Many helpers available out of the box
  - Easy to learn
  - Automatically escapes HTML to prevent XSS exploits

```php
{{ variable }}
```
=

```php
<?php
echo htmlspecialchars(
    $variable,
    ENT_QUOTES,
    'UTH-8'
);
?>
```

