dev-start:
	docker-compose up -d --build
dev-down:
	docker-compose down

dev-restart:
	make dev-down
	make dev-start
dev-php:
	docker exec -it stager-st-php-fpm /bin/bash
