#!/bin/sh
if [ ! -f cookie ];then echo "no cookie";
fi
result=`env /usr/local/bin/curl -v -b cookie -c cookie -e ncdc.nctucs.net -include --form rformat=extjs --form target_path=$1 --form file_path=@$2 http://ncdc.nctucs.net/adv,/cgi-bin/file_upload-cgic`
