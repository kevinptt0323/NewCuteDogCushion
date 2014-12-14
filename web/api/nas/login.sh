#first argument is username , second argument is passwd
curl -b cookie -c cookie -e ncdc.nctucs.net "http://ncdc.nctucs.net/adv,/cgi-bin/weblogin.cgi?username=$1&password=$2"
