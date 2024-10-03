#!/bin/bash

# colors
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' 

# checking if service is available
check_command() {
    if ! command -v "$1" &> /dev/null; then
        echo -e "${RED}$1 is not installed, please install $1 and try again${NC}"
        exit 1
    fi
}

# checking 
check_command docker
check_command docker-compose

echo -e "${GREEN}Starting Vagrant....${NC}"
vagrant up

echo -e "${GREEN}Connecting with Vagrant...${NC}"
vagrant ssh -c "cd /vagrant"

echo -e "${GREEN}Checking version of docker and docker-compose...${NC}"
docker --version
docker-compose --version

echo -e "${GREEN}Starting docker-compose...${NC}"
docker-compose up -d

echo -e "${GREEN}Webapp has been deployed, open http://localhost:8080${NC}"

