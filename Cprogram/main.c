#include <stdio.h>
#include <unistd.h>
void gets_num()
{
    float input;
    printf("Enter a value to double \n");
    scanf("%f", &input);

    printf("%3.2f", input * 2);
}

/**
 * main - Entry point
 *
 * Return: Always 1 (Success)
 */
int main_two(void)
{
    write(2, "and that piece of art is useful\" - Dora Korpar, 2015-10-19\n", 59);
    return (1);
}

#include <stdlib.h>
#include <time.h>

/**
 * main - Entry point
 * desacrition: 'Program that determings if the value of out is posive,negative or zero'
 * Return: Always 1 (Success)
 */
int main_next(void)
{
    int n;

    srand(time(0));
    n = rand() - RAND_MAX / 2;
    if (n > 0)
        printf("%d is postive\n ", n);
    else if (n == 0)
        printf("%d is zero\n", n);
    else
        printf("%d is negative\n", n);

    int last_digit = n % 10;

    if (last_digit > 5)
        printf("Last digit of %d is %d and is greater than 5\n", n, last_digit);
    if (last_digit == 0)
        printf("Last digit of %d is %d and is 0\n", n, last_digit);
    if (last_digit < 6 && last_digit != 0)
        printf("Last digit of %d is %d and is less than 6 and not 0\n", n, last_digit);

    return (0);
}

/*
 * File: 100-print_comb3.c
 * Auth: Brennan D Baraban
 */

#include <stdio.h>

/**
 * main - Prints all possible combinations of two different digits,
 *        in ascending order, separated by a comma followed by a space.
 *
 * Return: Always 0.
 */
int two_digit(void)
{
    int digit1, digit2;

    for (digit1 = 0; digit1 < 9; digit1++)
    {
        for (digit2 = digit1 + 1; digit2 < 10; digit2++)
        {
            putchar((digit1 % 10) + '0');
            putchar((digit2 % 10) + '0');

            if (digit1 == 8 && digit2 == 9)
                continue;

            putchar(',');
            putchar(' ');
        }
    }

    putchar('\n');

    return (0);
}
/**
 * @brief
 *  descrition
 * @return int
 */

int main()
{
    // float input;
    // printf("Enter a value to double \n");
    // scanf("%f", &input);
    // printf("Hello world!\n");
    // printf("%3.2f", b);
    // gets_num();

    // main_two();
    // int a = 0;
    // int b = 10;
    // while (a < b)
    //     printf("%d\n", a++);
    // int c = 0;
    // int d = 10;
    // for (; c < d;)
    // {
    //     printf("c is %d\n", c++);
    // }
    // for (int d = 0; d < 10; d++)
    //     printf("value of d %d is\n", d);
    return 0;
}
// cd "c:\xampp\htdocs\code\Cprogram\" |  gcc main.c -o main | "c:\xampp\htdocs\code\Cprogram\"main
