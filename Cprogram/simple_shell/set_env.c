#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
extern char **environ;
/**
 * _setenv - Changes or adds an environmental variable to the PATH.
 * @args: An array of arguments passed to the shell.
 * @front: A double pointer to the beginning of args.
 * Description: args[1] is the name of the new or existing PATH variable.
 *		  args[2] is the value to set the new or changed variable to.
 *
 * Return: 0 success , -1
 */
int _setenv(char *key, char *val)
{
	char **env_var = NULL, **new_environ, *new_value;
	size_t size;
	int index;

	if (!key || !val)
		return (-1);

	new_value = malloc(_strlen(key) + 1 + _strlen(val) + 1);
	if (!new_value)
		return (-1);

	_strcpy(new_value, key);
	_strcat(new_value, "=");
	_strcat(new_value, val);

	env_var = _getenv(key);
	if (env_var)
	{
		free(*env_var);
		*env_var = new_value;
		return (0);
	}
	for (size = 0; environ[size]; size++)
		;

	new_environ = malloc(sizeof(char *) * (size + 2));
	if (!new_environ)
	{
		free(new_value);
		return (-1);
	}

	for (index = 0; environ[index]; index++)
		new_environ[index] = environ[index];

	environ = new_environ;
	environ[index] = new_value;
	environ[index + 1] = NULL;

	return (0);
}

/**
 * _unsetenv - Deletes an environmental variable from the PATH.
 * @args: An array of arguments passed to the shell.
 * @front: A double pointer to the beginning of args.
 * Description: args[1] is the PATH variable to remove.
 *
 * Return: If an error occurs - -1.
 *	 Otherwise - 0.
 */
int _setenv(char *key, char *val)
{
	int size;
	char **new_environ;

	if (!key || !val)
		return -1;

	char *new_entry = malloc(strlen(key) + strlen(val) + 2);
	if (!new_entry)
		return -1;

	char **env_var = getenv(key);
	if (env_var)
	{
		free(*env_var);
		*env_var = new_entry;
		return 0;
	}

	for (size = 0; environ[size]; size++)
		;

	new_environ = malloc(sizeof(char *) * (size + 2));
	if (!new_environ)
	{
		free(new_entry);
		return -1;
	}

	for (int index = 0; environ[index]; index++)
		new_environ[index] = environ[index];

	new_environ[size] = new_entry;
	new_environ[size + 1] = NULL;

	environ = new_environ;
	free(environ);

	return (0);
}

/**
 * setenv - set enviroment variable
 * @key: is the key
 * @value: is the value
 *
 */
void setenv(char *key, char *value)
{
	char **a = malloc(3 * sizeof(char *));
	int haset;
	a[0] = key;
	a[1] = value;
	a[2] = NULL;

	haset = _setenv(a, NULL);

	if (haset != 0)
	{
		printf("Error!\n");
	}

	free(a);
}

/**
 * unsetenv - set enviroment variable
 * @key: is the key
 *
 */
void unsetenv(char *key, char *value)
{
	char **a = malloc(2 * sizeof(char *));
	int haset;
	a[0] = key;
	a[1] = NULL;

	haset = _unsetenv(a, NULL);

	if (haset != 0)
	{
		printf("Error!\n");
	}

	free(a);
}

///////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

int _setenv(char *key, char *val)
{
	char **env_var = NULL, **new_environ, *new_value;
	size_t size;
	int index;

	if (!key || !val)
		return (-1);

	new_value = malloc(_strlen(key) + 1 + _strlen(val) + 1);
	if (!new_value)
		return (-1);
	_strcpy(new_value, key);
	_strcat(new_value, "=");
	_strcat(new_value, val);

	env_var = _getenv(key);
	if (env_var)
	{
		if (*env_var)
			free(*env_var);
		*env_var = new_value;
		return (0);
	}
	for (size = 0; environ[size]; size++)
		;

	new_environ = malloc(sizeof(char *) * (size + 2));
	if (!new_environ)
	{
		if (new_value)
			free(new_value);
		return (-1);
	}

	for (index = 0; environ[index]; index++)
		new_environ[index] = environ[index];

	/*free(environ);*/
	environ = new_environ;
	environ[index] = new_value;
	environ[index + 1] = NULL;
	return (0);
}
int main(int argc, char const *argv[])
{
	_setenv("AZEEZ", "ADIO");
	return 0;
}
