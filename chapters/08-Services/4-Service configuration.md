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