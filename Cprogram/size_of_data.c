#include <stdio.h>

int main()
{
        /* signed */                                     /////////////////////char
        printf("Size of char is %lu\n", sizeof(char));   // Size of char: 1 byte
        printf("Size of short is %lu\n", sizeof(short)); // Size of short: 2 bytes
        printf("Size of long is %lu\n", sizeof(long));   // Size of long: 8 bytes

        /* unsigned */
        printf("Size of unsigned char is  %lu\n", sizeof(unsigned char)); // Size of unsigned char: 1 byte
                                                                          //   printf("%lu\n", sizeof(unsigned short)); // Size of unsigned short: 2 bytes
                                                                          //   printf("%lu\n", sizeof(unsigned long));  // Size of unsigned long: 8 bytes

        //////////////////////////////////////////////////////////////int

        printf("Size of int is%lu\n", sizeof(int));              // Size of char: 1 byte
        printf("Size of short int is %lu\n", sizeof(short int)); // Size of short: 2 bytes
        printf("Size of long int is  %lu\n", sizeof(long int));  // Size of long: 8 bytes

        /* unsigned */
        printf("Size of unsigned short int is %lu\n", sizeof(unsigned short int)); // Size of unsigned char: 1 byte
        printf("Size of unsigned long int is %lu\n", sizeof(unsigned long int));   // Size of unsigned short: 2 bytes
                                                                                   /////////////////////////////////////////////////////////////////////////////////////float

        printf("Size of of float is%lu\n", sizeof(float));
        //////////////////////////////////////////////////////////////double
        printf("Size of Double is %lu\n", sizeof(double)); // Size of char: 1 byte

        printf("Size of Long double is %lu\n", sizeof(long double)); // Size of long: 8 bytes

        return 0;
}
// %lu format specifier is used to print the size of the data types,