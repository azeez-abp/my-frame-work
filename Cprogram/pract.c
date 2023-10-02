#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
char **explode(const char *string, char delimiter)
{
        char **res;
        char *str;
        unsigned int index;
        unsigned int str_index;
        unsigned int start;

        // Calculate the maximum possible number of substrings
        unsigned int max_substrings;
        max_substrings = 0;
        while (string[max_substrings] != '\0')
        {
                max_substrings++;
        }

        res = (char **)malloc((max_substrings + 1) * sizeof(char *));
        if (res == NULL)
        {
                perror("Memory allocation failed");
                exit(1);
        }

        index = 0;
        start = 0;
        str_index = 0;
        str = (char *)malloc(max_substrings + 1);
        if (str == NULL)
        {
                perror("Memory allocation failed");
                exit(1);
        }

        while (string[start] != '\0')
        {
                if (string[start] == delimiter)
                {
                        str[str_index] = '\0'; // Null-terminate the substring

                        res[index] = strdup(str); // Copy the substring to the result array

                        if (res[index] == NULL)
                        {
                                perror("Memory allocation failed");
                                exit(1);
                        }
                        str_index = 0;
                        index++;
                }
                else
                {
                        str[str_index] = string[start];
                        str_index++;
                }

                start++;
        }

        // Handle the last substring
        str[str_index] = '\0';
        res[index] = strdup(str);
        if (res[index] == NULL)
        {
                perror("Memory allocation failed");
                exit(1);
        }

        // Null-terminate the result array
        res[index + 1] = NULL;

        // Free the temporary 'str' array
        free(str);

        return res;

        // https://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@github.com/azeez-abp/simple_shell.git
}
// gcc -Wall -Werror -Wextra -pedantic -std=gnu89 *.c -o hsh

#define MAX_INPUT_SIZE 1024
#define PROMPT "myshell> "

/**
 * shell_check - check the process id
 * @pid: process id
 * @tokens:  input array
 */

void shell_check(pid_t pid, char **tokens);

/**
 * main - Entry point
 * Return: 0 successful
 */

int main2(void)
{

        char *tokens[MAX_INPUT_SIZE];
        int token_count;
        char *token;
        char input[MAX_INPUT_SIZE];
        ssize_t input_size;

        while (1)
        {
                printf("==>SHELL");
                input_size = read(0, input, sizeof(input));
                /** Remove the newline character at the end.*/
                printf("%s", input);
                if (input_size < 0)
                {
                        perror("Input is empty");
                        exit(1);
                }
                // ssize_t getline(char **lineptr, size_t *n, FILE *stream)
                input[input_size] = '\0';
                token_count = 0;

                token = strtok(input, " \t\n");

                while (token != NULL)
                {
                        tokens[token_count++] = token;
                        token = strtok(NULL, " ");
                }
                tokens[token_count] = NULL;
                /** Null-terminate the token array.*/
                //  pid = fork();

                // shell_check(pid, tokens);
        }
        return (0);
}

/**input
 * shell_check - check the process id
 * @pid: process id
 * @tokens: array of input
 */

// void shell_check(pid_t pid, char **tokens)
// {
//         char *path;
//         int bin_len;
//         char *bin;
//         int token_len;

//         bin_len = 0;
//         token_len = 0;
//         bin = "/bin/";

//         path = (char *)malloc(sizeof(*path) + 1);
//         while (bin[bin_len] != '\0')
//         {
//                 path[bin_len] = bin[bin_len];
//                 bin_len++;
//         }

//         while (tokens[0][token_len] != '\0')
//         {
//                 path[bin_len] = tokens[0][token_len];
//                 token_len++;
//                 bin_len++;
//         }

//         if (pid == 0)
//         {
//                 execve(path, tokens, NULL);
//                 perror("Exec failed");
//                 exit(1);
//         }
//         else if (pid > 0)
//         {
//                 wait(NULL);
//         }
//         else
//         {
//                 perror("Fork failed");
//                 exit(1);
//         }

//         free(path);
// }

char get_arr(char *str)
{
        printf("%s", str);
}

int main()
{
        char *str = "adio";
        get_arr(str);
        printf("hello");
        return 0;
}