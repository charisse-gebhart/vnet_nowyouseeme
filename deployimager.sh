#!/bin/bash
sudo apt-get update
sudo apt-get -y install apache2 php5 libapache2-mod-php5
#sudo apt-get -y install imagemagick
sudo apt-get -y install git

# edit php.ini file to allow large uploads
sudo echo "upload_max_filesize = 100M" >> /etc/php5/apache2/php.ini
sudo /etc/init.d/apache2 reload

# create fake host on local machine
sudo echo "127.0.0.1 nowyouseeme.com" >> /etc/hosts
sudo echo "DocumentRoot /var/www" >> /etc/apache2/sites-available/default
sudo echo "DirectoryIndex info.php" >> /etc/apache2/sites-available/default

# pull in ISS from github repo
git clone git@github.com:charisse-gebhart/vnet_nowyouseeme.git

# Update ISS from repo every hour
while alive do git pull vnet_nowyouseeme; sleep 3600; done
