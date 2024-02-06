# Gflix
Netflix clone Site based in Laravel

## Technologies
* PHP 8.2
* Laravel 10
* Twitter bootstrap
* Postgres

## Setup
Construct docker image
```terminal
docker build -t gflix .
```
Run and access to php machine
```terminal
docker run -p 80:80 -p 443:443 --name gflix -it gflix /bin/bash
```

### For local development
Docker-compose
```terminal
docker-compose build
docker-compose up -d
```

## Utils
Online Subtitle format converter from .srt -> .vtt

https://www.happyscribe.com/subtitle-tools/convert-srt-to-vtt
