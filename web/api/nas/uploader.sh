#first argument is the target path, second argument is the file path
if [ ! -f cookie ];then echo "no cookie";
fi
echo $1
echo $2
curl -v -b cookie -c cookie -e ncdc.nctucs.net -include --form rformat=extjs --form target_path=$1 --form file_path=@$2 http://ncdc.nctucs.net/adv,/cgi-bin/file_upload-cgic
