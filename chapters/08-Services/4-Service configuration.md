## Basic configuration

```yaml
services:
  app.manager.book_manager:
    class: 'App\Manager\BookManager'
    arguments: 
      - '@doctrine.orm.default_manager'
      - '@app.service.other_service'
```

```php
namespace App\Manager

//...

class BookManger
{
    private EntityManagerInterface $manager;
    private OtherService $service;
    
    public function __construct(EntityManagerInterface $manager, OtherService $service)
    {
        //...
    }
}
```

---

## Default configuration

The default configuration allows you to autowire and autoconfigure your services in most cases for every folder in `src` except the excluded ones

Autowiring automatically scans your folders and register found classes as services, with a default configuration based on their metadata (constructor argument types, etc.)

Autoconfigure will automatically apply service tags on your services based on their characteristics (classname, namespace, implemented interfaces…)

```yaml
services:
  # default configuration for services in *this* file
  _defaults:
    autowire: true      # Automatically injects dependencies in your services.
    autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.

  # Make classes in src/ available to be used as services
  # this creates a service per class whose id is the fully-qualified class name
  App\:
    resource: '../src/'
    exclude:
      - '../src/DependencyInjection/'
      - '../src/Entity/'
      - '../src/Kernel.php'

  # Controllers are imported separately to make sure services can be injected as action arguments even if you don't extend any base controller class
  App\Controller\:
    resource: '../src/Controller'
    tags: ['controller.service_arguments']
```

---

## Autowiring configuration

No need to define properties in `services.yaml` like in **Basic Configuration**.

Just do :

```php
namespace App\Manager

//...

class BookManger
{
    private EntityManagerInterface $manager;
    private OtherService $service;
    
    public function __construct(EntityManagerInterface $manager, OtherService $service)
    {
        //...
    }
}
```

---

## Manual configuration

```yaml
services:
  # The service name, used to inject or call it
  App\Manager\BookManager:
    class: 'App\Manager\BookManager'
    arguments:
      # Inject another service into the constructor by prefixing its name with an @
      $client: '@App\Client\MyAppClient'
      # Inject any scalar you want
      $prefix: 'book_'
      # Inject an env var by using the %env()% processor
      $booksPerPage: '%env(BOOKS_PER_PAGE)%'
```

---

## Best Practice

**Use Autowiring to automate the configuration of application services**

---

## Binding arguments

If you want to automatically inject scalar values using autowiring, you can use binding:

- Define the name of the variable you will use in your constructor or setter and its value
- When autowiring detects a variable with the same name, the defined value will be injected

```yaml
services:
  _defaults:

    # Additional context provided to autowired services
    bind:
      int $someValue: 10
```