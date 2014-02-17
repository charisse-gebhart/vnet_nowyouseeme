#!/bin/bash
sudo apt-get update
sudo apt-get -y install apache2 php5 libapache2-mod-php5
sudo apt-get -y install imagemagick
sudo apt-get -y install git
sudo echo 127.0.0.1 nowyouseeme.com >> /etc/hosts
git clone https://github.com/git/git
git config --global user.name charisse-gebhart
git config --global user.email charisse_gebhart@hotmail.com
ssh-keygen -t rsa -C charisse_gebhart@hotmail.com
ssh -T git@github.com
git clone git@github.com:charisse-gebhart/vnet_nowyouseeme.git
while alive do git pull nysm; sleep 3600; done
