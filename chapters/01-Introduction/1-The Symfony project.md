## Symfony project

- Created by Fabien Potencier in 2004
- Maintained by Symfony and its community
- Open-source: MIT
- [https://symfony.com/contributors](https://symfony.com/contributors)

---

## Symfony architecture

![1.1.1](../assets/01-Introduction/1-The%20Symfony%20project/1.1.1.png)

- **Component**: a Symfony namespace with objects responsible for a specific feature (e.g validate)
- **Polyfill**: provide features from older or future PHP versions when possible (e.g constants, functions, interfaces), and php extensions as well (e.g mbstring, uuid)
- **Contracts**: interfaces that can be used to reduce dependencies between components
- **Bridges**: adapt Symfony components to work with third parties (e.g Doctrine, Twig, Monolog)
- **Bundles**: configure components and bridges to add functionalities in Symfony projects using the framework (e.g services, controllers, routes)
- **Framework**: a PHP project structure easy to maintain and scale allowing to plug bundles and any PHP package, used for Web and CLI

---

## Symfony components

Symfony components are
- Standalone libraries
- Decoupled completely
- Create a cohesive framework
- [https://symfony.com/components](https://symfony.com/components)

![1.1.2](../assets/01-Introduction/1-The%20Symfony%20project/1.1.2.png)

---

## Symfony LTS versions

- **X.4**
  - extended bug and security support
  - cannot provide experimental features
  - last deprecations before new major


- **X.4 = X+1.0 (ex : 5.4 and 6.0)**
  - LTS and Next major version have exactly same features
  - The only difference is the depreciation layer removal.


## Symfony standard versions

- **Patch: 5.1.X**
  - bug and security fixes every month
- **Minor: 5.X**
  - background compatible (BC) features every 6 months
  - adding new deprecations to prepare Symfony 6
- **Major: X.0**
  - removing deprecated features every 2 years
  - updating minimum PHP requirements


