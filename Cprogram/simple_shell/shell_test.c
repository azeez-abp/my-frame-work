#include <stdio.h>
#include <unistd.h>
#include <string.h>
#include <stdlib.h>

int main(int argc, char **argv)
{
        char *copy = strdup(argv[1]); // Create a copy of av[1]
        char *aft_bin = strtok(copy, "/");`

        while (aft_bin != NULL)
        {
                argv[1] = aft_bin; // Update av[1] with the last token
                aft_bin = strtok(NULL, "/");
        }

        printf("%u %s %s %s\n", getppid(), argv[0], argv[1], argv[2]);

        free(copy); // Free the memory allocated by strdup
        return 0;
}
