## What is Yarn?

- A **JS package manager**
- Developed by **Facebook** in 2016
- Similar to NPM, **same NPM registry**
- Focused on **improving performance** and issues around versioning

---

## Best practice

- Yarn should be **installed globally** in your system, with the **classic version 1.X**
- For the second one, make a **per-project install** with the **Yarn 2.x binary**

Official website: [https://yarnpkg.com](https://yarnpkg.com)

---

## Yarn Configuration files

- **package.json** :
  - The dependencies + approximate versions that the project wants to be installed.

- **yarn.lock** :
  - The dependencies + **exact versions** that were installed **after resolving all the dependencies**. 

---

## Prerequisites: NPM

```bash
$ curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash - sudo apt-get install -y nodejs
```

Official website: [https://nodejs.org/en/download](https://nodejs.org/en/download)

---

## Install and update dependencies

```bash
# Install Yarn
$ curl -sS https://dl.yarnpkg.com/debian/pub key.gpg | sudo apt-key add -
$ sudo apt install yarn

# Install and update Yarn packages
$ yarn install
$ yarn upgrade

# Test it
$ yarn -v
$ yarn -h
```

Official website: [https://yarnpkg.com/getting-started/install](https://yarnpkg.com/getting-started/install)