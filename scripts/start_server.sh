#! /bin/bash
#Set Environment
sudo sed -i 's/;date.timezone =/date.timezone = Asia\/Seoul/g' /etc/php/7.2/apache2/php.ini
sudo sed -i 's/;date.timezone =/date.timezone = Asia\/Seoul/g' /etc/php/7.2/cli/php.ini
sudo sed -i 's/short_open_tag = Off/short_open_tag = On/g' /etc/php/7.2/apache2/php.ini
sudo sed -i 's/short_open_tag = Off/short_open_tag = On/g' /etc/php/7.2/cli/php.ini

sudo service apache2 restart