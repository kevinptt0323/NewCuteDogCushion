#first arg is the create path,second arg is the shared path
curl -b cookie -c cookie -e http://ncdc.nctucs.net -d "path=$1" -d "share=$2" http://ncdc.nctucs.net/cmd,/ck6fup6/fileBrowser_main/create_folder
