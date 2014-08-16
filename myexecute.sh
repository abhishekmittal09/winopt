java -classpath genopt.jar genopt.GenOpt $1/optLinux.ini;
touch $1/flagfile.txt;
chmod 777 $1/flagfile.txt;
echo "i am .sh file and i am done";
