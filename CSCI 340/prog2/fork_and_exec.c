/*
Ryan Sprowles
fork_and_exec.c - forks the program and uses the execvp fucntion to
fork off the current function and then execute using the fork instead
of the master
*/

#include "fork_and_exec.h"

void fork_and_exec(char **args, char fullcmd [])
{
int pid, status;
int i;
   
   

   /*
    * Get a child process.
    */

    //printf("%p \n", *buf);
     //printf("%p \n", *args);
    

   if ((pid = fork ()) < 0) {
      perror ("fork");
      printf("%s", "failed at fork");
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
      printf("fullcmd in fork %s \n", fullcmd);
      i = 0;
      while (args[i] != NULL) {
        printf("fork args %d = %s\n",i, args[i]);
        i++;
      }

      execv (fullcmd, args);
      // printf("%p \n", **args);
      // printf("%s \n", *buf);
      //printf("Success?");
      perror (*args);
      printf("%s", "failed at 0 \n");
      exit (1);
   }

   /*
    * The parent executes the wait.
    */

    while (wait (&status) != pid) {
    }
  
}
