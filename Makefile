composer:
	composer install

cs: composer
	bin/php-cs-fixer fix --config=.php_cs --verbose --diff

test: composer
	bin/phpspec run
