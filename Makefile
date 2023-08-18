COMMANDS := $(MAKEFILE_LIST)

lint:
	@docker-compose run --rm php-apache php vendor/bin/php-cs-fixer fix --dry-run --diff
	@docker-compose run --rm php-apache php vendor/bin/phpcs
	@docker-compose run --rm php-apache php vendor/bin/phpstan

lintfix:
	@docker-compose run --rm php-apache php vendor/bin/php-cs-fixer fix

test:
	@docker-compose run --rm php-apache composer vendor/bin/phpunit