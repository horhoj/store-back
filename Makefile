db_host=mariadb
db_name=db
db_name_test=db_test
db_user=root
db_password=qwerty

#LARAVEL
#установка шаблона LARAVEL
laravel-install-framework:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm composer create-project --prefer-dist laravel/laravel ./
	#устанавливаем настройки базы данных
	sleep 60
	sed -i "s/DB_HOST=127.0.0.1/DB_HOST=$(db_host)/g" ./src/.env
	sed -i "s/DB_DATABASE=laravel/DB_DATABASE=$(db_name)/g" ./src/.env
	sed -i "s/DB_USERNAME=root/DB_USERNAME=$(db_user)/g" ./src/.env
	sed -i "s/DB_PASSWORD=/DB_PASSWORD=$(db_password)/g" ./src/.env
	#создаем базы данных
	docker-compose exec mariadb mysql --user=$(db_user) --password=$(db_password) -e "CREATE DATABASE IF NOT EXISTS $(db_name) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
	docker-compose exec mariadb mysql --user=$(db_user) --password=$(db_password) -e "CREATE DATABASE IF NOT EXISTS $(db_name_test) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
    #выполняем миграции
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan migrate
	#устанавливаем версию php
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm composer require php
	#установка прав на папки
	make laravel-permission
	#запускаем тесты
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php ./vendor/bin/phpunit

db-create:
	sleep 60
	docker-compose exec mariadb mysql --user=$(db_user) --password=$(db_password) -e "CREATE DATABASE IF NOT EXISTS $(db_name) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
	docker-compose exec mariadb mysql --user=$(db_user) --password=$(db_password) -e "CREATE DATABASE IF NOT EXISTS $(db_name_test) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"


#debug-панель
laravel-install-debug-panel:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm composer require barryvdh/laravel-debugbar --dev


laravel-permission:
	-sudo chmod -R 755 ./src/
	-sudo chmod -R 777 ./src/storage ./src/backend/bootstrap/cache

laravel-run-phpunit:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm ./vendor/bin/phpunit

laravel-support-ide-install-component:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm composer require --dev barryvdh/laravel-ide-helper
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm composer require --dev doctrine/dbal
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config
	sed -i "s/'include_fluent' => false,/'include_fluent' => true,/g" ./src/config/ide-helper.php

laravel-support-ide:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan ide-helper:generate
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan ide-helper:meta
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan ide-helper:models

laravel-cache-clear:
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan cache:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan route:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan view:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan config:clear
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm php artisan config:cache

laravel-migrate-and-seed:
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan migrate:fresh
	docker-compose exec --user $(shell id -u):$(shell id -g) php_fpm php artisan db:seed

laravel-assets-dev:
	docker-compose exec --user $(shell id -u):$(shell id -g) node npm run watch

laravel-assets-build:
	docker-compose exec --user $(shell id -u):$(shell id -g) node npm run prod

laravel-assets-npm-install:
	docker-compose exec --user $(shell id -u):$(shell id -g) node npm i

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

clear-db:
	-sudo rm -R ./db/* ./db/.*

clear-src:
	-sudo rm -R ./src/* ./src/.*

clear-all: clear-nginx-logs clear-db clear-src
	
permission-755:
	sudo chmod -R 755 ./src/

permission-777:
	sudo chmod -R 777 ./src/

install-test-enviroment:
	mkdir -p ./src/public
	echo "<?php">>./src/public/index.php
	echo "phpinfo();">>./src/public/index.php

console-php:
	docker-compose exec --user $(shell id -u):$(shell id -g)  php_fpm /bin/bash

console-node:
	docker-compose exec --user $(shell id -u):$(shell id -g)  node /bin/bash

