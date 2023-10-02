#include <stdio.h>

/**
 * Declaration
 * expression terminated with semi column
 */

struct Student
{
        int rollNumber;
        char name[50];
        int age;
        float gpa;
        int (*get_age)(struct Student *st); /**struct type must be passed as pointer in function parameter that is why we have *st not st*/
        void (*set_age)(struct Student *st, int age);
};

/**
 * get_student_age - get studennt age
 * Return: int age of the student
 */
int get_student_age(struct Student *student)
{
        return student->age;
}
/**
 * set_student_age - set student name
 * student: struct student
 */

void set_student_age(struct Student *student, int age)
{
        student->age = age;
}

/**
 * main - Entry point
 * Return: 0 Alway successfull
 */

int main(int argc, char *argv)
{
        /**
         * Assignment
         * Expression terminated with comma
         * struct is use to solve object problem
         */
        struct Student azeez =
            /**
             *Note Student is not  a type
             *  struct Student is a type together ; struct is a type thta requre  tag  then struct(key word for type) Student(tag) azeez(variable name)
             * if you want to define Student as a type use
             * typedef struct Student Student
             * syntax of typedef is typedef type(e.g char, int) new type (any name)
             * for struct the type is type tag combine i.e  struct Student
             * typedef int newInt
             * typedef struct Student Student
             */
            {
                123,
                "azeez",
                5,
                4.2,
                get_student_age,
                set_student_age,
            };

        /**
         * Both declaratiion and assginment  constains the struc
         *
         */
        azeez.set_age(&azeez, 120);
        printf("Student { %i , %d }", azeez.rollNumber, azeez.get_age(&azeez));
        return (0);
}
