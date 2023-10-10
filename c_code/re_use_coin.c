#include <stdio.h>
#include <stdlib.h>

#define MAX_LENGTH 1000

void separateString(char *input)
{
        int i = 0, j = 0, k = 0, p = 0;
        char **result;
        result = (char **)malloc(MAX_LENGTH * sizeof(char *));
        char *tmp;
        tmp = (char *)malloc(MAX_LENGTH * sizeof(char));       // Allocate memory for tmp
        result[j] = (char *)malloc(MAX_LENGTH * sizeof(char)); // Allocate memory for result[j]
        while (input[i] != '\0')
        {
                if (input[i] != ',')
                {
                        tmp[p] = input[i];
                        k++;
                        p++;
                }
                else
                {
                        result[j][k] = '\0';
                        tmp[p] = '\0';
                        printf("%s\n", tmp);
                        j++;
                        k = 0;
                        p = 0;
                        result[j] = (char *)malloc(MAX_LENGTH * sizeof(char)); // Allocate memory for result[j]
                }
                i++;
        }
        result[j][k] = '\0';
        printf("%s\n", tmp); // Print the last token
        free(tmp);
        for (int x = 0; x <= j; x++) // Free memory for result[x]
        {
                free(result[x]);
        }
        free(result);
}

int main()
{
        separateString("sdse,esed,fdsf,dsfd");
        return 0;
}
