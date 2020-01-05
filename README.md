# Url Shortner

## Summary

This is a simple site to generate a short URL. Paste in your long URL and you'll get back a shorter version 6 characters long. It has been built using Laravel and React. Characters can be any one of the following: **abcdefghijklmnopqrstuvwxyz0123456789** This gives 2,176,782,336 unique combinations (36^6)

## Setup

The site can be run on docker or valet. To run on docker run the following commands in the projects root directory.

### Build the Dockerfile

`docker build --rm -f "Dockerfile" -t short_url:latest "."`

__* This might take a while__

### Run docker compose

`docker-compose -f "docker-compose.yml" up -d --build`

### Run composer install

`docker exec short_url_local_php composer install`

### To run unit tests run

`docker exec short_url_local_php vendor/bin/phpunit`

### Navigate to http://localhost:8080/

