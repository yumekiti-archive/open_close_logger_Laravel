UID := $(shell id -u)
GID := $(shell id -g)
USER := $(UID):$(GID)
dc := user=$(USER) docker-compose -f ./docker/docker-compose.yml

.PHONY: test
test:
	make file-rm
	make init
	make seed

.PHONY: init
init:
	$(dc) up -d --build && \
	bash ./docker/php/php.sh
	$(dc) exec php /bin/bash -c "composer install"
	$(dc) exec php /bin/bash -c "cp .env.example .env"
	$(dc) exec php /bin/bash -c "php artisan key:generate"
	$(dc) exec php /bin/bash -c "php artisan migrate"

.PHONY: seed
seed:
	$(dc) exec php php artisan db:seed

.PHONY: fresh
fresh:
	$(dc) exec php php artisan migrate:fresh --seed

.PHONY: up
up:
	$(dc) up -d --build

.PHONY: down
down:
	$(dc) down

.PHONY: reup
reup:
	$(dc) restart

.PHONY: rm
rm:
	$(dc) down --rmi all

.PHONY: logs
logs:
	$(dc) logs -f

.PHONY: sh-php
sh-php:
	$(dc) exec php /bin/bash

.PHONY: sh-db
sh-db:
	$(dc) exec db /bin/bash

.PHONY: sh-db-in
sh-db-in:
	$(dc) exec db /bin/bash -c "mysql -u logger-user -p logger-database"

.PHONY: sh-vue
sh-vue:
	$(dc) exec vue /bin/bash

.PHONY: d-rm
d-rm:
	docker stop `docker ps -aq` ;\
	docker rm `docker ps -aq`

.PHONY: d-clean
d-rm:
	docker stop `docker ps -aq` ;\
	docker rm `docker ps -aq` ; \
	docker rmi `docker images -q` ;\
	docker system prune -f ;\
	docker volume prune -f ;\
	docker network prune -f

.PHONY: npm
npm:
	$(dc) exec vue /bin/bash -c "npm install"
	$(dc) exec vue /bin/bash -c "npm run build"

.PHONY: ssl
ssl:
	bash ./docker/nginx/ssl/ssl.sh

.PHONY: file-rm
file-rm:
	rm -f ./docker/laravel-echo/laravel-echo-server.lock
	rm -fr ./vue/node_modules/

.PHONY: open
open:
	python3 ./raspi/test/open.py
.PHONY: close
close:
	python3 ./raspi/test/close.py

.PHONY: clean
clean:
	make file-rm
	make d-rm

.PHONY: pi-test
pi-test:
	python3 ./raspi/test/test-OCLogger.py