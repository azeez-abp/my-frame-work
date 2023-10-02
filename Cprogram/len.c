#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>

/**
 * checksum - executes checksum
 * @s: input char
 * Return: checksum
 */
unsigned long checksum(char *s)
{
        unsigned long sum = 0;
        while (*s != 0)
        {
                sum += *s;
                s++;
        }
        return (sum);
}
/**
 * main - prints password for crakme
 *
 * Return: Always 0.
 */
int main(void)
{
        char alpha[] = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSTUVWXYZ";
        char s[33];
        unsigned long sum;
        int i, flag = 0;

        srand(time(NULL));
        while (flag == 0)
        {
                for (i = 0; i < 33; i++)
                {
                        s[i] = alpha[rand() % (sizeof(alpha) - 1)];
                }
                s[i] = '\0';
                sum = checksum(s);
                if (sum == 2772)
                {
                        flag = 1;
                        printf("%s", s);
                }
        }
        return (0);
}

int main2()
{
        char alpha[] = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$^&*()@#$%^&";
        int len = 0;
        srand(time(NULL));
        int rands_loop = (rand() % strlen(alpha)) < 8 ? 8 : (rand() % strlen(alpha));
        char password[11]; // Allocate space for 10 characters plus the null terminator
        while (len < rands_loop)
        {
                int rands = (rand() % strlen(alpha)); // Corrected the range for rands
                password[len] = alpha[rands];
                len++;
        }

        password[len] = '\0'; // Add the null terminator to make it a valid C string

        printf("Random password: %s\n", password);

        return 0;
}
