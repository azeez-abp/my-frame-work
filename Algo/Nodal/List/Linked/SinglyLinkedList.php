<?php

/*
Basic Operations on a List
• Traversing the lisL
Inserting an item in Lhe list
• Deleting an item from the list
*/
class Node
{

    private $data;
    private $next;

    ////field to set access modifier
    public function __construct()
    {
        $this->data  = 0;
        $this->next  = null;
    }

    public function setData($data)
    {
        $this->data  = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setNext($next)
    {
        $this->next   = $next;
    }
    public function getNext()
    {
        return $this->next;
    }

    public function hasNext()
    {
        return $this->next !== null;
    }
}

/*
Traversing the Linked List
Let us assume that head points to the first node or the list. To transverse the list we do the following.
• follow the pointers.
• Display the contents of the nodes (or count) as they are traversed.
• Stop when the next pointer points to NULL.
*/

/*
Insertion into a singly-lmked list hus three cases:
• Inserting a new node before the head (at the beginning)
• Inserting a new node after the tail (at the end of the list)
• Inserting a new node al the middle of the list (nrndom locution)

Note: To insert an element in the linked list at  position p , assume that ufter inserting the element the
position of this new node is p. 

*/

/*
Singly Linked List Deletion
Similar to insertion, here we a lso have three cases.
• Deleting the first node
• Deleting the last node
• Deleting an intermediate node. 
*/
class SinglyLinkList
{

    private $head;
    private $lenght;

    public function __construct()
    {
        $this->head   = null; //to avoid zero;
        $this->lenght = 0;
        $this->nodeData = [];
    }
    public function getLen()
    {
        return $this->lenght;
    }
    public function listLengh()
    {
        $count  = 0;
        $current  = $this->head;
        // if($current ===null){
        // 	return $count;
        // } else{
        // 	$count = 1;
        while ($current !== null) {
            $count++;
            $current  = $current->getNext(); ///loop terninator
        }
        // } 
        return $count;
    }

    public function addAtBegin($data)
    {

        $node  = new Node();
        $node->setData($data);
        if ($this->head === null) {
            $this->head  = $node;
            $this->lenght  = 1;
        } else {
            $node->setNext($this->head); //update the pointer 
            $this->head  = $node;  // update the head
            $this->lenght++;
            //N->null
            //N($this->=$node)->(head pointer [this->next=head]) N->N->(next poiter)N---- ->Null 
            // $previus_head   = $this->head; //
            // $current  = $this->head;
            // $current->setNext($previus_head);
        }
    }

    public function addAtEnd($data)
    {

        $node  = new Node();
        $node->setData($data);
        if ($this->head === null) {
            $this->head  = $node;
        } else {
            ///
            $current  = $this->head;
            $tail  = null;
            while ($current !== null) {
                ///get current
                //look for next 
                // if the next of the current is null, that is tail
                // update the currentto next
                // set the new tail
                if ($current->getNext() === null) {
                    $tail   = $current;
                }
                $current = $current->getNext();
            }
            if ($tail !== null) {
                $tail->setNext($node);
                $this->lenght++;
            }
        }
    }

    public function insertAtPosition($position, $data)
    {
        ////check if the position does not exist
        if ($position < 0) {
            return null;
        } elseif ($position === 0) {
            $this->addAtBegin($data);
        } elseif ($position  == $this->lenght) {
            $this->addAtEnd($data);
        } else {
            $node  = new Node();
            $node->setData($data);

            $current  = $this->head;

            $count  = 0;
            while ($current !== null) {
                $count++;
                if (($count - 1) == $position) {
                    //   echo $current->getData() . "\n";
                    //switch the two pointer
                    $next_to_new_node  = $current->getNext();
                    $current->setNext($node);
                    $node->setNext($next_to_new_node);

                    // $current  = $node;
                }
                $current  = $current->getNext();
            }

            $this->lenght += 1;
        }
    }


    /*
     Deleting lhc First Node in Singly Linked List
      First node (current head node) is removed from the list. It can be done in two steps:
     • Create a temporary node which will point to the same node as that of head. 
     • Now, move the head nodes pointer to the next node and dispose of the tcmporw-y node.
    */
    public function deleteAllNode()
    {
        if ($this->head !== null) {
            $this->head->setNext(null);
            $this->head = null;
        }
    }
    public function deleteHeadNode()
    {
        if ($this->head !== null) {
            $this->head   = $this->head->getNext();
            $this->lenght -= 1;
        }
    }

    public function deleteTailNode()
    {
        if ($this->head !== null) {
            $current   = $this->head;
            $tail  = null;
            while ($current->getNext() !== null) {
                $tail  =   $current;
                $current = $current->getNext();
            }
            if ($tail !== null) {
                $tail->setNext(null);
                $this->lenght -= 1;
            }
        }
    }

    public function printNodes($type = 'a')
    {
        $count = 0;
        $current  = $this->head;
        while ($current !== null) {
            $count += 1;
            if ($type === 'e' && $count % 2 == 0) {
                array_push($this->nodeData, $current->getData());
            }
            if ($type === 'o' && $count % 2 != 0) {
                array_push($this->nodeData, $current->getData()); //print the odd node
            }
            if ($type === 'a') {
                array_push($this->nodeData, $current->getData()); //print the all node
            }
            $current  =  $current->getNext();
        }

        return $this->nodeData;
    }
    public function deleteNode($data)
    {
        if ($this->head !== null) {
            return null;
        }
        $current  = $this->head;
        $previous  = $this->head;
        ///pointer at the same position
        // if($current !== null && $current->getData() === $data)
        if ($this->head !== null && $current->getData() === $data) {
            $this->head  = null;
        } else {

            while ($current->getNext() !== null  && $current->getData() !== $data) { /// pointer now next to each ohter
                $previous  =  $current;
                $current  = $current->getNext();
                if ($current->getData() === $data) {
                    $node_to_current = $current->hasNext() ? $current->getNext() : null;
                    $previous->setNext($node_to_current);
                    $this->lenght += 1;
                }
            }
        }
    }
}
$l  = new SinglyLinkList();
$l->addAtBegin(2);
$l->addAtBegin(5);
$l->addAtBegin(15);
$l->addAtBegin(6);
$l->addAtEnd(67);
$l->addAtEnd(107);
$l->deleteHeadNode();
$l->deleteTailNode();
$l->deleteNode(6);
$l->insertAtPosition(2, 200);
print_r($l->printNodes('o'));
echo $l->listLengh() . "\n";
echo $l->getLen() . "\n";
//$l->deleteAllNode();
var_dump($l);

/*
Time Complexity: O(n), for scanning the ljst of size 11.
Space Complexity: O(1), for creating a temporary variable. 
Time Complexity: O(n), since, in the worst case, we may need to insert the node at the end of the list.
Space Complexity: O( 1), for creating one temporary variable.
*/