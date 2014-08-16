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
	FILE *fp;
	fp=fopen(argv[1],"r");
	char temp;
	printf("finding energy value in %s\n",argv[1] );
	//Net Site
	int flag=0;
	while(fscanf(fp,"%c",&temp)!=EOF){
		if(temp=='N'){
			fscanf(fp,"%c",&temp);
			if(temp=='e'){
				fscanf(fp,"%c",&temp);
				if(temp=='t'){
					fscanf(fp,"%c",&temp);
					if(temp==' '){
						fscanf(fp,"%c",&temp);
						if(temp=='S'){
							fscanf(fp,"%c",&temp);
							if(temp=='i'){
								fscanf(fp,"%c",&temp);
								if(temp=='t'){
									fscanf(fp,"%c",&temp);
									if(temp=='e'){
										flag=1;
										for (int i = 0; i < 3; ++i)
										{
											//printf("yes\n");
											char s[100];
											fscanf(fp,"%s",s);
											printf("%s\n", s);
										}
										double reqd;
										fscanf(fp,"%lf",&reqd);
										printf("reqd is %lf\n",reqd*277.777777);

										printf("writing the output in file ");
										FILE *fp3;
										char output[10000];
										for (int i = 0; i < 10000; ++i)
										{
											output[i]='\0';
										}
										strcat(output,argv[2]);
										strcat(output,"/");
										strcat(output,"finalenergyvalues.txt");
										printf("%s\n",output );
										fp3=fopen(output,"a+");
										fprintf(fp3,"%lf\n",reqd*277.777777);
										fclose(fp3);
										fclose(fp);
										break;
									}
								}
							}
						}
					}
				}
			}
		}
	}
	if(flag==1){
		printf("found\n");
	}
	else{
		printf("not found\n");
	}
	return 0;
}

