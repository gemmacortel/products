install:
	docker-compose up -d
	docker exec -it products_php-fpm_1 composer install
	docker exec -it products_php-fpm_1 bin/console doctrine:migrations:migrate
	docker exec -it products_php-fpm_1 bin/console doctrine:migrations:migrate --env=test

up:
	docker-compose up -d

down:
	docker-compose down -v

test:
	docker exec -it products_php-fpm_1 vendor/bin/phpunit
