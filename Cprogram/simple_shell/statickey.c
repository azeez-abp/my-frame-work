#include <stdio.h>
#include <string.h>
#include <stdlib.h>

#include "header.h"
/**
 * _strtok - return string where the delimter encounter
 * @str:string that conatins the delimiter
 * @delim: is the delimiter
 * Return: the string encounter befor the delimter
 */
char *_strtok(char *str, char delim)
{
	static char tmp[1024];
	static int loc = 0;
	unsigned int pos;
	// tmp = malloc(sizeof(char) * 7 + 1); // Allocate space for tmp
	pos = 0;

	while (str[loc] != '\0')
	{
		if (str[loc] == delim)
		{
			loc++;
			break;
		}
		else
		{
			tmp[pos] = str[loc];
			loc++;
			pos++;
		}
	}

	tmp[pos] = '\0'; // Null-terminate tmp
	return (tmp);
}

void _strtok2()
{
	static int num = 0;
	int a;
	a = 4;
	while (a < 6)
	{
		a++;
		num++;
	}

	num++;
	printf("Count is %d\n", num);
}

int main(void)
{
	_strtok2();
	_strtok2();
	_strtok2();

	char *s = "Azeez adio adeyori ggvhgvh";

	char *l1 = _strtok(s, ' ');

	while (l1 != NULL)
	{
		printf("%s\n", l1);

		l1 = _strtok(s, ' ');
	}

	return 0;
}

shell2.c : 68 : WARNING : Missing a blank line after declarations
			      shell2.c : 110 : ERROR : trailing whitespace
							   shell2.c : 111 : ERROR : space required before the open parenthesis '('