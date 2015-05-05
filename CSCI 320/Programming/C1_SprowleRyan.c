#include <stdio.h>

/*
  Ryan Sprowles
  10/4/2013
  Dr. McCauley
  This Program is to show an understanding of pointers by comparing arrays of characters
       picking out the first instance of the first that's in the second, returning null
       if nothing is found in commmon.
*/
char *find_char(char const * source, char const * chars);
int main(int argc, char *argv[])
{
    /*I had an epiphany hence all the commented out code, I was trying to pass in from 
        predefined character arrays but realized that I could check against null making
        a majority of my main useless.
    
 /* int sizeOfSource, sizeOfChars;/*initialized to make it easier to change sizes char arrays
  sizeOfSource = 7;
  sizeOfChars = 3;
  
  char * source = (char *) malloc(sizeOfSource * sizeof(char));
  source = "ABCDEFG";
  /*printf("In Main %d\n", source);Tested to make sure that source has the same
  address in both the main and find_char
  char * chars = (char *) malloc(sizeOfChars * sizeof(char));
  chars = "GAK";*/
  /*Have also tested where I have empty, none in common, all in common, each letter at least
  once*/
  /*printf("Random test %p\n",&chars); Tested what each would print out
  printf("Comparing random tests %s\n",chars);*/ 
  /*printf("In Main chars: %d\n",chars); Tested to make sure that chars has the same
  address in both the main and find_char*/
  
  char * value = find_char("ABCDEFG", "XYA");
  if (value == "null"){
            printf("Null no match found\n");
            }
            else{
  printf("That value in common is %c\n", value);
  printf("The address is %p\n", &value); 
}
 char * value2 = find_char("ABCDEFG", "XYZ");
  if (value2 == "null"){
            printf("Null no match found\n");
            }
            else{
  printf("That value in common is %c\n", value2);
  printf("The address is %p\n", &value2);
}
 char * value3 = find_char("ABCDEFG", "PDB");
  if (value3 == "null"){
            printf("Null no match found\n");
            }
            else{
  printf("That value in common is %c\n", value3);
  printf("The address is %p\n", &value3);
}
  system("PAUSE");	
  return 0;

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
     int sLen = 0;
     int cLen = 0;
     
     while(*source != NULL){
                   sLen++;
                   *source++;
                   }
/*     printf("%d\n", sLen);*/
     
     while(*chars != NULL){
                  cLen++;
                  *chars++;
                  }
/*     printf("%d\n", cLen);*/
     
     for(i = 0; i < sLen; i++){
                     *source--;
                     }
     
     for(j = 0; j < cLen; j++){
                     *chars--;
                     }
     
     for(i = 0; i < sLen; i++){
           for(j = 0 ; j < cLen; j ++){
                 if(*source == *chars){
                              while(boolean != 1){
                              overlap = *chars;
                              boolean = 1;
                              }   
                              }
               *chars++;
               }
               for(j = 0; j < cLen; j++){
                     *chars--;
                     }
               *source++;
               }
               if(boolean == 0){
                          overlap = "null";
                          }
     return overlap;
}

