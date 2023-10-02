#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

#define BUFFER_SIZE 256
/**
 * shell - function for shell
 */

void shell(void);

/**
 * main - Entrypoin
 * Return: 0 stop execution
 */

int main(void)
{
        shell();

        return (0);
}
/**
 * shell - function for shell
 */

void shell(void)
{
        char buffer[BUFFER_SIZE];

        while (1)
        {
                printf("Shell started :=>\t");

                if (fgets(buffer, BUFFER_SIZE, stdin) == NULL)
                {
                        printf("Empty content");

                        break;
                }
                /**
                 * put empty null to the last of the
                 * element in the array
                 */
                buffer[strncspn(buffer, "\n")] = "\0";

                pid_t pid = fork();

                if (pid < 0)
                {
                        fprintf(stderr, "Failed to create child process");
                        continue;
                }

                else if (pid == 0)
                {
                        execp1(buffer, buffer, NULL);
                        fprintf(stderr, "command %s not executable\n", buffer);
                }
                else
                {
                        int status;

                        waitpid(pid, &status, 0);
                }
        }
}

#define MAX_INPUT_SIZE 1024
#define PROMPT "myshell> "

/**
 * main - Entry point
 * Return: 0 successful
 */

int shell2(void)
{

        char *tokens[MAX_INPUT_SIZE];
        int token_count = 0;
        char *token;
        char input[MAX_INPUT_SIZE];

        while (1)
        {
                printf(PROMPT);
                fgets(input, sizeof(input), stdin);
                /** Remove the newline character at the end.*/
                input[strcspn(input, "\n")] = '\0';
                token = strtok(input, " ");
                token_count = 0;

                while (token != NULL)
                {
                        tokens[token_count++] = token;
                        token = strtok(NULL, " ");
                }

                tokens[token_count] = NULL;
                /** Null-terminate the token array.*/

                pid_t pid = fork();

                if (pid == 0)
                {
                        execvp(tokens[0], tokens);
                        perror("Exec failed");
                        exit(1);
                }
                else if (pid > 0)
                {
                        wait(NULL);
                }
                else
                {
                        perror("Fork failed");
                        exit(1);
                }
        }

        return (0);
}
