# HELIFOX v3.3

---

## Usage

- Clone the repo
- Build project : `docker-compose up -d --build`
- Environmental vars : `.env`
- Application URL : `http://localhost:8881/`
- PhpMyAdmin : `http://localhost:8000/`

---

## Installation

- After docker build, connecto to container terminal : `docker exec -it fx_php_fpm ash`
- Run `composer install`
- Run `php bin/console database:init`
- GOTO Application URL

---

## Notes

- Define **routes** in `<your_app>/configuration/routes.php`
- Define **commands** in `<your_app>/configuration/commands.php`
- Define **environment variables** in `<your_app>/.env` & `<your_app>/configuration/settings.php`
- Run command in terminal : `php bin/console <your_defined_command>`
- Static methods that might help in `<your_app>/services/AppHelper.php`

---

## Packages

### "require"

- https://packagist.org/packages/league/plates (Templating engine)
- https://packagist.org/packages/symfony/http-foundation (Request handler)
- https://packagist.org/packages/catfan/medoo (DB handler)
- https://packagist.org/packages/ramsey/uuid (Unique identifier generator)
- https://packagist.org/packages/vlucas/phpdotenv (.env)
- https://packagist.org/packages/josantonius/session (Session manipulation)
- https://packagist.org/packages/mrclay/minify (CSS/JS minifier)
- https://packagist.org/packages/pimple/pimple (Dependency injection)

### "require-dev"

- https://packagist.org/packages/fzaninotto/faker (Fake data generator)
- https://packagist.org/packages/tracy/tracy (Debugger)


---

## Docs

- Methods available in **Controller** :
- - `$this->getIps()`
- - `$this->generateRandomAlphaNumericString(75)`
- - `$this->stringNormalizer('This is a text', '-')`
- - `$this->redirectTo('any-other-url-goes-here')`