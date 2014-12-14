#!/bin/sh
url=$1
cd tmp&&/usr/local/bin/curl -O $url
file=`env ls`
dir=`pwd`
echo "$dir/$file"
