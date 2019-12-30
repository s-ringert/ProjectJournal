# About
* ProjectJournal
* Simple Blog for Pen and Paper Adventures
* [![Build Status](https://travis-ci.org/s-ringert/ProjectJournal.svg?branch=master)](https://travis-ci.org/s-ringert/ProjectJournal)

# TODO
* Database doctrine config
* Backend for create/update entries
* Auth for Backend
* Frontend for reading Entries

# Setup
* clone repo
* copy config dist files
```shell
cp .env.dist .env
cp config/autoload/database.local.php.dist config/autoload/database.local.php
cp config/autoload/development.local.php.dist config/autoload/development.local.php      
```
* set new db Password
* composer install
```shell
sudo docker-compose run docker-php-fpm composer install
```
                            
* set rw on cache dir                        
```shell
chmod -R 777 data/cache
```

* init db
```shell
sudo docker-compose run docker-php-fpm php vendor/bin/doctrine orm:schema-tool:create
```

* start application
```shell
sudo docker-compose up
```

# Helpful commands
## Start Application
```shell
sudo docker-compose up -d
```
## Run Composer
```shell
sudo docker-compose run docker-php-fpm composer
```
## Run CI check
```shell
sudo docker-compose run docker-php-fpm composer check
```

## Run Doctrine
```shell
sudo docker-compose run docker-php-fpm php vendor/bin/doctrine
```

## Run PHP CLI
```shell
 sudo docker-compose run docker-php-fpm php
```

## Clear Caches
```shell
sudo docker-compose run docker-php-fpm composer clear-all-cache
```