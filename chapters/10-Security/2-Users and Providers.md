## Users and Providers

![10.2.1](../assets/10-Security/2-Users%20and%20Providers/10.2.1.png)

## User Model

- In Symfony, the User object is special.
- The User represents any subject that triggered your application. In Symfony, the User is at the core of the security process which entirely revolves around it.
- A User can be an entity, can come from an API, or be stored in memory, or any other source. It has to implement the `UserInterface`.
- A simple User can be created with the `make:user` command.

```bash
$ symfony console make:user
```

**Tip :**
Use the `make:registration` command to create a quick and easy way to add new users

```bash
$ symfony console make:registration
```

Symfony 5:

![10.2.2](../assets/10-Security/2-Users%20and%20Providers/10.2.2.png)

Symfony 6:

![10.2.3](../assets/10-Security/2-Users%20and%20Providers/10.2.3.png)

---

## User Providers

**User Providers:**

- Responsible for fetching the user from the request
- Can fetch users from various sources (database, API...)
- Can be defined multiple times for multiple sources
- Are associated to firewalls
- Do not check password, they only retrieve users

```yaml
# config/packages/security.yaml

security:
  enable_authenticator_manager: true
  password_hasher:
    App\Entity\User:
      algorithm: auto

  #...
  providers:
    app_user_provider:
      entity:
        class: App\Entity\User
        property: email
```