#include <stdio.h>
#include <limits.h>
#include <stdio.h>
#include <limits.h>

/**
 * _atoi - Converts a string to an integer.
 * @s: The string to extract from.
 *
 * Return: The integer extracted from the string.
 */
int _atoi(char *s)
{
	int sign = 1;
	int result = 0;
	int index = 0;


	while (s[index] != '\0')
	{
		if (s[index] == '-')
			sign = -sign;

		if (s[index] >= '0' && s[index] <= '9')
		{

			result = (result * 10) + (s[index] - '0');
		}

		if ((s[index] >= '0' && s[index] <= '9') &&
		    ((s[index + 1] >= 'A' && s[index + 1] <= 'Z') ||
		     s[index + 1] == ' ' ||
		     (s[index + 1] >= 'a' && s[index + 1] <= 'z')))
		{

			break;
		}

		index++;
	}

	return (result * sign);
}
