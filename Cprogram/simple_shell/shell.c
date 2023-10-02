#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/wait.h>

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

int main(void)
{

	char *tokens[MAX_INPUT_SIZE];
	int token_count;
	char *token;
	char *input;
	ssize_t input_size;
	size_t input_sizeof;
	pid_t pid;
	input_sizeof = 0;
	printf(PROMPT);

	while (1)
	{
		printf(PROMPT);
		/**input_size = read(0, input, sizeof(input));*/
		input_size = getline(&input, &input_sizeof, stdin);
		/** Remove the newline character at the end.*/
		if (input_size < 0)
		{
			perror("Input is empty");
			exit(1);
		}
		printf("input %s", input);
		/**input[input_size] = '\0';*/
		token_count = 0;

		token = strtok(input, " ");

		while (token != NULL)
		{
			tokens[token_count++] = token;
			token = strtok(NULL, " ");
		}
		tokens[token_count] = NULL;

		// Handle 'exit' command
		if (strcmp(v[0], "exit") == 0)
		{
			free(input);
			exit(0); // Exit the shell
		}
		/** Null-terminate the token array.*/
		pid = fork();

		shell_check(pid, tokens);
	}
	return (0);
}

/**
 * shell_check - check the process id
 * @pid: process id
 * @tokens: array of input
 */

void shell_check(pid_t pid, char **tokens)
{
	char *path;
	int bin_len;
	char *bin;
	int token_len;
	char **env;

	bin_len = 0;
	token_len = 0;
	bin = "/bin/";

	path = (char *)malloc(sizeof(*path) + 1);
	while (bin[bin_len] != '\0')
	{
		path[bin_len] = bin[bin_len];
		bin_len++;
	}

	while (tokens[0][token_len] != '\0')
	{
		path[bin_len] = tokens[0][token_len];
		token_len++;
		bin_len++;
	}

	// Handle 'env' command
	if (strcmp(tokens[0], "env") == 0)
	{
		// Print environment variables
		env = environ;

		while (*env)
		{
			printf("%s\n", *env);
			env++;
		}
	}
	else if (pid == 0)
	{
		execve(path, tokens, NULL);
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

	free(path);
}

#include "header.h"

/**
 * _cd - Change the current working directory.
 * @argc: The number of arguments.args[1]
 * @argv: An array of argument strings.
 * Return: 0 on success, -1 on failure.
 */
int _cd(int argc, char *argv[])
{
	char *new_dir;

	if (argc == 1)
	{
		new_dir = getenv("HOME");
	}
	else if (_strcmp(argv[1], "-") == 0)
	{
		new_dir = _getenv("OLDPWD");
	}
	else
	{
		new_dir = argv[1];
	}

	char *old_dir = getcwd(NULL, 0);

	if (chdir(new_dir) != 0)
	{
		perror("cd");
		return -1;
	}

	if (_setenv("PWD", getcwd(NULL, 0)) != 0)
	{
		perror("setenv");
		return -1;
	}

	if (_setenv("OLDPWD", old_dir) != 0)
	{
		perror("setenv");
		return -1;
	}

	free(old_dir);

	return 0;
}

#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <unistd.h>

#include "header.h"

/**
 *clean_cd - clearing memo
 *@dir_info: directory info
 *@oldpwd:old dir
 *@arg: the token of input console
 *Return: 0 successful, else error
 */
int clean_cd(char *oldpwd, char **args, char *pwd)
{
	char *dir_info_key;
	char *dir_info_val;
	char *dir_info_key2;
	char *dir_info_val2;

	pwd = getcwd(pwd, 0);
	if (!pwd)
		return (-1);
	dir_info_key = malloc((sizeof(char *) * _strlen("OLDPWD")) + 1);
	dir_info_val = malloc((sizeof(char *) * _strlen(oldpwd)) + 1);

	dir_info_key2 = malloc((sizeof(char *) * _strlen("PWD")) + 1);
	dir_info_val2 = malloc((sizeof(char *) * _strlen(pwd)) + 1);

	if (!dir_info_key)
		return (-1);

	_strncpy(dir_info_key, "OLDPWD", _strlen("OLDPWD"));
	_strncpy(dir_info_val, oldpwd, _strlen(oldpwd));

	if (_setenv(dir_info_key, dir_info_val) == -1)
		return (-1);

	dir_info_key = "PWD";
	dir_info_val = pwd;

	if (_setenv(dir_info_key, dir_info_val) == -1)
		return (-1);
	if (args[1] && args[1][0] == '-' && args[1][1] != '-')
	{
		write(STDOUT_FILENO, pwd, _strlen(pwd));
		write(STDOUT_FILENO, "\n", 1);
	}

	free(oldpwd);
	free(pwd);
	free(dir_info_key);
	free(dir_info_val);
	free(dir_info_key2);
	free(dir_info_val2);
	return (0);
}
/**
 * _cd - Changes the current directory of the shellby process.
 * @args: An array of arguments.
 * Return:
 *	 If the given string is not a directory - 2.
 *	 If an error occurs - -1.
 *	 Otherwise - 0.
 */
int _cd(char **args)
{
	char *oldpwd = NULL;
	char *pwd = NULL;
	struct stat dir;
	char *dir_;
	char **genv;

	oldpwd = getcwd(oldpwd, 0);
	if (!oldpwd)
		return (-1);

	if (args[1])
	{
		if (*(args[1]) == '-' || _strncmp(args[1], "--", _strlen(args[1])) == 0)
		{
			if ((args[1][1] == '-' && args[1][2] == '\0') ||
			    args[1][1] == '\0')
			{
				if (_getenv("OLDPWD") != NULL)
				{
					genv = _getenv("OLDPWD");
					dir_ = _strtok(*(genv + 0), "=");
					dir_ = _strtok(NULL, "=");
					(chdir(dir_));
				}
			}
			else
			{
				free(oldpwd);
				return (2);
				/*Not a dir*/
			}
		}
		else
		{
			if (stat(args[1], &dir) == 0 && S_ISDIR(dir.st_mode) && ((dir.st_mode & S_IXUSR) != 0))
				chdir(args[1]);
			else
			{
				free(oldpwd);
				return (2);
				/*invalid dir*/
			}
		}
	}
	else
	{
		if (_getenv("HOME") != NULL)
		{
			genv = _getenv("HOME");
			dir_ = _strtok(*(genv + 0), "=");
			dir_ = _strtok(NULL, "=");
			(chdir(dir_));
		}
	}

	clean_cd(oldpwd, args, pwd);
	return (0);
}
