#!/bin/bash

echo "Get Jenkins Docker Image ID"
docker images -a
docker system prune -af
docker build -t 830161682210.dkr.ecr.us-east-1.amazonaws.com/demo-app-ecr:latest .
IMAGE_ID=`docker images | grep -i image -A 1 | awk 'FNR == 2 {print}' | awk '{ print $3 }'`
docker tag $IMAGE_ID 830161682210.dkr.ecr.us-east-1.amazonaws.com/demo-app-ecr
sleep 3
aws --region us-east-1 ecr get-authorization-token 
#aws --region us-east-1 ecr describe-registry
aws --region us-east-1 ecr get-login-password --region us-east-1 | docker login --username AWS --password-stdin 830161682210.dkr.ecr.us-east-1.amazonaws.com
sleep 3
docker push 830161682210.dkr.ecr.us-east-1.amazonaws.com/demo-app-ecr:latest

