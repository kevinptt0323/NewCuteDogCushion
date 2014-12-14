if [ ! -f cookie ];then exit 1;
fi
curl -b cookie -c cookie -e http://ncdc.nctucs.net -include --form path=/$1 --form share=$2 http://ncdc.nctucs.net/cmd,/ck6fup6/fileBrowser_main/state
