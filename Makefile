up: docker-up

docker-up:
	docker-compose up --build -d

docker-down:
	docker-compose down

docker-restart: docker-down docker-up

composer:
	docker-compose exec php composer install

composer-update:
	docker-compose exec php composer update

migration:
	docker-compose exec php bin/console doctrine:migrations:migrate

migration-create:
	docker-compose exec php bin/console make:migration
	sudo chown -R $$USER:$$USER src

src-my:
	sudo chown -R $$USER:$$USER src

form:
	docker-compose exec php bin/console make:form
	sudo chown -R $$USER:$$USER src

crud:
	docker-compose exec php bin/console make:crud
	sudo chown -R $$USER:$$USER src
	sudo chown -R $$USER:$$USER templates

entity:
	docker-compose exec php bin/console make:entity
	sudo chown -R $$USER:$$USER src

controller:
	docker-compose exec php bin/console make:controller
	sudo chown -R $$USER:$$USER src

command:
	docker-compose exec php bin/console make:command
	sudo chown -R $$USER:$$USER src

php:
	docker-compose exec php bash

nginx:
	docker-compose exec nginx bash

db:
	docker-compose exec db bash

my:
	sudo chown -R $$USER:$$USER src
	sudo chown -R $$USER:$$USER config
	sudo chown -R $$USER:$$USER templates
	sudo chown -R $$USER:$$USER public
	sudo chown -R $$USER:$$USER vendor
	sudo chown -R $$USER:$$USER docker

consume-command:
	docker-compose exec php bin/console rabbitmq:consumer command

consume-command2:
	docker-compose exec php bin/console rabbitmq:consumer command2

consume-command3:
	docker-compose exec php bin/console rabbitmq:consumer command3

consume-command4:
	docker-compose exec php bin/console rabbitmq:consumer command4

collect-pages:
	docker-compose exec php bin/console app:onliner-collect-product-pages

dump-db:
	docker-compose exec db pg_dump -U db_user db_name -f dump.sql -h localhost
	zip -m docker/db/dump/dump.zip docker/db/dump/dump.sql
