#include <iostream>
#include <thread>
#include <stdio.h> 
#include <unistd.h>
#include <stdlib.h>
#include <sys/types.h>
#include <errno.h>
#include <sys/wait.h>
#include <string.h>
#include <math.h>
#include <vector>
#include <cassert>
#include <sstream>
#include <map>
#include <set>
#include <stack>
#include <queue>
#include <algorithm>
#include <utility>
using namespace std;

void sigchld_handler (int signum)
{
	int pid;
	int status;
	while (1){

		pid = waitpid (WAIT_ANY, &status, WNOHANG);
		if (pid < 0){
			perror ("waitpid");
			break;
		}
		if (pid == 0)
			break;
      //notice_termination (pid, status);
	}
}

int numFromArray(char *c){
	int num=0;
	int place=1;
	int len=0;
	for (int i = 0; c[i]!='\0'; ++i)
	{
		len++;
	}
	for (int i = len-1; i >= 0; i--)
	{
		num=num+(c[i]-48)*place;
		place=place*10;
	}
	return num;
}

//checks if the array is integer array
bool checkIntArray(char *s){
	for (int i = 0; s[i] != '\0'; ++i)
	{
		if(s[i]>='0' && s[i]<='9');
		else{
			return false;
		}
	}
	return true;
}

int main(int argc,char *argv[]) {

	string touchfile(argv[1]);
	touchfile = "touch "+touchfile+"/flagfile.txt";
	cout << touchfile << endl;

	int n = thread::hardware_concurrency();//finds the no. of processors in the system
	printf("No of processors in the system are :- %d, therefore those many processes are going to get executed in parallel\n",n );
	pid_t pid;
	int worktodo=1;//tells how many files to process
	if(argc==4 && checkIntArray(argv[3])){
		worktodo=numFromArray(argv[3]);
	}
	int count=0;//tells how many child processes have been made till now
	int curr_running=0;
	int max_allowed=n;
	while(count<worktodo)
	{
		while(curr_running<max_allowed && count<worktodo){
			printf("count is %d\n",count );
			if((pid=fork())<0)
			{
				fprintf(stderr,"Error in creating Fork %d\n",errno);
				exit(-1);
			}
			else if (pid == 0)
			{
				printf("Child: %d | ",count);
				printf("pid-- %ld | ",(long)getpid());
				int k;
				printf("will sleep for %d sec\n",curr_running+1 );

				char command[1000];
				sprintf(command, "./myexecute4.sh %s %s %d",argv[1],argv[2],count+1);//argv[1] for location of file "parametric/id"
											//argv[2] for whether file... count for which simulation to
											//perform
				printf("%s\n",command );
				system(command);
				_exit(0);
			}
			curr_running++;
			count++;
		}

		int status;
		pid_t pidu;
		if(curr_running==max_allowed)//parent process waits here for the child process to finish execution and each child sleeps for different amount of time
		{//this will ensure that when all the child processes end only then it will move forward
			pidu=wait(&status);
			printf("My child %ld,has started his first counting, Oh! yea I'm proud father :D \n",(long)pidu);
			curr_running--;
		}
		if(count>=worktodo){
			while(curr_running){
				pidu=wait(&status);
				printf("My child %ld,has started his first counting, Oh! yea I'm proud father :D \n",(long)pidu);
				curr_running--;		
			}			
		}
	}
	printf("curious if currently running processes = %d is greater than 0, in that case there is an error\n",curr_running);
	int size=touchfile.length();
	char array[1000];
	for (int i = 0; i < size; ++i)
	{
		array[i]=touchfile[i];
	}
	array[size]='\0';
	printf("%s\n",array );
	system(array);
	return 0;
}
