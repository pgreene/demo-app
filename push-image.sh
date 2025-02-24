#!/bin/bash

echo "Get Jenkins Docker Image ID"
docker images -a

# change this to your local aws profile name for WON
PROFILE="won"
IMAGE_ID=`docker images | grep -i image -A 1 | awk 'FNR == 2 {print}' | awk '{ print $3 }'`

#docker tag $IMAGE_ID 830161682210.dkr.ecr.us-east-1.amazonaws.com/prod-jenkins-ecr
docker build -t 830161682210.dkr.ecr.us-east-1.amazonaws.com/prod-jenkins-ecr:latest .
sleep 3
aws --profile $PROFILE ecr get-authorization-token 
#aws --profile $PROFILE ecr describe-registry
aws --profile $PROFILE ecr get-login-password --region us-east-1 | docker login --username AWS --password-stdin 830161682210.dkr.ecr.us-east-1.amazonaws.com
sleep 3
docker push 830161682210.dkr.ecr.us-east-1.amazonaws.com/prod-jenkins-ecr:latest

