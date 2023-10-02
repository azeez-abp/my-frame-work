#include <stdio.h>
#include <stdlib.h>
#include <limits.h>
#include "put.c"

int main2()
{ // int argc, char **argv

        printf("CHAR_BIT    :   %d\n", CHAR_BIT);
        printf("CHAR_MAX    :   %d\n", CHAR_MAX);
        printf("CHAR_MIN    :   %d\n", CHAR_MIN);
        printf("INT_MAX     :   %d\n", INT_MAX);
        printf("INT_MIN     :   %d\n", INT_MIN);
        printf("LONG_MAX    :   %ld\n", (long)LONG_MAX);
        printf("LONG_MIN    :   %ld\n", (long)LONG_MIN);
        printf("SCHAR_MAX   :   %d\n", SCHAR_MAX);
        printf("SCHAR_MIN   :   %d\n", SCHAR_MIN);
        printf("SHRT_MAX    :   %d\n", SHRT_MAX);
        printf("SHRT_MIN    :   %d\n", SHRT_MIN);
        printf("UCHAR_MAX   :   %d\n", UCHAR_MAX);
        printf("UINT_MAX    :   %u\n", (unsigned int)UINT_MAX);
        printf("ULONG_MAX   :   %lu\n", (unsigned long)ULONG_MAX);
        printf("USHRT_MAX   :   %d\n", (unsigned short)USHRT_MAX);

        printf("Storage size for float : %d \n", sizeof(float));
        printf("FLT_MAX     :   %g\n", (float)FLT_MAX);
        printf("FLT_MIN     :   %g\n", (float)FLT_MIN);
        printf("-FLT_MAX    :   %g\n", (float)-FLT_MAX);
        printf("-FLT_MIN    :   %g\n", (float)-FLT_MIN);
        printf("DBL_MAX     :   %g\n", (double)DBL_MAX);
        printf("DBL_MIN     :   %g\n", (double)DBL_MIN);
        printf("-DBL_MAX     :  %g\n", (double)-DBL_MAX);
        printf("Precision value: %d\n", FLT_DIG);

        return 0;
}

#include <stdio.h>
#include <stdlib.h>
#include <limits.h>
#include <float.h>

/**
 * _atoi - extract int in stirng.
 * @s: string to extract
 * Return: Alway success
 */

int _atoi(char *s)
{
        int sign = 1;
        int result = 0;
        int index = 0;

        printf("%c\n", s[index]);

        while (s[index] != '\0')
        {
                if (s[index] == '-')
                        sign = -sign;

                if (s[index] >= '0' && s[index] <= '9')
                {
                        printf("%c\n", s[index]);

                        result = (result * 10) + (s[index] - '0');
                }

                if (
                    (s[index] >= '0' && s[index] <= '9') &&
                    ((s[index + 1] >= 'A' && s[index + 1] <= 'Z') ||
                     s[index + 1] == ' ' ||
                     (s[index + 1] >= 'a' && s[index + 1] <= 'z')))
                {

                        break;
                }

                index++;
        }
        return (result * sign);
}

int main(int argc, char **argv)
{
        print_rev("azeez!")
            //  printf("%d", _atoi(" + + - -98 Battery Street; San Francisco, CA 94111 - USA "));
            return 0;
}

#include <stdlib.h>

/**
 * run_ funcion that execute command
 * @line: array of characrter read from each line of fiel
 */

void run_(char *line)
{
        char *args[4];
        pid_t pid = fork();

        if (pid == -1)
        {
                perror("fork");
                exit(EXIT_FAILURE);
        }

        if (pid == 0)
        {
                args[0] = "/bin/sh";
                args[1] = "-c";
                args[2] = line;
                args[3] = NULL;

                execve("/bin/sh", args, environ);
                perror("execve");
                exit(EXIT_FAILURE);
        }
        else
        {
                wait(NULL);
        }
}

/**
 * readfile - A function that read content of a fiel and exec command
 * @path: file rectory
 * Return: 0 successfule
 */
int readfile(char *path)
{
        char line[1024];
        ssize_t bytes_read;
        int file_descriptor;

        file_descriptor = open(path, O_RDONLY);

        if (file_descriptor == -1)
        {
                perror("open");
                exit(EXIT_FAILURE);
        }

        do
        {
                bytes_read = read(file_descriptor, line, sizeof(line));

                if (bytes_read > 0)
                {
                        line[bytes_read - 1] = '\0';

                        run_(line);
                }

        } while (bytes_read > 0);

        close(file_descriptor);
        return (0);
}