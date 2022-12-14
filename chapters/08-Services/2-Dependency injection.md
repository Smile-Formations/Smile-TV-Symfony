## Dependency Injection

>In _software engineering_, `dependency injection` is a _design pattern_ in which an _object_ receives other objects that it depends on. A form of _inversion of control_, dependency injection aims to _separate the concerns_ of constructing objects and using them. The pattern ensures that an object which wants to use a given _service_ should not have to know how to construct those services. Instead, the receiving object (or '_client_') is provided with its dependencies by external code (an 'injector'), which it is not aware of. The service is made part of the client's _state_, available for use. Because the client does not build or _find the service_ itself, it typically only needs to declare the _interfaces_ of the services it uses, rather than their concrete implementations.

- Dependency Injection is the base implementation of the Inversion of Control principle in Symfony.
- In Dependency Injection, dependencies between objects are not statically written in the code but dynamically injected based on a configuration file, scanned metadata, or both.
- As the client does not instantiate the services it needs, it can rely on interfaces rather than concrete implementations

---

## Dependency Injection Container

- The Dependency Injection Container, also called Service Container, centralizes all the definitions of your services
- In a traditional Symfony application, pretty much every object that you will create or use is a service
- These definitions contain everything your services need to run: dependencies, parameters, options…
- The container will dynamically inject the dependencies you need in an optimized way, based on these definitions



