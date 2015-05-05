/* 
Ryan Sprowles
mainMemory.c - This will get the time for the amount of time it takes to access
something from memory
*/


#include "mainMemory.h"

void mainMemory ()
{
	int manyInts [10000][64];
	int *intsPoint;
	struct timeval time1;
    struct timeval time2;
    double time3;
    double time4;
    double resultantTime;
    int i = 0;
    int j = 0;

    gettimeofday(&time1, NULL);

    while(i < 10000){
    	while(j < 64){
    		intsPoint = &manyInts[rand() % 10000][rand() % 64];
    		j++;
    	}
    	j=0;
    	i++;
    }

    gettimeofday(&time2, NULL);
    time3 = time1.tv_usec + (time1.tv_sec*1000000);
	time4 = time2.tv_usec + (time2.tv_sec*1000000);
	resultantTime = time4 - time3;
	resultantTime = (resultantTime/640000) * 1000;
	  
	 printf("The time for main memory  " "%f ns \n", resultantTime);

}
