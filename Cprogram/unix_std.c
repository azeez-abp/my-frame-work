#include <stdio.h>

#ifdef _WIN32
// Code for Windows platform
#else
// Code for Unix-based platforms
#include <unistd.h> // for operaton on unix os not DOS
#endif
/**
 * @file unix_std.c
 * @author your name (you@domain.com)
 * @brief
 * @version 0.1
 * @date 2023-07-19
 *
 * @copyright Copyright (c) 2023
 * POSIX API (Portable Operating System Interface)
 *
 * fork(): This function is used to create a new process (child process) that is an identical copy
 * of the calling process (parent process). The child process starts execution from the same point as the parent process.
 *
 * exec() family: These functions are used to execute a new program in the current process.
 * They replace the current process image with a new one.
 *
 * getpid(): This function returns the process ID of the calling process.
 *
 *
 *
 * Some of the common functions provided by conio.h are: Console input an doutput

getch(): This function reads a single character from the console without echoing it to the screen.

getche(): This function reads a single character from the console and echoes it to the screen.

clrscr(): This function clears the console screen.

cputs(): This function writes a string to the console.

cgets(): This function reads a string from the console.

gotoxy(): This function moves the cursor to a specified position on the console screen.
 */

int main()
{
        pid_t pid;

        pid = fork();
        if (pid < 0)
        {
                perror("fork");
                return 1;
        }
        else if (pid == 0)
        {
                // Child process
                printf("Hello from the child process!\n");
        }
        else
        {
                // Parent process
                printf("Hello from the parent process!\n");
        }

        execlp("/bin/ls", "ls", "-l", NULL);
        perror("execlp");
        printf("%ud", 10);

        pid = getpid();
        printf("Process ID: %d\n", pid);

        clrscr(); // Clear the screen

        cputs("Hello, World!"); // Print the string

        int x = 10, y = 5;
        gotoxy(x, y); // Move cursor to (x, y)
        cputs("Position (10, 5)");

        getch(); // Wait for a keypress
        return 0;
}
