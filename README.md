# Url Shortner

## Intro

Simple site to generate a shorten url. Built on Laravel and React. The generated url is a 6 character long, each character will be one of the following: **abcdefghijklmnopqrstuvwxyz0123456789** This gives 2,176,782,336 unique combinations (36^6)

## Setup

### Build the Dockerfile

`docker build --rm -f "Dockerfile" -t short_url:latest "."`

__* This might take a while__

### Run docker compose

`docker-compose -f "docker-compose.yml" up -d --build`

### Run composer install

`docker exec short_url_local_php composer install`

### To run unit test run

`docker exec short_url_local_php vendor/bin/phpunit`

### Navigate to http://localhost:8080/

