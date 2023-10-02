
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/types.h>
#include <sys/stat.h>

// /**
//  *
//  * proc_file_commands - Takes a file and attempts to run the commands stored
//  * within.
//  * @file_path: Path to the file.
//  * @exe_ret: Return value of the last executed command.
//  *
//  * Return: If file couldn't be opened - 127.
//  *	   If malloc fails - -1.
//  *	   Otherwise the return value of the last command ran.
//  */
// int proc_file_commands(char *file_path, int *exe_ret)
// {
//	 ssize_t file, b_read, i;
//	 unsigned int line_size = 0;
//	 unsigned int old_size = 120;
//	 char *line, **args, **front;
//	 char buffer[120];
//	 int ret;

//	 file = open(file_path, O_RDONLY);
//	 if (file == -1)
//	 {
//		 perror("");
//		 return (*exe_ret);
//	 }
//	 line = malloc(sizeof(char) * old_size);
//	 if (!line)
//		 return (-1);
//	 do
//	 {
//		 b_read = read(file, buffer, 119);
//		 if (b_read == 0 && line_size == 0)
//			 return (*exe_ret);
//		 buffer[b_read] = '\0';
//		 line_size += b_read;
//		 line = _realloc(line, old_size, line_size);
//		 _strcat(line, buffer);
//		 old_size = line_size;
//	 } while (b_read);
//	 for (i = 0; line[i] == '\n'; i++)
//		 line[i] = ' ';
//	 for (; i < line_size; i++)
//	 {
//		 if (line[i] == '\n')
//		 {
//			 line[i] = ';';
//			 for (i += 1; i < line_size && line[i] == '\n'; i++)
//				 line[i] = ' ';
//		 }
//	 }

//	 variable_replacement(&line, exe_ret);
//	 handle_line(&line, line_size);
//	 args = _strtok(line, " ");
//	 free(line);
//	 if (!args)
//		 return (0);
//	 if (check_args(args) != 0)
//	 {
//		 *exe_ret = 2;
//		 free_args(args, args);
//		 return (*exe_ret);
//	 }
//	 front = args;

//	 for (i = 0; args[i]; i++)
//	 {
//		 if (_strncmp(args[i], ";", 1) == 0)
//		 {
//			 free(args[i]);
//			 args[i] = NULL;
//			 ret = call_args(args, front, exe_ret);
//			 args = &args[++i];
//			 i = 0;
//		 }
//	 }

//	 ret = call_args(args, front, exe_ret);

//	 free(front);
//	 return (ret);
// }
#include "header.h"
int readfile(char *path)
{
	const int MAX_LINE_SIZE = 120;

	int file_descriptor = open(path, O_RDONLY);

	if (file_descriptor == -1)
	{
		perror("open");
		exit(EXIT_FAILURE);
	}

	char line[MAX_LINE_SIZE];
	ssize_t bytes_read;

	do
	{
		bytes_read = read(file_descriptor, line, sizeof(line));

		if (bytes_read > 0)
		{
			line[bytes_read - 1] = '\0'; // Remove newline character

			pid_t pid = fork();

			if (pid == -1)
			{
				perror("fork");
				exit(EXIT_FAILURE);
			}

			if (pid == 0)
			{ // Child process
				char *args[] = {"/bin/sh", "-c", line, NULL};
				execve("/bin/sh", args, NULL);
				perror("execve"); // This line will only be reached if execve fails
				exit(EXIT_FAILURE);
			}
			else
			{		    // Parent process
				wait(NULL); // Wait for the child process to finish
			}
		}

	} while (bytes_read > 0);

	close(file_descriptor);
	return 0;
}

int main(int argc, char const *argv[])
{
	readfile("./set");
	return 0;
}

/**
 * readfile - A function that read content of a fiel and exec command
 * @path: file rectory
 * Return: 0 successfule
 */
int readfile(char *path)
{
	const int MAX_LINE_SIZE = 120;
	char line[MAX_LINE_SIZE];
	ssize_t bytes_read;
	int file_descriptor;
	char *arhs[];

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
			line[bytes_read - 1] = '\0'; // Remove newline character

			pid_t pid = fork();

			if (pid == -1)
			{
				perror("fork");
				exit(EXIT_FAILURE);
			}

			if (pid == 0)
			{
				args = {"/bin/sh", "-c", line, NULL};
				execve("/bin/sh", args, environ);
				perror("execve");
				exit(EXIT_FAILURE);
			}
			else
			{		    // Parent process
				wait(NULL); // Wait for the child process to finish
			}
		}

	} while (bytes_read > 0);

	close(file_descriptor);
	return (0);
}

/**
 * execution - run the code
 * @token: array string
 * @input: string read from stdinp and converted tokens
 */
void execution(char **token)
{
	if (tokens)
	{
		check_env(tokens[0]);

		if (streql("setenv", tokens[0]) == 1)
		{
			if (!tokens[1] || !tokens[2])
				continue;
			setenvfunc(tokens[1], tokens[2]);
			free(tokens);
			continue;
		}
		else if (streql("unsetenv", tokens[0]) == 1)
		{
			unsetenvfunc(tokens[1]);
			continue;
		}
		else if (streql("cd", tokens[0]) == 1)
		{

			_cd(tokens);
		}
		else
		{
			if (streql(tokens[0], "exit") == 1)
			{
				if (tokens[1])
				{
					exit((int)(*tokens[1]));
				}
				else
					exit(0);
			}
			if (str_search("/bin/", tokens[0]) == 0)
				tokens[0] = concat("/bin/", tokens[0]);
			pid = fork();
			run_command(c, v, pid, tokens);
			if (!isatty(STDIN_FILENO))
				break;
		}
		free(tokens);
	}
}
