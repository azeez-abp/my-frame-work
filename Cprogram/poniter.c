#include <stdio.h>
#include "main.h"

#include <stdlib.h>
#include <unistd.h>
void test_pass(int ***in)
{ // int ***in mean use thre * to get to int which is value
        //***in use three * to get to int value
        printf("%d %p", ***in, in);
}

int fun(int *p, int *q)
{
        /**
         * fun - test the pointer parameter
         * by using *p it means the augument to the paramter must be memory address &
         * because *p = memory addresss
         */
        printf("p and q  are %d %d\n", *p, *q);
        return (0);
}

/**
 * rev_string - reverse a string.
 * @s: string to reverse
 */
void rev_string(char *s)
{
        int start, temp;
        int end = 0;

        while (*(s + end) != '\0')
        {
                end++;
        }

        end -= 1;
        start = 0;
        while (end > start)
        {
                temp = s[start];
                s[start] = s[end];
                s[end] = temp;
                start++;
                end--;
        }
        printf("%s", s);
}

void puts2(char *str)
{
        int i;

        for (i = 0; str[i] != '\0'; i++)
        {
                if ((i % 2) == 0)
                        _putchar(*(str + i));
        }
        _putchar('\n');
}

size_t get_size(char *input)
{
        write(1, input, 5);
        return (4);
}

int main()
{

        int n = 90;
        int m = 80;
        int *x = &n;
        char ch[] = {'1', '2', '3', '4', '5'};
        char *name = "Azeez";
        get_size(ch);
        get_size(name);
        printf("%d", '0');
        /*if you dont put star in front of q it will be error because *q mean memory address */
        *x = 402; /*this is changing the value of memory location of n to 402 value of n change from 90 to 420*/
                  // x = 303;     /*this is pointing x to another memory location*/
        *x++;     /*this is pointing x to another memory location*/
        *(x + 1);
        fun(x, &m);
        fun(&n, &m);

        int num = 42;
        int *ptr = &num;

        printf("Address of num: %p\n", (void *)ptr);
        char w[200] = "Azeez";
        rev_string(w);

        return (0);
}
