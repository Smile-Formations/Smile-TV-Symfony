## Webpack Encore installation

- Webpack and Encore are both Node libraries
- In a Symfony project:
  - Install the Symfony Webpack Encore bundle (with composer)
  - Install the JavaScript library (With Yarn/NPM)

---

## Basic installation in Symfony

```bash
# Install and configure the bundle
$ symfony composer require encore

# Install webpack Encore JS modules
$ yarn install
```

---

## Webpack.config.js entrypoint

- The installation process adds a `webpack.config.js` file to your project.
- It contains some necessary configuration for webpack and Encore.

- One of these main configuration points are entrypoint. They will define your asset packages.
- You can define as much entrypoint as you need using the `addEntry` method. The first argument is the name it will be available under, the second one is the path to the main file of the package.

```js
// Non exhaustive Webpack configuration

var Encore = require('@symfony/webpack-encore');

Encore
    // Directory where compiled assets will be stored
    .setOutputPath('public/build/')

    // Public path used by the web server to access the output path
    .setPublicPath('/build')

    // One entrey for each "page" of your app, in order to map allof its .css and .js related files
    .addEntry('app', './assets/js/app.js')

    // Hash filenames to cache your assets through HTTP
    .enableVersioning(Encore.isProduction());

module.exports = Encore.getWebpackConfig();
```

---

## Compile assets

- All your Js and CSS files will be compiled into the defined packages by Webpack.
- This allows you to use the full extent of the JS world, write your code in TypeScript, use a frontend framework, etc

- As long as your code is not compiled, it can’t be used in your templates. Use the `yarn encore {environment}` command to compile your code.
- You can also add the `--watch` option to allow Webpack to monitor your code changes and compile every time you make a change.

- Note: you will have to stop Webpack and start it again if you make changes to the `webpack.config.js` file

```bash
# Compile all assets in a dev environment
$ yarn encore dev

# Recompile assets automatically as soon as they change
# (Note that the following command remains running to watch resources)
$ yarn encore dev --watch

# Compile all assets and optimize production build (minify assets, ...)
$ yarn encore production --progress

# Shortcuts
$ yarn dev
$ yarn watch
$ yarn build
```

Restart Encore each time you update your config file.

---

## Using Webpack assets in Twig

To use your packages in your templates, use the special Twig functions provided by Encore:
- `encore_entry_link_tags` to generate `<link>` HTML tags for your css
- `encore_entry_script_tags` to generate `<script>` HTML tags to include your javascript.
- `asset` to generate the path to the asset files like images, relative to the `public` directory

Simply give the functions the name of your packages as defined in the webpack.config.js file

```php
# CSS
{% block stylesheets %}
    # 'app' must be declared as an entry in webpack.config.js
    {{ encore_entry_link_tags('app') }}
{% endblock %}

{% block content %}
    # Asset function use to require a specific asset built by Webpack
    <img src="{{ asset('build/images/sf-logo.png') }}" alt="Symfony logo">
{% endblock %}

# JS
{% block javascripts %}
    # 'app' must be declared as an entry in webpack.config.js
    {{ encore_entry_script_tags('app') }}
    
    # Result to :
        # <script src="/build/app.js"></script>
        # <script src="/build/runtime.js"></script>
        # (Runtime useful to give a same object for a same module use by few entities)
{% endblock %}
# The encore_entry_link_tags() and encore_entry_script_tags() functions read the exact filenames to render from an entrypoints.json file, automatically created in build/ directory
```