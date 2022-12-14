## Dot syntax

Twig uses the dot syntax to access object properties and sub-properties, as well as array keys.

When you use the dot syntax, Twig will try to access the object like an array, then will try to access the property different ways until one works.


```php
{{ article.title }}
```

```php
echo $article['title'];
echo $article->title;
echo $article->title();
echo $article->getTitle();
echo $article->isTitle();
echo $article->hasTitle();

# Stop with the first allowed access
```

