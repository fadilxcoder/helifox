# HFX v4

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
- `templates` hold twigs layouts
- Define services needed in `src/Services/..`
- SQL with PDO goes in `src/Repository/..`
- Controller for twig rendering - `src/Controller/..`
- Error handlers - `src/Controller/Errors/`

### Routing notes

- Documentation on packagist & https://github.com/nikic/FastRoute

> ` $routes->addRoute('GET', '/content/{id:\d+}/{slug: [a-z]+}[/{extra}]', [ContentController::class, 'show']);`
- Action type : `GET / POST`
- Url : `/content/{id:\d+}/{slug:[a-z]+}[/{extra}]`
- - `{id}` : The *id* must be a number **(\d+)**
- - `[/{slug}]` : The *slug* must be an alphabet **([a-z]+)**
- - `[/{extra}]` : The *extra* suffix is optional
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

## Packages (require / require-dev)

- https://packagist.org/packages/nikic/fast-route
- https://packagist.org/packages/symfony/http-kernel
- https://packagist.org/packages/symfony/http-foundation
- https://packagist.org/packages/vlucas/phpdotenv
- https://packagist.org/packages/twig/twig
- https://packagist.org/packages/php-di/php-di
- https://packagist.org/packages/symfony/asset
- https://packagist.org/packages/tracy/tracy
- https://packagist.org/packages/filp/whoops
- https://packagist.org/packages/fzaninotto/faker
- https://packagist.org/packages/mnapoli/silly


## Environment configuration

- **httpd-vhosts.conf**

```
<VirtualHost *:80>
	ServerName helifox.local
	DocumentRoot c:/wamp64/www/helifox/public/
</VirtualHost>
```

## Usage

- Set up `vhosts`
- `Composer Install`
- Populate DB - *users* : `php bin/console add:user`
- Tested demo URL :
- - http://helifox.local/
- - http://helifox.local/content/5/fx/?action=cancel
- - http://helifox.local/content/5/fx/player?action=cancel