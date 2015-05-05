CC=gcc
CFLAGS=-Wall -g
LIBS=-lpthread

main: main.o mainMemory.o cacheMemory.o
		$(CC) $(CFLAGS) -o main main.o mainMemory.o cacheMemory.o
mainMemory.o:	mainMemory.c
		$(CC) $(CFLAGS) -c mainMemory.c  
cacheMemory.o:	cacheMemory.c
		$(CC) $(CFLAGS) -c cacheMemory.c  

clean:
	rm -f *~ main main.o
