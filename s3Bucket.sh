#!/bin/bash
# Downloads and installs S3FS
# Sets up a simple mount point at the designated location
# Most of the instructions here are taken from the original FuseOverAmazon project (see URL)
# @url https://code.google.com/p/s3fs/wiki/FuseOverAmazon
# @author Matt Carter <m@ttcarter.com>
# @date 2014-02-05

# OPTIONS ----------------------

# S3 Options, the Bucket, AccessKey + SecretKey
# You can find the bucket setup via the Amazon Console > S3
# NOTE: When creating a bucket go to Properties > Permissions and add 'Grantee: Authenticated users' and 'List', 'Upload' and 'Delete'
# MC - Fill in the following
BUCKET=cgebhart-image-bucket
ACCESSKEY=AKIAI4DTY6HC7PC2BAOA
SECRETKEY=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

# Driver options
VERSION=1.74

# Server options
BUCKETPATH=/var/www/images

# /OPTIONS ---------------------


cd

# Install all pre-reqs
sudo apt-get update
sudo apt-get install -y build-essential make g++ gcc libfuse-dev fuse-utils libcurl4-openssl-dev libxml2-dev mime-support libcurl4-openssl-dev pkg-config comerr-dev libfuse2 libidn11-dev libkrb5-dev libldap2-dev libselinux1-dev libsepol1-dev fuse-utils sshfs

# Pull in code and extract
wget http://s3fs.googlecode.com/files/s3fs-${VERSION}.tar.gz
tar xvfz s3fs-${VERSION}.tar.gz

# Build everything from source
cd s3fs-${VERSION}
sudo ./configure --prefix=/usr
sudo make
sudo make install

# Clean up
cd
sudo rm -rf "s3fs-${VERSION}"


# Install security permissions
# Create access key file
echo "$ACCESSKEY:$SECRETKEY" | sudo tee /etc/passwd-s3fs
# Correct file permissions
sudo chmod 640 /etc/passwd-s3fs

# Ensure the bucket directory exists
sudo mkdir "$BUCKETPATH" 2>/dev/null
# Mount the bucket
sudo s3fs "$BUCKET" "$BUCKETPATH" -o gid=33,allow_other,umask=002
