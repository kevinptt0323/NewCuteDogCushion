#!/usr/local/bin/bash

help (){
    echo "$0 [-l login] [-p password] [-t target] [-f upload_file]"
}
while getopts ":l:p:t:f:" flag ; do
    case ${flag} in
        l)
            login=${OPTARG}
            ;;
        p)
            password=${OPTARG}
            ;;
        t)
            target="${OPTARG}"
            ;;
        f)
            file="${OPTARG}"
            ;;
        \?)
            echo "Invalid option -$OPTARG"
            help
            exit
            ;;
        h)
            help
            ;;
    esac
done
login(){
    login=$1
    password=$2
    curl -v -b cookie -c cookie -e ncdc.nctucs.net "http://ncdc.nctucs.net/adv,/cgi-bin/weblogin.cgi?username=$login&password=$password"
}
upload(){
    target=$1
    file=$2
    curl -v -b cookie -c cookie -e ncdc.nctucs.net -include --form rformat=extjs --form target_path=$target --form file_path=@$file http://ncdc.nctucs.net/adv,/cgi-bin/file_upload-cgic
}
if [ ! -f cookie ];then login $login $password
fi
upload $target $file
