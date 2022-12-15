## Controller and Routes

A controller is a function (any callable) that returns a response.

A Route is a set of criteria that matches a request:
- matches by host, path, method, …
- has a unique name
- may reference a specific controller

![2.2.1](../assets/02-HTTP%20flow/2-Request%20-%20Response%20flow/2.2.1.png)

---

## Symfony Request Object

- To represent the incoming client message, Symfony uses a class from its HttpFoundation component: the Request.
- This object is created when the Runtime component starts  running your Symfony application.
- It contains methods to help you get any information about the Request you might need
- The Request object also contains many ParameterBags, which are sub objects containing the information from the actual HTTP request conveniently formatted and stored in collections.
- By default, an argument typed and named `Request` `$request` given to any controller will contain the current Request object.

```php
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$request->query;
$request->request;
$request->attributes;
$request->cookies;
$request->files;
$request->server;
$request->headers;
$request->query->all();
$request->query->has('foo');
$request->query->get('foo', 'default');
$request->get('foo', 'default');
$request->getSession();
$request->getContent();
$request->getMethod();
$request->getBaseUrl();
$request->getPathInfo();
$request->isXmlHttpRequest();
$request->isMethod('GET');
// ... And many more
```

