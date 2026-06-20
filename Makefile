#!/bin/bash

DOCKER_PHP = php

help: ## Show this help menu
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

build: ## Create docker build containers
	docker compose build

build-pg:
	docker compose -f docker-compose.yml -f docker-compose.postgres.yml up -d

up: ## Start docker container
	docker compose up -d

down: ## Stop docker container
	docker compose down

ssh: ## Connect into php container
	docker exec -it ${DOCKER_PHP} /bin/bash

composer-install: ## Run composer install inside container
	docker exec -it ${DOCKER_PHP} composer install

composer-update: ## Run composer update inside container
	docker exec -it ${DOCKER_PHP} composer update

migrate: ## Run Laravel migrations
	docker exec -it ${DOCKER_PHP} php artisan migrate --no-interaction

seed: ## Run Laravel seeders
	docker exec -it ${DOCKER_PHP} php artisan db:seed

test: ## Run Laravel phpunit tests
	docker exec -it ${DOCKER_PHP} php artisan test

publish-admin: ## Publish Open Admin vendor files
	docker exec -it ${DOCKER_PHP} php artisan vendor:publish --provider="OpenAdmin\Admin\AdminServiceProvider"

storage-link: ## Publish storage
	docker exec -it ${DOCKER_PHP} php artisan storage:link

install: ## Setup local environment
	cp .env.example .env
	$(MAKE) build
	$(MAKE) up
	$(MAKE) composer-install
	docker exec -it ${DOCKER_PHP} php artisan key:generate
	$(MAKE) migrate
	$(MAKE) seed
	$(MAKE) publish-admin
	$(MAKE) storage-link

ssl:
	openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout ./etc/ssl/private/gflix.key -out ./etc/ssl/certs/gflix.crt

fix-perms: ## Fix storage and cache permissions
	sudo chmod -R 775 storage bootstrap/cache
	sudo chown -R ${USER}:www-data storage bootstrap/cache

# Ubuntu + Nginx alternatives
build-ubuntu: ## Build Ubuntu + Nginx docker image
	docker compose -f docker-compose.ubuntu.yml build

up-ubuntu: ## Start Ubuntu + Nginx containers
	docker compose -f docker-compose.ubuntu.yml up -d

down-ubuntu: ## Stop Ubuntu + Nginx containers
	docker compose -f docker-compose.ubuntu.yml down -v

ssh-ubuntu: ## Connect to Ubuntu container
	docker exec -it gflix-app /bin/bash
