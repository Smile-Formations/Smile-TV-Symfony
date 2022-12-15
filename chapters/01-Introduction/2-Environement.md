## Symfony CLI

The Symfony CLI is a cross-platform developer tool. It is meant to help you create new Symfony applications and manage them.

It can:
- create new applications
- manage a local development server with TLS
- ease the usage of Composer and Symfony Console
- ease integrations with platform.sh

```bash
# Internal documentation
$ symfony
$ symfony -h

# Custom php version
$ symfony local:php:list
$ symfony php -v
$ symfony composer

$ symfony new -h
```

## Symfony CLI in your project

```bash
$ symfony console
$ symfony local:check:requirements
$ symfony local:check:security

# Start the PHP server
$ symfony serve -d

# If you need to execute long-running commands
$ symfony run -d your_command

$ symfony server:status
$ symfony server:log

$ symfony server:stop
```