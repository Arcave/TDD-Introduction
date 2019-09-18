#!/usr/bin/env bash

docker-compose run tests composer install
sudo chown ${USER}:${USER} -R ./