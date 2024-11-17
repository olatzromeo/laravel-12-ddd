#   🐳 Docker + PHP 8.2 + MySQL + Nginx template

## Description

This is a complete stack for running Symfony 7.1 into Docker containers using docker-compose tool.

It is composed by 3 containers:

- `nginx`, acting as the webserver.
- `php`, the PHP-FPM container with the 8.2 version of PHP.
- `db` which is the MySQL database container with a **MySQL 8.0** image.

## Installation

1. Clone this repo. 😀
2. I added a makefile to execute the commands to build and start the docker containers.
