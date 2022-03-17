#!/usr/bin/env bash

name="loopygen"

case $1 in
    build) docker-compose build;;
    reload) docker-compose up -d --build --force-recreate;;
    up) docker-compose up -d;;
    down) docker-compose down;;
    *) docker-compose exec php $@;;
esac