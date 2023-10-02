<?php

class Node
{
    private $previous;
    private $data;
    private $next;
    /*
   ------------------------
    prev  |  data   |next      ==> A node (pointer itself is a node) The next of first is joied to previoues of second
   ------------------------
   previous means the node behind and next means the node ahead
 */

    ////field to set access modifier
    public function __construct()
    {
        $this->previous = null;
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

    public function setPrevious($prev)
    {
        $this->previous   = $prev;
    }
    public function getPrevious()
    {
        return $this->previous;
    }

    public function hasNext()
    {
        return $this->next !== null;
    }

    public function hasPrevious()
    {
        return $this->previous !== null;
    }
}

/*
The primary 1/i.rndv1mta9es of doubly linked lisls a rc:
• Each node requires an extra pointer, requiring more s pace.
• The inse rtion or deletion of a node takes a bit longer (more pointer opera Lions). 
*/


class DoublyLinkedList
{
    private $head; //access type defined in the field space
    private $tail;
    private $nodeData;
    public function __construct()
    {
        //assignment and declearation
        $this->head  = null;
        $this->tail  = null;
        $this->nodeData = [];
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
                $this->nodeData[$count - 1]  = $current->getData();
                // array_push($this->nodeData, $current->getData()); //print the all node
            }
            $current  =  $current->getNext();
        }

        return $this->nodeData;
    }

    public function addAtBegin($data)
    {

        $node  = new Node();
        $node->setData($data);
        if ($this->head === null) {
            $this->head  = $node;
            $this->tail  = $node;
            // $this->tail->setPrevious($this->head); //in a doubly linked list that tail always has previous
            // $this->tail->setNext(null);
            // $this->head->setNext($this->tail); // in a doubly linked list that head always has head
            // $this->head->setPrevious(null);  
            // if the code above is commented out you will create a cyclic doubly link list
            $this->lenght  = 1;
        } else {

            $node->setPrevious(null); //this will now be the first node; because no next node to ponint to them
            //previous pointer is from the node ahead
            //the next pointer is from the node itself
            $node->setNext($this->head); //will know that prev and next is node(this node is the head and now next node)  update the pointer
            ///set previous and next for the first node
            $this->head->setPrevious($node);

            $this->head  = $node;
            //$node->getNext()->setPrevious($this->head);
            /// set previous and next for the second node
            $this->lenght++;
        }
    }

    public function addAtEnd($data)
    {
        $node  = new Node();
        $node->setData($data);
        if ($this->head === null) {
            $this->head  = $this->tail = $node;
            // $this->tail  = $node;
            // $this->tail->setPrevious($this->head); //in a doubly linked list that tail always has previous
            // $this->tail->setNext(null);
            // $this->head->setNext($this->tail); // in a doubly linked list that head always has head
            // $this->head->setPrevious(null);
            // if the code above is commented out you will create a cyclic doubly link list
            $this->lenght  = 1;
        } else {

            $current = $this->head;
            $tailNode = null; //not yet known
            while ($current !== null) {
                // newNode.set_previous(None)
                // newNode.set_next(self.head)
                // self.hcad.set_previous(newNode)
                // self.head = newNode
                if ($current->getNext() == null) {
                    $tailNode  = $current; // the tail is the one with no next node
                }
                $current  = $current->getNext();
                // var_dump($current);
                // echo "yes";
                // exit;
            }
            if ($tailNode !== null) { // if we get the tail node
                $node->setNext(null);
                $tailNode->setNext($node); // it next is the node we want to add
                $node->setPrevious($tailNode); /// and the previous of the tail node is node we want to add
                $this->lenght  += 1;
            }
        }
    }

    public function addAtPostion($data, $position)
    {
        if ($position < 0) {
            return null;
        }
        if (($position  > $this->lenght)) {
            echo "off set end . postion $this->lenght is available";
            return null;
        }

        if ($position === 0) {
            return   $this->addAtBegin($data);
        }
        if ($position  === $this->lenght) {
            return   $this->addAtEnd($data);
        }
        $current  = $this->head;
        $count  = 0;
        $node  = new Node();
        $node->setData($data);
        $targetNode  = null;
        while ($current) {
            $count++;
            if ($position === $count) {
                $targetNode  = $current;
            }

            $current  =  $current->getNext($targetNode);
        }
        //get our target node
        if ($targetNode !== null) {
            $prevOfTargetNode  = $targetNode->getPrevious();
            $prevOfTargetNode->setNext($node);
            $targetNode->setPrevious($node);

            $node->setNext($targetNode);
            $node->setPrevious($prevOfTargetNode);

            $this->lenght += 1;
        }
    }

    public function deleteNode($data)
    {

        if ($this->head !== null && $this->head->getData() === $data) {
            $target  =  $this->head->getNext();
            $this->head  = $target;
            $target->setPrevious(null);
            $this->lenght -= 1;
            return true;
        }


        $current  = $this->head;
        $targetNode  = null;
        $c  = 0;
        while ($current !== null) {
            $c++;

            //   var_dump($current->getNext()->getNext()->getNext());
            if ($current->getData() === $data) { /////make sure that node is present

                if ($current->getNext() !== null) { ////
                    $current->getPrevious()->setNext($current->getNext());

                    $current->getNext()->setPrevious($current->getPrevious());
                    /*                          to be deleted
                      ----------------------   ---------------------  ----------------------
                       prev |data | next       prev |  data | next      prev |  data |next
                      -----------------------  ---------------------   --------------------
                    */

                    $this->lenght -= 1;
                } else { //is tail

                    $current->getPrevious()->setNext(null); //->setPrevious(null);

                }
            }

            $current  = $current->getNext();
        }
    }

    public function deleteAllNode()
    {

        $current  = $this->head;
        if ($current !== null) {
            //$current->setNext(null);
            $this->head  = null;
            $this->tail  = null;
            $this->lenght = 0;
            return true;
        }
    }
}
$l  = new DoublyLinkedList();
$l->addAtBegin(5);
$l->addAtBegin(15);
$l->addAtBegin(50);
$l->addAtBegin(25);
//$l->addAtBegin(74);
$l->addAtEnd(74);
$l->deleteAllNode();
$l->addAtPostion(77, 0);
$l->addAtPostion(89, 5);

//$l->deleteNode(77);
//$l->printNodes();
$l->deleteNode(74);
print_r($l->printNodes());
