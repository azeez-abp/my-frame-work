#include <stdio.h>
#include <unistd.h>
#include <stdlib.h>
#include <string.h>
#define MAX_INPUT_SIZE 1024
/**
 * get_input - Get the input from keyboard
 *
 * Return: The read input
 */
char *get_input(void)
{
	char *input = NULL;
	size_t input_size = 0;
	ssize_t input_size_read;

	input_size_read = getline(&input, &input_size, stdin);

	if (input_size_read < 0 || input_size_read == 1)
	{
		perror("Input is empty");
		free(input); // Free allocated memory
		return NULL;
	}

	input[input_size_read - 1] = '\0';
	return (input);
}

/**
 * _strlen - return the lenth of the string
 * @s: the string to measure.
 *
 * Return: Int value of the length.
 */
int _strlen(char *s)
{
	int len = 0;

	while (*(s + len) != '\0')
	{
		len++;
	}
	return (len);
}

/**
 * _strncpy - copies a string
 * @dest: destination.
 * @src: source.
 * @n: amount of bytes from src.
 * Return: the pointer to dest.
 */

char *_strncpy(char *dest, char *src, int n)
{
	int i;

	for (i = 0; i < n && src[i] != '\0'; i++)
		dest[i] = src[i];
	for (; i < n; i++)
		dest[i] = '\0';

	return (dest);
}

/**
 * input_to_array - Convert string to array of tokens
 * @inputs: Input string
 *
 * Return: Array of tokens
 */
char **input_to_array(char *inputs)
{
	char **tokens = malloc(sizeof(char *) * MAX_INPUT_SIZE);
	unsigned int token_count = 0;

	char *token = strtok(inputs, " ");
	while (token != NULL)
	{
		tokens[token_count] = malloc(_strlen(token) + 1); // Allocate memory for token
		_strncpy(tokens[token_count++], token, _strlen(token) + 1);
		token = strtok(NULL, " ");
	}

	tokens[token_count] = NULL;
	return (tokens);
}

/**
 * main - Entry point of the program
 *
 * Return: Always 0
 */
int main(void)
{
	char *input = get_input();
	if (input == NULL)
		return 1; // Exit if input is empty

	char **arr = input_to_array(input);
	unsigned int loc = 0;

	while (arr[loc] != NULL)
	{
		printf("%s\n", arr[loc]);
		free(arr[loc]); // Free each token
		loc++;
	}

	free(arr);   // Free array of tokens
	free(input); // Free input string
	return 0;
}


if (!already_executed)  
	{
		already_executed = 1;
		if (execve(tokens[0], tokens, NULL) == -1)
		{
			perror(v[0]);
		}
	}
	exit(0);
} 

!isatty(STDIN_FILENO)