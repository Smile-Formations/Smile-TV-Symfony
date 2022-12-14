## Control structures

Twig has support for two main control structures:
- conditions (`if - elseif - else`)
- loops (`for in - else`)

### Conditions

```php
{% if product.stock > 10 %}
    Available
{% elseif product.stock > 0 %}
    Only {{ product.stock }} left!
{% else %}
    Sold-out!
{% endif %}
```

### Loops

```php
{% for posts in post %}
    <h2>N°{{ loop.index }}: {{ post.title|title }}</h2>
    <div>
        {{ post.body }}
    </div>
{% else %}
    <p>No published post yet.</p>
{% endfor %}
```

---

## Operators

- Literals
- Math
- Logic
- Comparisons
- Containment
- Tests
- Others

### Operators examples

- **Math**:
  - `+`, `-`, `/`, `*`, `//`, `**`, `%`...
- **Logic**:
  - `and`, `or`, `not` …
- **Comparison**:
  - `==`, `!=`, `<=`, `>=`, `starts with`, `ends with`…
- **Containment**: X in Y
- **Test**: `X is {something}`
  - **Other**:
  - Sequence: `A..Z`
  - Concatenation: `~`

