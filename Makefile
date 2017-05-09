.PHONY: composer cs it test

it: cs test

composer:
	composer self-update
	composer validate
	composer install

cs: composer
	bin/php-cs-fixer fix --config=.php_cs --verbose --diff

test: composer
	bin/phpspec run
