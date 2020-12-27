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

- https://packagist.org/packages/league/plates
- https://packagist.org/packages/symfony/http-foundation
- https://packagist.org/packages/catfan/medoo
- https://packagist.org/packages/ramsey/uuid
- https://packagist.org/packages/vlucas/phpdotenv
- https://packagist.org/packages/josantonius/session
- https://packagist.org/packages/mrclay/minify

### "require-dev"

- https://packagist.org/packages/fzaninotto/faker
- https://packagist.org/packages/tracy/tracy


---

## Docs

- Methods available in **Controller** :
- - `$this->getIps()`
- - `$this->generateRandomAlphaNumericString(75)`
- - `$this->stringNormalizer('This is a text', '-')`
- - `$this->redirectTo('any-other-url-goes-here')`

### Codebase

- Using `mrclay/minify`, do the following
- - `mkdir public/min`
- - `cp vendor/mrclay/minify/example.index.php public/min/index.php`
- - `cp vendor/mrclay/minify/.htaccess public/min/`
- - `cp vendor/mrclay/minify/config.php public/min/`
- - `cp vendor/mrclay/minify/groupsConfig.php public/min/`
