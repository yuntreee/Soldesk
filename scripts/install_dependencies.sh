#!/bin/bash
#Install apache php
apt install -y apache2
apt install libapache2-mpm-itk
apt install -y php7.2
apt install -y php-mbstring php-gd php-curl php-xml php-mysql
#Set Environment
sed -i 's/;date.timezone =/date.timezone = Asia\/Seoul/g' /etc/php/7.2/apache2/php.ini
sed -i 's/;date.timezone =/date.timezone = Asia\/Seoul/g' /etc/php/7.2/cli/php.ini
sed -i 's/short_open_tag = Off/short_open_tag = On/g' /etc/php/7.2/apache2/php.ini
sed -i 's/short_open_tag = Off/short_open_tag = On/g' /etc/php/7.2/cli/php.ini