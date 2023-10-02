#include <unistd.h>
#include <stdarg.h>
#include <limits.h>
/**
 * _prinf - function to print input character
 * @format: our formating template
 * ...: rest of the parameterr
 *
 */

int _printf(const char *format, ...)
{
        va_list args;
        va_start(args, format);

        int charCount = 0;

        while (*format)
        {
                if (*format == '%')
                {
                        format++; // Move past '%'

                        // Handle conversion specifiers
                        switch (*format)
                        {
                        case 'c':
                        {
                                char c = va_arg(args, int);
                                write(1, &c, 1);
                                charCount++;
                                break;
                        }

                        case 's':
                        {
                                const char *str = va_arg(args, const char *);
                                while (*str)
                                {
                                        write(1, str, 1);
                                        str++;
                                        charCount++;
                                }
                                break;
                        }

                        case '%':
                        {
                                char percent = '%';
                                write(1, &percent, 1);
                                charCount++;
                                break;
                        }
                        case 'i':
                                break;

                        default:
                                // Handle unsupported specifiers
                                // (you can also just ignore them)
                                break;
                        }
                }
                else
                {
                        write(1, format, 1);
                        charCount++;
                }

                format++;
        }

        va_end(args);
        return (charCount);
}

int main(void)
{
        int len;
        int len2;
        unsigned int ui;
        void *addr;

        len = _printf("Let's try to printf a simple sentence.\n");
        len2 = printf("Let's try to printf a simple sentence.\n");
        ui = (unsigned int)INT_MAX + 1024;
        addr = (void *)0x7ffe637541f0;
        _printf("Length:[%d, %i]\n", len, len);
        printf("Length:[%d, %i]\n", len2, len2);
        _printf("Negative:[%d]\n", -762534);
        printf("Negative:[%d]\n", -762534);
        _printf("Unsigned:[%u]\n", ui);
        printf("Unsigned:[%u]\n", ui);
        _printf("Unsigned octal:[%o]\n", ui);
        printf("Unsigned octal:[%o]\n", ui);
        _printf("Unsigned hexadecimal:[%x, %X]\n", ui, ui);
        printf("Unsigned hexadecimal:[%x, %X]\n", ui, ui);
        _printf("Character:[%c]\n", 'H');
        printf("Character:[%c]\n", 'H');
        _printf("String:[%s]\n", "I am a string !");
        printf("String:[%s]\n", "I am a string !");
        _printf("Address:[%p]\n", addr);
        printf("Address:[%p]\n", addr);
        len = _printf("Percent:[%%]\n");
        len2 = printf("Percent:[%%]\n");
        _printf("Len:[%d]\n", len);
        printf("Len:[%d]\n", len2);
        _printf("Unknown:[%r]\n");
        printf("Unknown:[%r]\n");
        return (0);
}
