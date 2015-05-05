#include <stdio.h>

/*
  Ryan Sprowles
  Dr. McCauley
  This Program is to show an understanding of pointers by comparing arrays of characters
       picking out the first instance of the first that's in the second, returning null
       if nothing is found in commmon.
*/
char *find_char(char const * source, char const * chars);
int main(int argc, char *argv[])
{
  int sizeOfSource, sizeOfChars;/*initialized to make it easier to change sizes char arrays*/
  sizeOfSource = 7;
  sizeOfChars = 3;
  
  char * source = (char *) malloc(sizeOfSource * sizeof(char));
  source = "ABCDEFG";
  /*printf("In Main %d\n", source);Tested to make sure that source has the same
  address in both the main and find_char*/
  char * chars = (char *) malloc(sizeOfChars * sizeof(char));
  chars = "GAK";
  /*printf("Random test %p\n",&chars); Tested what each would print out
  printf("Comparing random tests %s\n",chars);*/ 
  /*printf("In Main chars: %d\n",chars); Tested to make sure that chars has the same
  address in both the main and find_char*/
  
  char * value = find_char(source, chars);
  if (value == "null"){
            printf("Null no match found\n");
            }
            else{
  printf("That value in common is %c\n", value);
  printf("The address is %d\n", &value);
}
  system("PAUSE");	
  return 0;
  free(source);
  free(chars);
}

char *find_char(char const * source, char const * chars){
     /*printf("In find_char\n"); tested to make sure it was getting to the method*/
     /*printf("%d\n",source) tested to make sure source had same adddress as in main;
     printf("%d\n",chars); tested to make sure chars had same address as in main*/
     char * overlap;
     /*printf("This is source %p\n", source);
     printf("This is the char array %s\n", source);
     printf("This is address %d\n", &source);*/
         /* while(source != '/0' || source != " "){
                  sLen++;
                  source = source + sizeof(char);
                  printf("%d\n",sLen);
                  }*/
     int i = 0;
     int j = 0;
     int boolean = 0;
     for(i = 0; i < 7; i++){
           for(j = 0 ; j < 3; j ++){
                 if(*source == *chars){
                              while(boolean != 1){
                              overlap = *chars;
                              boolean = 1;
                              }   
                              }
               *chars++;
               }
               for(j = 0; j < 3; j++){
                     *chars--;
                     }
               *source++;
               }
               if(boolean == 0){
                          overlap = "null";
                          }
     return overlap;
}

