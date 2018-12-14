#!bin/bash
docker-compose  down
docker-compose  up -d
if [ $1 -a $1 = '--composer' ]; then
	cd ../backend
	composer update
	cd -
fi
