START=1
END=3025
i=$START
#while [ $i -le $END ]
for i in $(seq $START $END)
do
	echo $1/$i.idf;
	runenergyplus $1"/"$i".idf" "$PWD/weatherdata/"$2
	./parsar $1"/Output/"$i"Table.html" $1
	echo "next command"
	echo "$i"
	echo "combining";
	./combine $1"/finalenergyvalues.txt" $1"/parametricvalues.txt" $1"/finalvalues.txt"

	#i=$i+1
done
touch $1/"flagfile.txt";
