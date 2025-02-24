FROM ubuntu/nginx:latest
USER root

RUN apt-get -y update 
RUN apt-get -y install apt-utils gnupg2 software-properties-common net-tools curl git git-lfs wget unzip
RUN apt-get -y install percona-toolkit
RUN apt-get -y install --no-install-recommends mysql-client*
RUN apt-get -y install mariadb-client
RUN apt-get -y install sudo
#RUN apt-get -y install php php-cli php-mysql php-xml php-fpm php-mbstring php-zip php-zlib php-pear php-curl php-dom php-xml php-intl php-mbstring php-soap php-tokenizer php-xml
RUN apt-get -y install php 

EXPOSE 80/tcp
CMD ["nginx", "-g", "daemon off;"]