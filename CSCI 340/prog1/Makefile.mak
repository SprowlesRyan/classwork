CC=gcc
CFLAGS=-Wall -g
LIBS=-lpthread

fork:	fork.o
		$(CC) $(CFLAGS) -o fork fork.o $(LIBS)

fork.o:	fork.c
		$(CC) $(CFLAGS) -c fork.c 

clean:
	rm -f *~ fork fork.o
