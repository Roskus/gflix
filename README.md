# Gflix
Netflix clone Site based in Laravel 8

## Setup
Construct docker image
```terminal
docker build -t gflix .
```
Run and access to php machine
```terminal
docker run -p 80:80 -p 443:443 --name gflix -it gflix /bin/bash
```
