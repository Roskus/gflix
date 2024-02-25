# Gflix
Netflix clone Site based in Laravel
![Screenshoot](./docs/screenshoot.png)

## Technologies
* PHP 8.2
* Laravel 10
* Twitter bootstrap
* Postgres
* [OpenAdmin](https://github.com/open-admin-org/open-admin) 

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

Covert subitule with ffmpeg
```terminal
ffmpeg -i halo_s01e05.srt halo_s01e05.vtt
```

Convert video format
```terminal
ffmpeg -i halo_s01e05.avi halo_s01e05.mp4
```
## Create Self-Signed SSL Certificate
```terminal
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout ./etc/ssl/private/gflix.key -out ./etc/ssl/certs/gflix.crt
```
