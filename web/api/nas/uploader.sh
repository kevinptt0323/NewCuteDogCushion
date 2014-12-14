#first argument is the target path, second argument is the file path
#exit 1 when no cookie , please call the login script
if [ ! -f cookie ];then exit 1;
fi
curl -v -b cookie -c cookie -e ncdc.nctucs.net -include --form rformat=extjs --form target_path=$1 --form file_path=@$2 http://ncdc.nctucs.net/adv,/cgi-bin/file_upload-cgic
