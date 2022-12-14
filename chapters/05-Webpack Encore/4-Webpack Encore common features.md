## jQuery and other JS modules

Sometimes you require or import jQuery in your code, but other packages might need it as a global variable.

Encore provides you with a special function and shortcut to fix this particular problem.


```js
// Set jQuery for all Webpack scripts
Encore
    .autoProvidejQuery();

// This is equivalent
Encore
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jquery': 'jquery'
    });

// Add global access to jQuery outside Webpack:
import $ from 'jquery';
global.$ = global.jQuery = $;
```

[Webpack legacy](https://symfony.com/doc/current/frontend/encore/legacy-applications.html)

---

## Preprocessors and source maps

If you want to use Sass or Less in your project, Encore also provides helper methods. You will still need to install the proper loader yourself, but the configuration is made easy.

```bash
$ yarn add sass-loader node-sass --dev
```

```js
// If you want to use preprocessors, you will nedd to install the loader according to your needs:

Encore
    .enableSassLoader()
    .enableLessLoader()
    .enableStylusLoader()
    // Browsers can access to the original code with:
    .enableSourceMaps(!Encore.isProduction())
```

---

## Copying images

If you have image assets, you can also manage them with Webpack. This includes versioning of said images.

To do this, use the `copyFiles` method of Encore.

Do not forget the build/ directory in your `asset()` function calls. You can also import images in your JS files and use relative paths.

```js
Encore
    .copyFile({
        from: './assets/images',
        // optional target path, relative to the output dir
        to: 'images/[path][name].[ext]',
        // if versioning is enabled, add the file hash too
        to: 'images/[path][name].[hash:8].[ext]'
    })
```

---

## Webpack dev server

```bash
$ yarn encore dev-server
```

- Your browser will be updated, each time you make an asset modification
- Take a look on new paths in `entrypoints.json`

[Webpack dev-server](https://symfony.com/doc/current/frontend/encore/dev-server.html)

---

## Exercises

- Install and link Bootstrap 5
- Use a single CSS file to refactor the classes in your templates
- Configure all your images to be managed by Webpack Encore

---

## Resources

- [https://packagist.org/packages/symfony/webpack-encore-bundle](https://packagist.org/packages/symfony/webpack-encore-bundle)
- [https://yarnpkg.com/getting-started/install](https://yarnpkg.com/getting-started/install)
- [https://symfony.com/doc/current/frontend.html](https://symfony.com/doc/current/frontend.html)
- [https://symfony.com/doc/current/frontend/encore/simple-example.html](https://symfony.com/doc/current/frontend/encore/simple-example.html)
