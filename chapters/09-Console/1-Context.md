## Context

The Console component allows you to create and use rich command line interfaces.

These command line interfaces, or commands, have many use cases:
- Generate some recurring code snippets
- Get stats and information about the project
- I/O operations on the database
- Synchronizing data
- The console component comes with many features.
- Your commands can run quite simply, in the background or not. They can run in interactive mode and ask questions to the user, or can be built to run in batch.
- Commands have access to your kernel and container, dispatch specific events, and come with many helper to improve their interactiveness and allow for many use cases.
- Also, the Console component ships with a special test kit to help you write tests for your commands with PHPUnit.

_Note that by default, every command class is a service registered in Symfony._

---

## Usage

```bash
$ symfony console help

Description:
  Display help for a command          
                                      
Usage:                                
  help [options] [--] [<command_name>]

Arguments:
  command_name          The command name [default: "help"]

Options:
      --format=FORMAT   The output format (txt, xml, json, or md) [default: "txt"]
      --raw             To output raw command help
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -e, --env=ENV         The Environment name. [default: "dev"]
      --no-debug        Switch off debug mode.
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```