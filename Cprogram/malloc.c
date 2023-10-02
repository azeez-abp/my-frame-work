#include <stdio.h>
#include <stdlib.h>
#include <string.h> // Include the string.h header for string functions

int main()
{
        // declearation
        //  memory assignment
        //  assginment
        char *str;
        str = (char *)malloc((strlen(str) + 1) * sizeof(char *));
        /**because str
        pointer does not previously pointing to any memory adress
         +1  is for the null terminator  '\0'
        */
        if (str != NULL)
        {

                str = "adioadeyotiazeez@gmail.com adioadeyotiazeez@gmail.com adioadeyotiazeez@gmail.com";
                // strcpy(str, "adioadeyotiazeez@gmail.com adioadeyotiazeez@gmail.com adioadeyotiazeez@gmail.com");
                // or
        }

        printf("%s , %d , len =  %d", str, sizeof(char *), strlen(str));
        free(str);
        return 0;
}
