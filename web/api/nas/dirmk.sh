#first arg is the create path,second arg is the shared path
if [ ! -f cookie ];then exit 1;
fi
curl -b cookie -c cookie -e http://ncdc.nctucs.net -include --form share=public --form path=/hahaha http://ncdc.nctucs.net/cmd,/ck6fup6/fileBrowser_main/create_folder
