/* 
Ryan Sprowles
main.c - This will run the files and get the times and differences
*/


#include <stdio.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/time.h>
#include "mainMemory.h"
#include "cacheMemory.h"

int main(){
	
	mainMemory();
	cacheMemory();

	return 0;
}
