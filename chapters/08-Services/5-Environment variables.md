## Environment files

- Your `.env` file should be versioned as a template but not contain any value to avoid leaking sensitive information
- You can override any var defined in your .env file by creating a `.env.local` file
- You can create environment specific files for overrides depending on an environment, like `.env.staging`
- These file can be overwritten in turn by a `.env.{environment}.local` file

## Environment variables

- Environment variables contain every bit of configuration of your app that may change based on the environment (prod, dev, test…)
- For example, every secret, api key, or database url should be stored as an environment variable
- In Symfony, environment variables are stored in `.env` files

Note than environment variables defined by the actual environment (PHP SAPI, Docker…) are never overwritten by Symfony

```bash
$ symfony console debug:container --env-var=SOME_KEY

Symfony Container Environment Variables
=======================================

// Displaying detailed environment variable usage matching SOME_KEY

None of the environment variables match this name
```

These variables and can then be used in your services definitions using the `%env()%` helper.

Note that environment variables, or parameters, can also be defined in the `services.yaml` file or any yaml file it imports using the `env()` helper.
This functionality is deprecated, now only used as a fallback

- When using the `env()` syntax, you can use special env var processors to cast your environment variables to the desired PHP type.
- You can also combine processors to be used sequentially
- Many processors are available

[https://symfony.com/doc/current/configuration/env_var_processors.html](https://symfony.com/doc/current/configuration/env_var_processors.html)

```dotenv
# .env file (or any override such as .en.local) sets an environment variable if missing in the host

SOME_KEY=37fd4a3c83ab2
```

```yaml
# app/config/services.yaml

parameters:
  # Fallback if missing in your .env files
  env(SOME_KEY): 'aaaaaaaaaaa'

services:
  App\Demo:
    arguments:
      $key: '%env(string:SOME_KEY)%'
```

## Environment variables processors

```yaml
services:
  App\Manager\BookManager:
    arguments:
      # ...
      - '%env(string:SOME_KEY)%' # casts as string
      - '%env(int:SOME_KEY)%' # casts as integer
      - '%env(bool:SOME_KEY)%' # casts as boolean
      - '%env(not:SOME_KEY)%' # same as bool but inverts the value
      - '%env(json:SOME_KEY)%' # decodes the content of SOME_KEY if it's json encoded
      - '%env(file:SOME_PATH)%' # gets the content of the file at SOME_PATH
      
      # Combine processors
      - '%env(json:file:SOME_PATH)%' # gets and decodes the json content of file at SOME_PATH
      - '%env(key:client_password:json:file:SOME_PATH)%' # gets only the 'client_password' key contained in the json content of file at SOME_PATH

      # assuming SOME_KEY=App\\Namespace\\Class::SOME_CONST in .env
      - '%env(const:SOME_KEY)%' # gets the const value
      # assuming SOME_KEY='%kernel.project_dir%/my_dir/foo' in .env
      - '%env(resolve:SOME_KEY)%' # replaces any parameter inside SOME_KEY bu its value
```

```bash
$ symfony console debug:container --env-var=SOME_KEY

Symfony Container Environment Variables
=======================================

// Displaying detailed environment variable usage matching SOME_KEY

%env(string:SOME_KEY)%
----------------------

  ------------------ -----------------
    Default value     "aaaaaaaaaaa"
    Real value        "37fd4a3c83ab2"
    Processed value   "37fd4a3c83ab2"
  ------------------ -----------------

// Note real values might be different between web and CLI
```

---

## Exercises

- Create and configure an OMDb API consumer to fetch movie data from the API.
- Create a new service to transform retrieved data into a Movie object
- Use the service instead of param converter to display movie details from the API.

---

## Resources

- [https://symfony.com/doc/current/service_container.html](https://symfony.com/doc/current/service_container.html)
- [https://symfony.com/doc/current/configuration/env_var_processors.html](https://symfony.com/doc/current/configuration/env_var_processors.html)

