/* 
Ryan Sprowles
fork.c - example of a fork in a program. The program asks for UNIX
commands to be typed and inputted to a string.  The string is then
"parsed" by locating blanks etc.  Each command and corresponding
arguments are put in a args array.  execvp is called to execute these
commands in child process spawned by fork() */

/* cc -Wall -o fork fork.c */

#include <stdio.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/time.h>

/*
 * parse--split the command in buf into
 *         individual arguments.
 */
void parse (char *buf, char **args)
{
   while (*buf) {
      /*
       * Strip whitespace.  Use nulls, so
       * that the previous argument is terminated
       * automatically.
       */
      while ((*buf == ' ') || (*buf == '\t'))
	 *buf++ = '\0';

      /*
       * Save the argument.
       */
      *args++ = buf;

      /*
       * Skip over the argument.
       */
      while (*buf && (*buf != ' ') && (*buf != '\t'))
	 buf++;
   }

   *args = NULL;
}

/*
 * execute--spawn a child process and execute the program.
 */
void execute (char **args)
{
   int pid, status;
   
   

   /*
    * Get a child process.
    */

   if ((pid = fork ()) < 0) {
      perror ("fork");
      exit (1);

      /* NOTE: perror() produces a short error message on the standard
         error describing the last error encountered during a call to
         a system or library function.
      */
   }

   /*
    * The child executes the code inside the if.
    */
   if (pid == 0) {
      execvp (*args, args);
      perror (*args);
      exit (1);

      /* NOTE: The execv() and execvp versions of execl() are useful
         when the number of arguments is unknown in advance; The
         arguments to execv() and execvp() are the name of the file to
         be executed and a vector of strings containing the arguments.
         The last argument string must be followed by a 0 pointer.

         execlp() and execvp() are called with the same arguments as
         execl()  and  execv(),  but duplicate the shell's actions in
         searching for an executable file in a list  of  directories.
         The directory list is obtained from the environment.  */
   }

   /*
    * The parent executes the wait.
    */
   while (wait (&status) != pid)
      /* empty */ ;
}

int main ()
{

/*commented out iterator and resultsArray, only needed for running 200 times*/
   char buf[1024];
   char *args[64];
   struct timeval time1;
   struct timeval time2;
   int time3;
   int time4;
   /*int iterator = 0;*/
   int resultantTime;
  /* int resultsArray[200];*/

   for (;;) {
      /*
       * Prompt for and read a command.
       */
      printf ("Command: ");

      if (fgets (buf, 1024, stdin) == NULL) {
	 printf ("\n");
	 exit (0);
      }


      buf[strlen(buf)-1] = '\0';   // get rid of newline

      /*
       * Split the string into arguments.
       */
      parse (buf, args);

      /*
	   * executes the command and
       * runs the command 200 times.
       */
	   
	  /*
	  while (iterator < 200){
	  gettimeofday(&time1, NULL);
      execute (args);
	  gettimeofday(&time2, NULL);
	  time3 = time1.tv_usec;
	  time4 = time2.tv_usec;
	  resultantTime = time4 - time3;
	  resultsArray[iterator] = resultantTime;
	  /*printf("%d \n", resultantTime);
	  iterator++;
	  }*/
	  
	  gettimeofday(&time1, NULL);
      execute (args);
	  gettimeofday(&time2, NULL);
	  time3 = time1.tv_usec;
	  time4 = time2.tv_usec;
	  resultantTime = time4 - time3;
	  
	  printf("%d \n", resultantTime);
	  /*for printing out the 200 times
	  for (iterator = 0; iterator < 200; iterator++)
	  printf("%d \n", resultsArray[iterator]);
	  */
   }
	
   return 0;
}
