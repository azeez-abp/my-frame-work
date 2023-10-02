#include <stdio.h>
#include <stdarg.h>

void printargs(const char *format, ...)
{
        va_list ap;
        const char *ptr = format;
        int i;
        char *s;
        /**
         * va_start (va_list,first_argument)
         *
         */
        va_start(ap, format);

        while (*ptr)
        {
                switch (*ptr++)
                {
                case 'i':
                        i = va_arg(ap, int);
                        printf("%d ", i);
                        break;
                case 's':
                        s = va_arg(ap, char *);
                        printf("%s ", s);
                        break;
                case 'a':
                        s = va_arg(ap, char *);
                        printf("{ ");
                        while (*s)
                        {
                                printf("%s ", s);
                                s++;
                        }
                        printf("} ");
                        break;
                default:
                        break;
                }
        }
        va_end(ap); /**clean up var_list*/
        putchar('\n');
}

int main()
{
        char *name[] = {"asd", "sdasd", NULL};

        printargs("isi", 34, "absbd", name);

        return 0;
}
