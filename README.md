# PHP Micro Framework with Phinx

![Maintainer](https://img.shields.io/badge/maintainer-fadilxcoder-blue)

<img src="https://raw.githubusercontent.com/MikeCodesDotNET/ColoredBadges/master/svg/dev/languages/php.svg" alt="php" style="max-width: 100%;"> <img src="https://raw.githubusercontent.com/MikeCodesDotNET/ColoredBadges/master/svg/dev/frameworks/nodejs.svg" alt="nodejs" style="max-width: 100%;">
---

## Notes

- Define your **commands** in `config/commands.php` & create class in `src/Commands/..` for each command
- To send data to twig : `src/Core/Twig.php` & `src/Core/Controller.php`
- `src/Core/Database.php` - `findAll()` , `findOne()`, `update()` *For insert / delete / update*
- All controller extends `src/Core/Controller.php` - Contain useful methods
- All repository extends `src/Core/Repository.php` - Contain DB connection
- Register variables / classes concerning DI in `src/Core/Container.php` - (Documentation : https://php-di.org/doc/)
- `Client.php` / `ClientResolverInterface` - Application entry point from `public/index.php`
- Define your **routes** in `src/Config/Router.php`
- `templates` hold twigs layouts - (Documentation : https://twig.symfony.com/doc/3.x/api.html)
- Define services needed in `src/Services/..`
- SQL with PDO goes in `src/Repository/..`  & **NEVER use `__constructor` due to extend class**
- Controller for twig rendering - `src/Controller/..` & **NEVER use `__constructor` due to extend class**
- Error handlers - `src/Controller/Errors/`
- `.env` - configuration / environmental variables
- Uses node - webpack - compilation of assets
- `public/dist` for compiled assets

---

## Phinx

- Create a migration : `vendor/bin/phinx create UsersMigration`
- Add SQL to created migration
- Migrate data : `vendor/bin/phinx migrate`
- Create newly created seeding : `vendor/bin/phinx seed:create UserSeeder`
- Seed data : `vendor/bin/phinx seed:run`
- `vendor/bin/phinx migrate -t 20220820174815 & vendor/bin/phinx seed:run -s UserSeeder` - Specific migration / seeder

---

### Routing notes

- Documentation on packagist & https://github.com/nikic/FastRoute

> ` $routes->addRoute('GET', '/content/{id:\d+}/{slug: [a-z]+}[/{extra}]', [ContentController::class, 'show']);`
- Action type : `GET / POST`
- Url : `/content/{id:\d+}/{slug:[a-z]+}[/{extra}]`
- - `{id}` : The *id* must be a number **(\d+)**
- - `{slug}` : The *slug* must be an alphabet **([a-z]+)**
- - `[/{extra}]` : The *extra* suffix is optional - square bracket
- [ContentController::class, 'show']
- - `ContentController::class` : Controller called 
- - `show` : Method called

> `// Matches /user/foo/bar as well`
> `$r->addRoute('GET', '/user/{name:.+}', 'handler');`

<br>

> `// This route`
> `$r->addRoute('GET', '/user/{id:\d+}[/{name}]', 'handler');`
> `// Is equivalent to these two routes`
> `$r->addRoute('GET', '/user/{id:\d+}', 'handler');`
> `$r->addRoute('GET', '/user/{id:\d+}/{name}', 'handler');`

<br>

> `// Multiple nested optional parts are possible as well`
> `$r->addRoute('GET', '/user[/{id:\d+}[/{name}]]', 'handler');`

<br>

> `// This route is NOT valid, because optional parts can only occur at the end`
> `$r->addRoute('GET', '/user[/{id:\d+}]/{name}', 'handler');`

<br>

> `// Matches /user/42, but not /user/xyz`
> `$r->addRoute('GET', '/user/{id:\d+}', 'handler');`

<br>

> `// Matches /user/foobar, but not /user/foo/bar`
> `$r->addRoute('GET', '/user/{name}', 'handler');`

<br>

> `// Matches /user/foo/bar as well`
> `$r->addRoute('GET', '/user/{name:.+}', 'handler');`

<br>

`'/[{extra}]'` : Allowing `<URL>/?fb_click=FB_ID&utm=UTM_ID&gtm=GTM_ID` & `<URL>/`

---

### Routing Regex

- The rules : `'/content/{id:\d+}/{slug:[a-z]+}[/{extra}]'`
- Take the part : `{slug:[a-z]+}`
- Part for regex manipulation : `[a-z]` **Allow only 'a' to 'z'**
- Modify it : `[a-zA-Z0-9-_&]` 
- - **Allow only** : 
- - `a` to `z`
- - `A` to `Z`
- - `0` to `9`
- - `-` *dash*
- - `_` *underscore*
- - `&` *ampersand*
- Finally : `{slug:[a-zA-Z0-9-_&]+}`

---

## Packages (require / require-dev) / URLs

- https://packagist.org/packages/nikic/fast-route - `Routes`
- https://packagist.org/packages/symfony/http-kernel
- https://packagist.org/packages/symfony/http-foundation - `Request [GET, POST]`
- https://packagist.org/packages/vlucas/phpdotenv - `.env`
- https://packagist.org/packages/twig/twig - `Twig templating` (https://twig.symfony.com/doc/3.x/)
- https://packagist.org/packages/php-di/php-di - `Dependency Injection`
- https://packagist.org/packages/symfony/asset
- https://packagist.org/packages/tracy/tracy - `Debugger`
- https://packagist.org/packages/filp/whoops - `Debugger`
- https://packagist.org/packages/fakerphp/faker // https://fakerphp.github.io/ - `Dummy data provider`
- https://packagist.org/packages/mnapoli/silly - `CLI`
- https://book.cakephp.org/phinx/0/en/contents.html - `Phinx Documentation`

---

## Development utilities

- https://picocss.com/ `Minimal CSS Framework for semantic HTML`
- https://picocss.com/examples/preview/ & https://github.com/picocss/examples `Pico examples`

---

## Usage

- Configure `.env`
- `composer install`
- `composer update` when modifying specific **packages** - *PS. `packages/chrome/`, `"version": "master"` in `composer.json`*
- DB tables :
- - `vendor/bin/phinx migrate` - Migrate DB
- - `vendor/bin/phinx seed:run` - Popupate DB
- Command : `php bin/console database:users 1 / php bin/console database:users 155` - Fetching data from `users` with specified ID

_deprecated in latest release_
- Assets `npm install`
- `npm rebuild node-sass` - Changing environment
- Compiling assets 
- - `npm run js-build` : compile JS
- - `npm run css-build` : compile CSS
- - `npm run js-build-watch` : compile JS in *watch mode*

---


## Utils

- PhpMyAdmin
- - URL :  http://helifox.local:8000/
- - HOST : `database`
- - USERNMAE : `myuser`
- - PASSWORD : `secret`
- - DATABASE : `mydb`

## Demo URL for testing

- - http://helifox.local:8881/
- - http://helifox.local:8881/?fb_click=FB_ID&utm=UTM_ID&gtm=GTM_ID
- - http://helifox.local:8881/content/5/fx/?action=cancel
- - http://helifox.local:8881/content/5/fx/player?action=cancel
- - http://helifox.local:8881/content/5/this-is-a-demo-url-a555&XX7
- - http://helifox.local:8881/any-thing-url
- - http://helifox.local:8881/user
- - http://helifox.local:8881/users
- - http://helifox.local:8881/?XDEBUG_SESSION_START=start (Xdebug)
