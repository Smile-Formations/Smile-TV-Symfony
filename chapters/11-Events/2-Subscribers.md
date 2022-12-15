## Subscribers

- Subscribers are classes that allow you to register several listener functions at once
- They require 0 configuration thanks to autowiring and autoconfigure
- You can create a basic Subscriber skeleton with the MakerBundle

```php
<?php

namespace App\Book\Event;

use App\Event\BookeEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent
use Symfony\Component\HttpKernel\KernelEvents;

class BookSubscriber implements EventDispatcherInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => [
                ['onKernelResponsePre', 10],
                ['onKernelResponsePost', -10],    
            ],
            BookeEvents::PUBLISHED => 'onBookPublished',  
        ];
    }
    
    public function onKernelResponsePre(ResponseEvent $event) {}
    public function onKernelResponsePost(ResponseEvent $event) {}
    public function onBookPublished(BookEvent $event) {}
}
```

- As often, the MakerBundle ships a command to help you generate a skeleton for your EventSubscribers.
- The command will ask for the name of the subscriber, and then help you chose which event to listen.

```bash
$ symfony console make:subscriber
```

```php
<?php

namespace App\EventSubscriber:

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

class MySubscriber implements EventSubscriberInterface
{
    public function onKernelController(ControllerEvent $event)
    {
        //...
    }
    
    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}

```