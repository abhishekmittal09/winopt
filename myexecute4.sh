echo $1/$3.idf # $1 for name location of file, $2 is for the whether file and $3 for interger value due to naming conventions
mkdir $1/$3
mv $1/$3.idf $1/$3
runenergyplus $1/$3/$3.idf $PWD/weatherdata/$2
./parsar $1/$3/Output/$3Table.html $1
echo "next command"
echo $3
echo "combining"
./combine $1/finalenergyvalues.txt $1/parametricvalues.txt $1/finalvalues.txt