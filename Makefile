composer-dump:
	docker run --rm -it -v `pwd`:/app composer:latest composer dump-autoload

run-test:
	docker run --rm -it -v `pwd`:/app composer:latest vendor/bin/phpunit
