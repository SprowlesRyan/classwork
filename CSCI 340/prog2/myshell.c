/* 
Ryan Sprowles
shell.c - example of a shell in a program. This program is
what runs prog 2. It calls print_prompt and then does the read
command, parses it and gets the path.
*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>
#include "print_prompt.h"
#include "read_command.h"
#include "parse_command.h"
#include "file_find.h"
#include "fork_and_exec.h"

int main()
{

char cmdline[1024];
char *args[64];
char * pathArgs[64];
char fullcmd [100];
int i;

printf("%s","This is a Simple Shell \n");

	while(1)
	{
		i = 0;
		print_prompt();
//		printf("%s", "test 1");
		read_command(cmdline);
//		printf("%s", "test 2");
//		printf("After read_command %s \n", buf);
		

		parse_command(cmdline, args);
//		printf("%s", "test 3");
//		printf("After parse_command %s \n", buf);
//		printf("After parse_comamnd %s \n", args);
//		printf("More curiosity \n");
		file_find(pathArgs, cmdline, fullcmd);
		 // while (pathArgs[i] != NULL){
		 // 	strcat(pathArgs[i], "/");
		 //  	//printf("args [i] is: %s/ls\n", pathArgs[i]);
		 //  	i++;
		 // }
//		printf("After file_find %s \n", args);		
//		printf("%s", "test 4");		
//		printf("%s", *args);
		fork_and_exec(args, fullcmd);
		//printf("After fork %s", buf);	
		//printf("%s", "test 5 \n");	

	return 0;
}
}
