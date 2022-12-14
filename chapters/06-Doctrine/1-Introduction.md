## Introduction

Doctrine allows you to abstract the storage into a database.

The usual Doctrine usage in Symfony consists in two layers:
- DBAL (DataBase Abstraction Layer)
- ORM (Object Relational Mapping)

## Configuration

Open:
- .env
- config/packages/doctrine.yaml

## Compatibility

Doctrine DBAL supports out of the box the following database systems:
- MySQL
- MariaDB
- Oracle
- Microsoft SQL Server
- PostgreSQL
- SQLite

---

## Database layer

Doctrine DBAL uses the PDO API, and is automatically installed with doctrine/orm

You can still double-check your PDO extensions to make sure you have the proper driver for your database system.

```bash
$ symfony php --ri pdo
```

## DBAL Commands

Doctrine ships with multiple console commands to help you automate most actions.

You can start by using the `doctrine:schema:validate --skip-mapping` command to check the connection to your database.

The `doctrine:database:create will create` a database according to your configuration, while its counterpart `doctrine:database:drop` used with the `--force` option will delete it.

---

## Create your database

```bash
# check first
$ symfony console doctrine:schema:validate --skip-mapping

$ symfony console doctrine:database:create
```

## Delete a whole database

```bash
$ symfony console doctrine:database:drop --force
```

---

## Exercises

- Configure Doctrine to access the database. Let’s assume we will use a MySQL storage, don't forget to use Sessions with PDO
- Create the database with the console
