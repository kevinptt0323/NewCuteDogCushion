#first argument is username , second argument is passwd
result=`env curl -b cookie -c cookie -e ncdc.nctucs.net "http://ncdc.nctucs.net/adv,/cgi-bin/weblogin.cgi?username=$1&password=$2"`
if ( echo $result |grep -cE "8|9|14" >/dev/null) ;then
    echo "success"
else echo "failed"
fi
