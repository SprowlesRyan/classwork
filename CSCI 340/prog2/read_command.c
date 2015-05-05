/* 
Ryan Sprowles
read_command.c - example of a read_command in a program. The program gets
input from the shell.
*/

#include "read_command.h" 

void read_command(char cmdline [])
{
//  char buf[1024];
//  printf("%s", "test command ");
//  printf("%s", "test command 2 ");
	 fgets(cmdline, 1024, stdin);
   cmdline[strlen(cmdline)-1] = '\0';
//  printf("in read_command %s", cmdline);
//  printf("%s", "test command 3 ");
}
