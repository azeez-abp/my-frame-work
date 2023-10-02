1. **Include Libraries**:

   - Include the necessary C standard libraries like `stdio.h`, `stdlib.h`, `string.h`, `unistd.h`, and `sys/wait.h`.

2. **Define Constants**:

   - Define `MAX_INPUT_SIZE` as 1024, representing the maximum size for the input buffer.
   - Define `PROMPT` as "myshell> ", which is the shell prompt string.

3. **Declare Functions**:

   - `char *concat(char *str1, char *str2)`: A function to concatenate two strings.
   - `void shell_check(pid_t pid, char **tokens)`: A function to check the process ID and execute a command.

4. **Define `main` Function**:

   - Initialize variables:
     - `char *input = NULL`: User input buffer.
     - `size_t input_size = 0`: Initial size of the buffer.
     - `ssize_t input_size_read`: Size of input read.
     - `char *tokens[MAX_INPUT_SIZE]`: Array of command and arguments.
     - `int token_count`: Number of tokens.
     - `char *token`: Individual token.
     - `pid_t pid`: Process ID.

5. **Start Infinite Loop**:

   - Display the shell prompt.
   - Read user input using `getline`.
   - Check if the input is empty. If so, display an error message and exit.
   - Remove the trailing newline character from the input.
   - Tokenize the input into an array of strings.

6. **Fork a Child Process**:

   - Fork a child process using `fork`.

7. **Call `shell_check` Function**:

   - Pass the process ID and array of tokens to `shell_check` function.

8. **`shell_check` Function**:

   - Concatenate "/bin/" with the first token to get the full path of the command.
   - Execute the command using `execve` in the child process.
   - Handle errors if `execve` fails.
   - In the parent process, wait for the child process to finish.
   - Handle errors if `fork` fails.

9. **Free Allocated Memory**:

   - Free the allocated memory for `input`.

10. **Return 0**:

- Indicate successful program execution.

https://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@github.com/azeez-abp/simple_shell.git

# 0x16. C - Simple Shell Project

## Contriutors

- [**Azeez Adio**](https://github.com/azeez-abp/simple_shell) And (**Sanni**)[https://github.com/sanipop]

## Description

 <p>
        The shell work simiar to in-built shell in UNIX susyem. It receice the command, check the valididty, if the command is valid it will be executed else print error message
</p>

## Features

- Execute basisc command
- Exexcute command print argument
- Handle exit by sending exit to shell
- Print environment variables by sending env to the shell

https://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@github.com/azeez-abp/simple_shell.git
