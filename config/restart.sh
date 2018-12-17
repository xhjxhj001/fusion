#!bin/bash
############## check if there is an indicated server name ###########
ARG=
if [ $1 -a $1 != '--composer' ]; then
	ARG=$1		
fi
############## restart docker container ###################
docker-compose  down
docker-compose  up -d $ARG
###########################################################

############## check if should update composer ############
if [[ $1 && $1 == '--composer' ]] || [[ $2 && $2 == '--composer' ]]; then
	cd ../backend
	composer update
	cd -
fi
