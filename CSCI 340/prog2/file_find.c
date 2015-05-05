/* 
Ryan Sprowles
find_file.c - this is going to look though for the location of the 
and give the full path of it
*/

#include "file_find.h"

static char paths [200];

void file_find(char ** pathArgs, char *cmdline, char *fullcmd){
	//char * path;
	// char paths [200];
	int i = 0; //paths iterator
	int j = 1; //pathArgs iterator
	int z = 0;
	char *envpath;

//	printf("in file_find %s \n", args);
	envpath = getenv("PATH");
	printf("The paths are: %s \n", envpath);
	strcpy(paths, envpath);
	pathArgs[0] = &paths[0];
	//printf("i before loop %s",paths[i]);
	while (paths[i] != '\0'){
		//printf("%d ",i);
		//printf("%c \n", paths[i]);
	//	printf("The path is inside loop %s \n", path[i]);
		if (paths[i] == ':'){
		//	printf("%d \n", j);
		//	printf("The path is inside loop %s \n", envpath);
		//	printf("%s",paths[i]);
		//printf(" j in loop %s",paths[j]);			
			pathArgs[j] = &paths[i+1];
			paths[i] = '\0';
			//printf("%s \n", args);
			j++;
		}
		i++;
	}

	
	//cmdline = strcat("/",cmdline);
	pathArgs[j] = NULL;
	//printf("The length of args is %d \n", sizeof(args));
	 while (pathArgs[z] != NULL){
			//printf("%s",cmdline);
			strcpy(fullcmd, pathArgs[z]);
			strncat(fullcmd, "/", 1);
			strncat(fullcmd, cmdline, strlen(cmdline));
			printf("fullcmd is: %s \n", fullcmd);
			if(open(fullcmd, O_RDONLY) > 0){
				break;
			}
			z++;
		 }
	
}
