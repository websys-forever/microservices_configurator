init-up:
	docker-compose build --build-arg USER_ID=$(id -u) --build-arg GROUP_ID=$(id -g) main-app-php-dev
	docker-compose up
	docker-compose exec main-app-php-dev composer install --no-interaction

up:
	docker-compose up

stop:
	docker-compose stop