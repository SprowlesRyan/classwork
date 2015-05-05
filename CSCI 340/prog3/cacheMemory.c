/* 
Ryan Sprowles
cacheMemory.c - This will get the time for the amount of time it takes to access
something from cache.
*/


#include "cacheMemory.h"

void cacheMemory ()
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

    int cacheBlockSize [512];
    int x = 1;
    int y = 0;
    int cacheSizeTest[ 1024];
    int arsize = (256);



    gettimeofday(&time1, NULL);

    while(i < 10000){
    	while(j < 64){
    		intsPoint = &manyInts[i][j];
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
	  
	 printf("The time for cache memory  " "%f ns \n", resultantTime);

     for(x = 1; x < 513; x *=2){
        y = 0;
        gettimeofday(&time1, NULL);
        while(y < x){
        intsPoint = &cacheBlockSize[rand() % 512];
        y++;
    }
        gettimeofday(&time2, NULL);

        time3 = time1.tv_usec + (time1.tv_sec*1000000);
        time4 = time2.tv_usec + (time2.tv_sec*1000000);
        resultantTime = time4 - time3;
        resultantTime = (resultantTime/512) * 1000;
      
    //    printf("The block time is: " "%f ns \n", resultantTime);
    //    printf("The block size is: " "%d \n", x);


     }

     //tested with arsize 64, 128, 256, 512

     for(i = 0; i< arsize; i+= 16){
        intsPoint = &cacheSizeTest[i];
     }

     gettimeofday(&time1, NULL);

     for(i = 0; i< 1024*1024; i*=16){
        intsPoint = &cacheSizeTest[i * 16 % arsize];
     }

     gettimeofday(&time2, NULL);

    time3 = time1.tv_usec + (time1.tv_sec*1000000);
    time4 = time2.tv_usec + (time2.tv_sec*1000000);
    resultantTime = time4 - time3;
    resultantTime = (resultantTime/512) * 1000;

 //   printf("The size of cache is " "%f \n", resultantTime);

}
