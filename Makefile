NAME=test

composer-dump:
	docker run --rm -it -v `pwd`:/app composer:latest composer dump-autoload

run-test:
	docker run --rm -it -v `pwd`:/app composer:latest vendor/bin/phpunit

run-filter-test:
	docker run --rm -it -v `pwd`:/app composer:latest vendor/bin/phpunit --filter ${NAME} /app/test/Dollar/MoneyTest.php