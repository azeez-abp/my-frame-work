<?php

declare(strict_types=1);
/*Recenly a journal (Sinha) presented an a lternative implcmenUHion of the doubly linked list /\OT, with insertion,
traversul and deletion operations. This implementation is based on pointer difference. Each node uses only one.;
pointer field lo traverse the list back and forth. /*
Bitwise operator (operation in bit [series of 0s,1s])
convert the nmber to binary 
perform logical operation on the number and convert the answer to decimal

256    128   64    32    16   8     4     2    1
2**8   2**7 2**6   2**5  2**4 2**3  2**2  2**1 2**0
max operation possible is 256 if you want more expand
67  = 001000011  =>64+2+1 =>(number that their vales are included are one and the rest is zero)
~(biwise compilment) ~a  = -a-1
negative of any number is done as follow

1 convert to binary
2 change 1 to 0 and 0 to 1
3 add one

a << y  mean shift a by  y bit 40 << 3 shift 40 by 3 bit  
the sign face the direction of shift
 << =>facing left is left shit
 >> => facing right is right shift
 basic principle => know the logic table for each operation
//echo 4 ^ 3."\n"; ^ why do we use bitwise operation
echo decbin(4) . "\n";
echo decbin(3) . "\n";
echo bindec(111) . "\n"
*/
class Node
{
    private  $data;
    private $pointerDiff;
    /**
     * ------------------------------
     *     pinter diff     | data         is  a node  
     * ------------------------------
     * 
     */

    public function __construct()
    {
        $this->data  = 0;
        $this->pointerDiff =  null;
        /*
        The ptrdif f of the start node (head node) is ^ NULL  and ptrdiff of the next to head and tail is NULL
          A->B->C->D
          In the example above,
            • The next pointer of A is: NULL ^ B
            • The next pointer of B is: A ^ C
            • The next pointer of C is: B ^ D
            • The next pointer of D 1s: C ^ NULL  because (prev ^ next)
            X ^ X = O exclusive or
            X ^ O = X Identity
            X ^ Y = Y ^ X (symmetric 1.e commutative)
            (X ^ Y) ^ Z = X ^ (Y ^ Z) (transitive  i.e associative) moving along 

            For the example above, let us assume that we are at C node and want to move to B. We know that C's ptrdif f is B ^ D (defined as B © D). If we want to move to B, performing © on C's ptrdiff with D would give B. This is due to the fact that (B ^ D) ^D  = B ^ (D ^ D)  = B because D ^ D = 0;
           
            (C^B)^C  =>moving backward
            (C^B)^B  =>moving forward
            Bug
Describes a divergence between required and actual behavior, and tracks the work done to correct the defect and verify the correction.
Epic
Epics help teams effectively manage and groom their product backlog
Feature
Tracks a feature that will be released with the product
Issue
Tracks an obstacle to progress.
Task
Tracks work that needs to be done.
Test Case
Server-side data for a set of steps to be tested.
Test Plan
Tracks test activities for a specific milestone or release.
Test Suite
Tracks test activites for a specific feature, requirement, or user story.
User Story
Tracks an activity the user will be able to perform with the product
        */
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
    public function setPointerDiff(Node |null $prev, Node|null $next)
    {
        $this->pointerDiff  =  $prev ^ $next;
    }

    public function getPointerDiff()
    {
        return $this->pointerDiff;
    }
}

class MemoizeDoublyLinkList
{

    private $head;
    private $tail;

    public function __construct()
    {
        $this->head   = null;
    }

    public function inseert($data)
    {

        $node   = new Node();
        $node->setData($data);

        $current  = $this->head;
        if ($this->head  === null) {
            $this->head  = $node;
        } else {
            $current  = $this->head;
            while ($current !==  null) {
                $current->setPointerDiff(null, $node);
                $current  = $current->getPointerDiff();
            }

            $this->head->setPointerDiff(null, $this->head);
        }
    }
}
$l   = new MemoizeDoublyLinkList();
$l->inseert(5);
$l->inseert(3);
var_dump($l);
