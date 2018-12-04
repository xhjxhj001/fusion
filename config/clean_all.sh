#!bin/bash
docker rm -f $(docker ps -aq)
docker volume rm -f $(docker volume ls -q)
docker network rm $(docker network ls -q)
