sudo docker-compose down
git pull
sudo docker-compose run docker-php-fpm composer install
sudo docker-compose up -d
sudo docker-compose run docker-php-fpm composer clear-all-cache
sudo docker-compose run docker-php-fpm php vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
