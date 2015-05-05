/*
Ryan Sprowles
fork_and_exec.c - forks the program and uses the execvp fucntion to
fork off the current function and then execute using the fork instead
of the master
*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/types.h>
#include <unistd.h>
#include <sys/wait.h>
#include <fcntl.h>

void fork_and_exec(char ** args, char cmdline []);
