#include <stdio.h>
#include <stdlib.h>
#include <string.h>

/**
 * split_string - split a string based on a delimiter
 * @str: input string
 * @delim: delimiter character
 * @count: pointer to variable to store the count of substrings
 * Return: array of strings
 */
char **split_string(const char *str, char delim, int *count)
{
        int i, j = 0;
        int len = strlen(str);
        int substr_count = 1;
        char **result = NULL;

        for (i = 0; i < len; i++)
        {
                if (str[i] == delim)
                        substr_count++;
        }

        result = (char **)malloc(substr_count * sizeof(char *));
        if (result == NULL)
        {
                perror("Memory allocation error");
                exit(EXIT_FAILURE);
        }

        for (i = 0; i < substr_count; i++)
        {
                int start = j;
                while (str[j] != delim && str[j] != '\0')
                        j++;

                // Allocate memory for the substring
                result[i] = (char *)malloc((j - start + 1) * sizeof(char));
                if (result[i] == NULL)
                {
                        perror("Memory allocation error");
                        exit(EXIT_FAILURE);
                }

                strncpy(result[i], str + start, j - start);
                result[i][j - start] = '\0';
                j++;
        }

        *count = substr_count;

        return result;
}

int main()
{
        const char *input = "azeez adio adeyori";
        char **tokens;
        int count, i;

        tokens = split_string(input, ' ', &count);

        // Print the tokens
        for (i = 0; i < count; i++)
        {
                printf("%s\n", tokens[i]);
                free(tokens[i]); // Free individual tokens
        }

        free(tokens); // Free the array of tokens

        return 0;
}
