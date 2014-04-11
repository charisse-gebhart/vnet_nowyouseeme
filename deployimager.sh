#!/bin/bash
sudo apt-get update
sudo apt-get -y install apache2 php5 libapache2-mod-php5
sudo apt-get -y install git

# pull in ISS from github repo
git clone git@github.com:charisse-gebhart/vnet_nowyouseeme.git && sudo cd ~/git/vnet_nowyouseeme

# set "DirectoryIndex info.php" and "DocumentRoot ~/git/vnet_nowyouseeme"
sudo cp default /etc/apache2/sites-available

# replace php.ini file to allow upload_max_filesize = 100M
sudo cp php.ini /etc/php5/apache2
sudo /etc/init.d/apache2 reload

# mount s3 cloud storage to images folder
sudo mkdir /var/www/images
bash s3Bucket.sh

