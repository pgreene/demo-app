FROM ubuntu/nginx:latest
USER root

RUN apt-get -y update && apt-get install -y apt-utils gnupg2 software-properties-common net-tools curl git git-lfs wget unzip
RUN echo "deb http://ppa.launchpad.net/ansible/ansible/ubuntu trusty main" >> /etc/apt/sources.list
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 93C4A3FD7BB9C367
RUN apt-get install python3-full python3-pip python3-setuptools python3-wheel --yes --quiet
RUN adduser --disabled-password --gecos "" ubuntu
RUN usermod -a -G sudo ubuntu
RUN usermod -a -G root ubuntu
RUN chown -R ubuntu:ubuntu /home/ubuntu/
RUN sudo echo "ubuntu ALL=(ALL:ALL) NOPASSWD: ALL" > /etc/sudoers.d/ubuntu
RUN apt-get -y install percona-toolkit
RUN apt-get -y install --no-install-recommends mysql-client*
RUN apt-get -y install mariadb-client
RUN apt-get -y install groovy
RUN apt-get -y install sudo
RUN python3 -m pip install boto3
RUN python3 -m pip install botocore
RUN python3 -m pip install PyMySQL
RUN pip3 install --upgrade awscli
RUN apt-get -y install php php-cli php-mysql php-xml php-fpm php-mbstring php-zip php-zlib php-pear php-curl php-dom php-xml php-intl php-mbstring php-soap php-tokenizer php-xml
