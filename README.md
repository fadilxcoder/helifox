# HELIFOX v3.3

---

## Usage

- Clone the repo
- Build project : `docker-compose up -d --build`
- Application URL : `http://localhost:8881/`
- PhpMyAdmin : `http://localhost:8000/`

---

## INSTALLATION

- After docker build, connecto to container terminal : `docker exec -it fx_php_fpm ash`
- Run `composer install`
- Run `php bin/console database:init`
- GOTO Application URL

---

# Packages

### "require"

- https://packagist.org/packages/league/plates
- https://packagist.org/packages/symfony/http-foundation
- https://packagist.org/packages/catfan/medoo
- https://packagist.org/packages/ramsey/uuid

### "require-dev"

- https://packagist.org/packages/fzaninotto/faker
- https://packagist.org/packages/tracy/tracy
