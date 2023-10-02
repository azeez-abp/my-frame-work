
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>
/*An array can be passed to a function in 2 ways, namely:

1. Call by value

In this method, the actual parameter gets copied to the formal parameters. As the name itself suggests,
the actual value is passed to the function. Any changes made to the formal parameters are not reflected in
the actual parameters passed to the function

2. Call by reference

In this method, instead of the actual parameter, the address of the actual parameters is passed to the formal parameters.
 Hence, any changes made in the actual parameters are reflected in the formal parameters.*/

void display(int *powers)
{
	printf("%d ", powers[0]);
}

char *remove_bin(char *buffer)
{

	unsigned int slash_count;
	unsigned int path_count;
	char *path = (char *)malloc(1024);
	unsigned int i;

	slash_count = 0;
	path_count = 0;
	i = 0;

	for (i = 0; buffer[i] != '\0'; i++)
	{
		if (buffer[i] == ' ')
			break;
		if (buffer[i] == '/')
			slash_count++;
		if (slash_count > 1 && buffer[i] != '/')
		{
			path[path_count] = buffer[i];
			path_count++;
		}
	}
	path[path_count] = '\0';

	return (path);
}
int main()
{
	printf("%s", remove_bin("/bin/ls"));
	return 0;
}
int main2()
{
	// array variable is a pointer

	int arr[5];		       // Fixed-size array with explicit size
	int arr2[5] = {1, 2, 3, 4, 5}; // Fixed-size array with initialization:
	int arr3[] = {111, 2, 3};      // Fixed-size array without specifying size (compiler infers
				       //  size from the number of elements in the initialization):

	int matrix[3][3]; // Multi-dimensional array:
	char *buf[4];	  // Array of 4 pointers to strings

	buf[0] = "azzez";
	buf[1] = "xyz";
	buf[2] = "123";
	buf[3] = "abc";

	for (int i = 0; i < 4; i++)
	{
		printf("%s\n", buf[i]);
	}
	///////////////////////////////////

	char str2[20]; // Character array with space for 19 characters + null terminator
	strcpy(str2, "Hello, World!");
	///////////////////////////////

	char *str = malloc(strlen("Dynamic String") + 1);
	strcpy(str, "Dynamic String");
	// ...
	free(str); // Remember to free the memory when you're done using it

	char *strings[4]; // Array of pointers to strings
	strings[0] = "String 1";
	strings[1] = "String 2";

	char buffer[1024];

	ssize_t s = read(0, buffer, sizeof(buffer));
	int i;
	buffer[s - 1] = '\0';
	unsigned int slash_count;
	unsigned int path_count;
	char path[1042];
	char *path_arr[1024];
	slash_count = 0;
	path_count = 0;

	for (i = 0; buffer[i] != '\0'; i++)
	{
		if (buffer[i] == ' ')
			break;
		if (buffer[i] == '/')
			slash_count++;
		if (slash_count > 1 && buffer[i] != '/')
		{
			path[path_count] = buffer[i];
			path_count++;
		}
	}
	path[path_count] = '\0';
	path_arr[0] = path;
	path_arr[1] = NULL;

	printf("%s path\n %s\n", buffer, path_arr[0]);

	display(arr3); // by ref
		       // Dynamic array (using pointers and dynamic memory allocation):
		       // type casting (int) '5';
}

// cd "c:\xampp\htdocs\code\Cprogram\" && gcc array.c -o array && "c:\xampp\htdocs\code\Cprogram\array

/**
 * chr_search: search a character within a string
 * @cha: the character to search
 * @str1: string that contains the character
 * Return: 1 found , 0 not found
 */
int chr_search(char cha, char *str2)
{
	int loc;
	int found;

	loc = 0;
	found = 0;

	while (str2[loc] != '\0')
	{
		if (cha == str2[loc])
		{
			found = 1;
			break;
		}
		else
		{
			found = 0;
		}

		loc++;
	}

	return (found);
}