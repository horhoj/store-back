db_host=mariadb
db_name=db
db_name_test=db_test
db_user=root
db_password=qwerty

init: docker-up composer-install db-create laravel-db-prepare laravel-permission

composer-install:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm composer i

db-create:
	sleep 60
	docker-compose exec mariadb mysql --user=$(db_user) --password=$(db_password) -e "CREATE DATABASE IF NOT EXISTS $(db_name) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
	docker-compose exec mariadb mysql --user=$(db_user) --password=$(db_password) -e "CREATE DATABASE IF NOT EXISTS $(db_name_test) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"

laravel-permission:
	-sudo chmod -R 755 ./src/
	-sudo chmod -R 777 ./src/storage ./src/backend/bootstrap/cache

laravel-run-phpunit:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm ./vendor/bin/phpunit

laravel-support-ide:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan ide-helper:generate
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan ide-helper:meta
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan ide-helper:models

laravel-cache-clear: laravel-permission
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan cache:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan route:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan view:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan config:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan config:cache

laravel-migrate-and-seed:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan migrate:fresh
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan db:seed

laravel-db-prepare: laravel-migrate-and-seed laravel-passport-install

laravel-passport-install:
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan passport:install

check: dev-clear-temp dev-lint dev-cs-fix

dev-lint:
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm composer lint

dev-cs-fix:
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm composer cs-fix

dev-psalm:
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm composer psalm

dev-clear-temp:
	-rm -R ./src/temp/.*

#all
docker-up: docker-down
	docker-compose up -d --build

docker-log: docker-down
	docker-compose up --build

docker-down:
	docker-compose stop
	docker-compose down

clear-nginx-logs:
	-sudo rm -R ./nginx_logs/* ./nginx_logs/.*

permission-755:
	sudo chmod -R 755 ./src/

permission-777:
	sudo chmod -R 777 ./src/

console-php:
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm /bin/bash

get-router-list:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan route:list
