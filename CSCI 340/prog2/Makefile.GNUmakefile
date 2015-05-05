CC=gcc
CFLAGS=-Wall -g
LIBS=-lpthread

myshell: myshell.o print_prompt.o read_command.o parse_command.o file_find.o fork_and_exec.o
		$(CC) $(CFLAGS) -o myshell myshell.o print_prompt.o read_command.o parse_command.o file_find.o fork_and_exec.o $(LIBS)

print_prompt.o:	print_prompt.c
		$(CC) $(CFLAGS) -c print_prompt.c 

parse_command.o: parse_command.c
		$(CC) $(CFLAGS) -c parse_command.c 

read_command.o:	read_command.c
		$(CC) $(CFLAGS) -c read_command.c 		

file_find.o: file_find.c
		$(CC) $(CFLAGS) -c file_find.c

fork_and_exec.o: fork_and_exec.c
		$(CC) $(CFLAGS) -c fork_and_exec.c 		 

clean:
	rm -f *~ myshell myshell.o
