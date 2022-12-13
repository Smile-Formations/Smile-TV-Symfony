##What is Composer ?

Composer is the dependency manager used by all modern PHP applications.

It can also be used with the Symfony CLI with “symfony composer” alias

![1.3.1](../assets/01-Introduction/3-Installation/1.3.1.png)

###Best practice

Composer should be **installed globally** in your **system**.

---

##Composer Configuration files

**composer.json :**

- The dependencies + approximate versions that the project wants to be installed. This is automatically updated when requiring a new dependency through `composer require`.

_Note : This file should be committed in your repository_

**composer.lock :**

- The dependencies + **exact versions** that were installed **after resolving all the dependencies**.  This file is automatically created from _composer.json_ with c`omposer install`. It’s also automatically updated with `composer update`

_Note : This file should be committed in your repository_

---

##What is Symfony Flex ?

It’s a tool to simplify the installation/removal of packages in Symfony applications.

Technically speaking, **Symfony Flex is a Composer plugin** that is installed by default when creating a new Symfony application and which automates the most common tasks of Symfony applications

##Symfony Flex Configuration files

**symfony.lock :**

- The dependencies + **exact versions** that were installed **after resolving all the dependencies**.  This file is automatically created from _composer.json_ with `composer install` or `composer require`. It’s also automatically updated with `composer update`

_Note : This file should be committed in your repository_

---

#Exercises

Use Symfony CLI to create a new SF6 project
- Create a project based on the `--webapp` skeleton
- Specify the version using the `--version=6.2` option

---

##Resources

- [https://symfony.com/what-is-symfony](https://symfony.com/what-is-symfony)
- [https://github.com/symfony/symfony](https://github.com/symfony/symfony)
- [https://symfony.com/community](https://symfony.com/community)
- [https://symfony.com/releases](https://symfony.com/releases)
- [https://symfony.com/doc/current/setup.html](https://symfony.com/doc/current/setup.html)
- [https://symfony.com/doc/current/setup/flex.html](https://symfony.com/doc/current/setup/flex.html)
