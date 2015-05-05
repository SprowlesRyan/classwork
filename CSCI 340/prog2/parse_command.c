/* 
Ryan Sprowles
parse_command.c - parses the command line, getting rid of white space.
*/

#include "parse_command.h"

void parse_command (char *cmdline, char **args)
{
//  printf("%s \n", "curiosity");
   while (*cmdline) {
      /*
       * Strip whitespace.  Use nulls, so
       * that the previous argument is terminated
       * automatically.
       */
      while ((*cmdline == ' ') || (*cmdline == '\t'))
	 *cmdline++ = '\0';

      /*
       * Save the argument.
       */
      *args++ = cmdline;

      /*
       * Skip over the argument.
       */
      while (*cmdline && (*cmdline != ' ') && (*cmdline != '\t'))
	 cmdline++;
  //printf("words of testing");
   }

   //*args = NULL;
}
