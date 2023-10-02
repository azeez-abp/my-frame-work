#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

extern char **environ;

int main(void)
{

        char **env;
        int index;
        index = 0;
        env = environ; // This is the environment variable

        while (env[index] != NULL)
        {
                char *current = env[index];
                int i = 0;
                while (current[i] != '\0')
                {
                        write(1, &current[i], 1);
                        i++;
                }
                write(1, "\n", 1);
                index++;
        }

        return (0);
}
