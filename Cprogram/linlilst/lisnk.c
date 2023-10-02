#include "lists.h"
/**
 *Basic, use pointyer for compound data type
 Pointer for pointer pointer = address
 value for value
 in body of a function *p = whole value; while p is the value at first location in memory

 */
Node create_node(int data, Node *node)
{
        Node *head = (Node *)malloc(sizeof(Node));
        // value to  value; pointer to pointer
        head->data = data;
        head->next = node;
        // node is first thing; *node is the whole things
        if (node != NULL)
        {
                printf("%d\n", node->data);
        }

        return (*head);
}

int add_at_head(Node *head, Node *node)
{
        // next of the node is the head
        //
        if (head != NULL)
        {
                node->next = head;
                return (1);
        }
        exit(0);
}

int add_at_tail(Node *head, Node *node)
{
        // next of the node is the head
        //
        Node *cur = head;
        while (cur != NULL)
        {
                cur = cur->next; /* code */
        }
        cur->next = node;
        exit(0);
}

int add_at_pos(Node *head, Node *node, int pos)
{
        int count = 0;
        Node *cur = head;
        Node *prev = NULL;
        while (count != pos)
        {
                cur = cur->next;
                prev = cur;
                ++count;
        }

        if (cur != NULL)
        {
                prev->next = node;
                node->next = cur;
        }

        exit(0);
}

void clear_list(Node *head)
{
        Node *cur = head;
        while (cur != NULL)
        {
                cur = cur->next; /* code */
                free(head);
                head = cur;
        }
        head = NULL;
}

void get_list(Node *head)
{
        Node *cur = head;
        while (cur != NULL)
        {
                printf("%d\n=======", cur->data); /* code */
                cur = cur->next;
        }
}
int main(int argc, char *argv[])
{
        Node node4 = create_node(6, NULL);
        Node node3 = create_node(5, &node4);
        Node node2 = create_node(4, &node3);
        Node node1 = create_node(3, &node2);

        get_list(&node1);

        printf("data is %d", node1.next->next->data);

        return (0);
}