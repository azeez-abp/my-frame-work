
#include <stdio.h>
#include "main.h"
#include <unistd.h>

/**
 * more_numbers - prints 1-14 10 times
 *
 * Return: Always 0
 */
// alx-low_level_programming/0x04-more_functions_nested_loops

/**
 * print_numbers - print 0 to 9
 * Descroption: none
 */
void print_numbers(void)
{
        int num;

        for (num = 0; num < 10; num++)
        {
                char ans = (num + '0');

                write(1, &ans, 1);
        }
        char next = '\n';
        write(1, &next, 1);
}

void print_diagonal(int n)
{
        if (n > 0)
        {
                int m;

                for (m = 0; m < n; m++)
                {
                        int s;
                        for (s = 0; s < m; s++)
                        {
                                char ans_ = ' ';
                                write(1, &ans_, 1);
                        }

                        char ans = '\\';
                        write(1, &ans, 1);

                        char ans2 = '\n';
                        write(1, &ans2, 1);
                }
        }
        else
        {
                char ans2 = '\n';
                write(1, &ans2, 1);
        }
}
int _putchar(char c)
{
        return (write(1, &c, 1));
}
// #include "main.h"
void print_square(int size)
{
        int w;
        int h;
        if (size > 0)
        {
                for (w = 0; w < size; w++)
                {
                        for (h = 0; h < size; h++)
                        {
                                _putchar('#');
                        }
                }
                _putchar('\n');
        }
        else
        {

                _putchar('n');
        }
}

/**
 *print_triangle - print triangle
 *@size:int
 *Return: always 0
 */

void print_triangle(int size)
{
        int times, x, y;

        for (times = size; times > 0; times--)
        {
                for (x = 1; x < times; x++)
                {
                        _putchar(' ');
                }
                for (y = size; y >= times; y--)
                {
                        _putchar('#');
                }
                _putchar('\n');
        }

        if (size <= 0)
                _putchar('\n');
}

void fizz_buzz(void)
{
        int start = 0;

        for (start = 1; start <= 100; start++)
        {
                if (start % 15 == 0)
                {
                        printf("FizzBuzz ");
                }

                else if (start % 5 == 0)
                {
                        printf("Buzz ");
                }
                else if (start % 3 == 0)
                {
                        printf("Fizz ");
                }
                else
                {
                        printf("%d ", start);
                }
        }
}

// #include "main.h"

void print_triangle2(int size)
{

        int out, in, in2;
        if (size > 0)
        {

                for (out = 1; out <= size; out++)
                {

                        for (in = 0; in <= (size - out); in++)
                        {
                                _putchar(' ');
                        }
                        for (in2 = 1; in2 <= out; in2++)
                        {
                                _putchar('#');
                        }
                        _putchar('\n');
                }
        }
        else
        {
                _putchar('\n');
        }
}

/**
 * main - print the largest prime factor
 * @n:int
 * Return: always 0
 */
int prime_factor(int n)
{
        int i;
        if (n <= 1)
        {
                return (0); // return 0; // Numbers less than or equal to 1 are not prime
        }

        int larg = 0;
        for (int i = 2; i <= n; i++)
        {
                while (n % i == 0)
                {
                        if (i > larg)
                        {
                                larg = i;
                        }
                        printf("%d\n ", i);
                        n /= i;
                }
        }
        printf("%d \n", larg);
        return (1)
}

int main(void)
{

        // fizz_buzz();
        // print_diagonal(12);
        // print_square(3);
        // print_numbers();
        // print_triangle2(10);
        // funct();
        prime_factor(1231952);
}

// int main(void)
// {
//         char c;
//         more_numbers();
//         c = 'A';
//         printf("%c: %d\n", c, _isupper(c));
//         c = 'a';
//         printf("%c: %d\n", c, _isupper(c));
//         return (0);
// }
