#!/bin/bash

case $1 in
  "help")
    echo "List commands"
    echo "  help             - print this message"
    echo "  status           - print orm status"
    echo "  create_migration - create new empty migration"
    echo "  diff             - create migration from entities"
    echo "  migrate          - apply all migrations"
    echo "  rollback         - rollback last migration"
    echo "  cache:clear      - clear orm metadata cache"
    ;;
  "status")
    docker-compose run php composer run-script db:status
    ;;
  "create_migration")
    docker-compose run php composer run-script create:migration
    chmod ugo+rw -R migrations/*
    ;;
  "diff")
    docker-compose run php composer run-script db:diff
    chmod ugo+rw -R migrations/*
    ;;
  "migrate")
    docker-compose run php composer run-script db:migrate
    ;;
  "rollback")
    docker-compose run php composer run-script db:rollback
    ;;
  "cache:clear")
    docker-compose run php composer run-script cache:clear
    ;;
  *)
    echo "Unknown command"
    ;;
esac
