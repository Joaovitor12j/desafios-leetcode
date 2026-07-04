.PHONY: build install test test-php test-sql shell down clean

build:
	docker compose build

install:
	docker compose run --rm app composer install

test:
	docker compose run --rm app vendor/bin/phpunit

test-php:
	docker compose run --rm app vendor/bin/phpunit --testsuite PHP

test-sql:
	docker compose run --rm app vendor/bin/phpunit --testsuite SQL

shell:
	docker compose run --rm app bash

down:
	docker compose down --rmi local --volumes --remove-orphans

clean: down
