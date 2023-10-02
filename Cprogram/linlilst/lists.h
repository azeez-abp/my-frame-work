#ifndef LINK_H
#define LIKK_H
#include <stdlib.h>
#include <stdio.h>

typedef struct node Node;

struct node
{
        int data;
        Node *next; /**
                     * if it si complex data it must be a pointer
                     *
                     */
};
//  struct node_  = Node_
typedef struct node_
{
        int data;
        struct node_ *next; /**
                             * if it si complex data it must be a pointer
                             *
                             */
        struct node_ *prev;
} Node_;
#endif