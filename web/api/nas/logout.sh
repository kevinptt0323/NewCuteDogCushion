#!/bin/sh
curl -v -b cookie -c cookie -e ncdc.nctucs.net -d perform=logout http://ncdc.nctucs.net/adv,/cgi-bin/setuser.cgi
if [ -f cookie ] ;then
    rm cookie
elif [ -f lude ] ;then
    rm lude
fi
