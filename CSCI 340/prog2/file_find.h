/* 
Ryan Sprowles
find_file.c - this is going to look though for the location of the 
and give the full path of it
*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>
#include <fcntl.h>

void file_find(char ** pathArgs, char *cmdline, char *fullcmd);
