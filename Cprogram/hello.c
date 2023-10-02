#include <stdio.h>
#include <unistd.h> //Unix-std
/**
 * main - Entry point
 * Description:''
 * Return: Always 0 (Success)
 */
int size(void)
{
    int a;
    long int b;
    long long int c;
    char d;
    float f;

    printf("Size of a char: %lu byte(s)\n", (unsigned long)sizeof(d));
    printf("Size of an int: %lu byte(s)\n", (unsigned long)sizeof(a));
    printf("Size of an int: %lu byte(s)\n", (unsigned)sizeof(a));
    printf("Size of a long int: %lu byte(s)\n", (unsigned long)sizeof(b));
    printf("Size of a long long int: %lu byte(s)\n", (unsigned long)sizeof(c));
    printf("Size of a float: %lu byte(s)\n", (unsigned long)sizeof(f));
    printf("Size of unsigned int: %zu bytes\n", sizeof(unsigned int));
    printf("Size of float: %lu bytes\n", sizeof(float));
    printf("Size of unsgined char: %i bytes\n", sizeof(unsigned char));
    return (0);
}

int out_errro(void)
{
    fprintf(stderr, "and that piece of art is useful\" - Dora Korpar, 2015-10-19\n");
    return (1);
}

/**
 * print_times_table - time table of nmuber
 * @n: from 0 to value of n
 *
 * Description: the function print the time table
 * from 0 to value of n
 */

void print_times_table(int n)
{
    int outer, inner;

    for (outer = 0; outer <= n; outer++)
    {
        for (inner = 0; inner <= n; inner++)
        {
            printf("%d\t", outer * inner);
        }
        printf("\n", outer * inner);
    }
}

int debugs(void)
{
    char *hello = "Hello, World!";
    int i;

    for (i = 0; hello[i] != '\0'; i++)
    {
        printf("%c", hello[i]);
    }

    printf("\n");

    return (0);
}

/**
 * _putchar - writes the character c to stdout
 * @c: The character to print
 *
 * Return: On success 1.
 * On error, -1 is returned, and errno is set appropriately.
 */
int _putchar(char c)
{
    return (write(1, &c, 1));
    // write expects a pointer to the data to be written.
}

int largest_number(int a, int b, int c)
{
    int largest;

    if (a > b && b > c)
    {
        largest = a;
    }
    else if (b > a && a > c)
    {
        largest = b;
    }
    else
    {
        largest = c;
    }

    return (largest);
}

int main()
{
    print_times_table(5);
    int i;
    for (i = 0; i < 200; i++)
        printf("%c is ASCII value of %d\n", i, i);

    printf("%d is ASCII letter  of A", 'A');
    char name[120];
    puts("\"Enter tour name");
    scanf("%s", &name);

    printf("%s Hello world", name);
    size();
    return 0;
}

/**HEADER FILES DEFILE THE FUNCTION PROTOTYPE
 * #ifndef => if not define
 * main - Prints all single digit numbers of base 10 starting from 0,
 *        only using putchar and without char variables.
 * Description: char is single
 * Return: Always 0.
 *  root/alx-low_level_programming/0x03-debugging/
 */
int mains(void)
{
    printf("largest number is %d\n", largest_number(2, 4, 7));
    int number;

    for (number = 0; number < 10; number++)
        putchar((number % 10) + '0');

    putchar('\n');

    return (0);
}

/**
 * op_add - Makes the sum of two numbers
 * @arg1: First operand
 * @arg2: Second operand
 *
 * Description: This is a longer description.
 * Don't forget that a line should not exceed 80 characters.
 * But you're totally free to use several lines to properly
 * describe your function
 * Return: The sum of the two parameters
 */
int op_add(int arg1, int arg2)
{
    return (arg1 + arg2);
}

// https://docs.oracle.com/cd/E19253-01/817-6223/chp-typeopexpr-2/index.html

void pointer_analysis()
{
    int *ip;    /* pointer to an integer */
    double *dp; /* pointer to a double */
    float *fp;  /* pointer to a float */
    char *ch;   /* pointer to a character */
}