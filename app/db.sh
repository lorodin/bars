#!/bin/bash

case $1 in
  "status")
    docker-compose run php composer run-script db:status
    ;;
  "create_migration")
    docker-compose run php composer run-script create:migration
    chmod ugo+rw -R ./src/Migrations/*
    ;;
  "diff")
    docker-compose run php composer run-script db:diff
    chmod ugo+rw -R ./src/Migrations/*
    ;;
  "migrate")
    docker-compose run php composer run-script db:migrate
    ;;
  "rollback")
    docker-compose run php composer run-script db:rollback
    ;;
  *)
    echo "Unknown command"
    ;;
esac
