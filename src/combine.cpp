#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>
#include <iostream>
#include <vector>
#include <cassert>
#include <sstream>
#include <map>
#include <set>
#include <stack>
#include <queue>
#include <algorithm>
#include <utility>

#define pb push_back
#define mp make_pair
#define clr(x) x.clear()
#define sz(x) ((int)(x).size())
#define pii pair<int, int>
#define pn(n) printf("%d\n",n)
#define sn(n) scanf("%d",&n)
#define tr(container , it) for(typeof(container.begin()) it=container.begin() ; it!=container.end() ; it++)

typedef long long int li;
using namespace std;

int main(int argc,char **argv){
	FILE *fp1,*fp2,*fp3;
	fp1=fopen(argv[1],"r");
	fp2=fopen(argv[2],"r");
	fp3=fopen(argv[3],"w");
	double temp;
	char c;
	char s[10000];
	int inputcount=1;
	int energycount=1;
	map<int, double> energyvalues;
	map<int, char *> inputvalues;
	while(fscanf(fp1,"%d %lf",&energycount,&temp)!=EOF){
		energyvalues[energycount]=temp;

		fscanf(fp2,"%[^\n]%c",s,&c);
		inputvalues[inputcount]=s;
		inputcount++;

		//printf("%lf %s\n",temp,s );
	}

	for (int i = 0; i < inputcount-1; ++i)
	{
		fprintf(fp3, "%lf %s\n", energyvalues[i+1], inputvalues[i+1] );
	}
	fclose(fp1);
	fclose(fp2);
	fclose(fp3);
	return 0;
}

