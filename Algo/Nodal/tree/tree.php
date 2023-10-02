<?php
//Recursion and traversion and composite(homogenous and heterogenous) data type
//A linked list is a dynamic data structure
//Abstract data type Stack queue tree
//General data structure types include arrays, files, linked lists, stacks, queues, tree, graph s a nd so on
/*Abstract Data Types (ADTs)
Before defining abstract data types, let us consider the different. view of system-defined data types. We a ll know
that, by default, all primitive data types (int, float, etc.) support. basic operations such as a ddition alld
subtraction. The system provides the impleme ntations for the primitive data types. For user-defined data types
we also need to defin e operations. The implementation for these operations can be done when we want to
actually use them. That means, in general, user defined data types a rc defined along with their o perations.
To simplify the process of solving problems, we com bine the data su-uctures with their operations and we call
this Abstract Data Types (ADTs). An ADT consists of two parts:
I. Declaration of data
2. Declaration of operations
Commonly used ADTs include: Linked Lists, Stacks, Queues, Priority Queues, Binary Trees, Dic tionaries,
Disjoint Sets (Union a nd Find), Hash Tables, Graphs, and many othe rs. For example, stack uses LIFO (Last-lnFirst-Out) mechanism while storing the data in dala structures. The last clement inserted into the stack is the
first clement that gets deleted. Common operaLions of it a rc: creating the stack, pushing an element onto the
stack, popping an e lement from stack, finding the current top of the stack, finding number of clements in the
stack, etc.



Asymtotic notation is syntax for representing the best, avarage and worse case of an algorithm
O(n) ; 0(n) ;omega(n)
Asymptotic notations are the mathematical notations used to describe the running time of an algorithm when the input tends towards a particular value or a limiting value.
Example Algorithms of Recursion
• Fibonacci Series, Factorial Finding
• Merge Sort, Quick Sort
• Binary Search
• Tree Traversals and many Tree Problems: lnOrder, PreOrder PostOrder
• Graph Traversals: DFS !Depth First Search! and BFS !Breadth First Search!
• Dynamic Programming Examples
• Divide and Conquer Algorithms
• Towers of Hanoi
• Backtracking Algorithms !we will discuss in next seclion] 
*/
class BinaryNode
{
  /*
    compostion of tree => node(value left right)
     -----------------------------------
      left(a node) |data|right(a node)          this is node 
     ----------------------------------
     structure of a node 

  */   
    public $value;    // contains the node item
    public $left;     // the left child BinaryNode
    public $right;     // the right child BinaryNode

    public function __construct($item)
    {
        $this->value = $item;
        // new nodes are leaf nodes
        $this->left = null;
        $this->right = null;
    }



    public function addNode($data)
    {
        $node  = new BinaryNode($data);

        if ($node->value < $this->value) {
            if ($this->left === null) {
                $this->left = $node;
            } else {
                $this->left->addNode($data);
            }
            
        } else {
            if ($this->right === null) {
                $this->right = $node;
            } else {
                $this->right->addNode($data);
            }
        }
    }

    public function visitNode()
    {
        $res  = null;
        if ($this->left !== null) {
            //  echo $this->left->value . "\n";
            $this->left->visitNode();
        }

        $res =  $this->value; /// this is the right place to call the value;
        //else it will note sorted
        echo $res . "\n";

        if ($this->right !== null) { // to avoid zero value
            // echo $this->right->value . "\n";
            $this->right->visitNode();
        }
    }

    public function search($data)
    {
        if ($this->value === $data) {
            echo "$data found";
        } elseif ($data < $this->value) {
            if ($this->left !== null) $this->left->search($data);
        } elseif ($data > $this->value) {
            if ($this->right !== null) $this->right->search($data);
        }
    }
}

class BinaryTree
{
    protected $root; // the root node of our tree

    public function __construct()
    {
        $this->root = null;
    }

    public function isEmpty()
    {
        return $this->root === null;
    }
    /*1. If the tree is empty, insert new_node as the root node (obviously!)
2. while (tree is NOT empty):
  2a. If (current_node is empty), insert it here and stop;
  2b. Else if (new_node > current_node), try inserting to the right
      of this node (and repeat Step 2)
  2c. Else if (new_node < current_node), try inserting to the left
      of this node (and repeat Step 2)
  2d. Else value is already in the tree*/
    public function addNode($data)
    {
        $node  = new BinaryNode($data);
        if ($this->root === null) {
            $this->root = $node;
        } else {
            $this->root->addNode($data);
        }
    }



    public function transverse()
    {
        if ($this->root !== null)
            $this->root->visitNode();
    }
    public function search($data)
    {
        if ($this->root !== null)
            $this->root->search($data);
    }


    // public function insert($item)
    // {
    //     $node = new BinaryNode($item);
    //     if ($this->isEmpty()) {
    //         // special case if tree is empty
    //         $this->root = $node;
    //     } else {
    //         // insert the node somewhere in the tree starting at the root
    //         $this->insertNode($node, $this->root);
    //     }
    // }


    // private function insertNode(BinaryNode $node, &$subtree /*The tree data*/)
    // {
    //     if ($subtree === null) {
    //         // insert node here if subtree is empty
    //         $subtree = $node;
    //     } else {
    //         ////conspare the value
    //         if ($node->value > $subtree->value) {
    //             // keep trying to insert right
    //             echo "Add to right is $node->value \n";
    //             $this->insertNode($node, $subtree->right);
    //         } elseif ($node->value < $subtree->value) {
    //             // keep trying to insert left
    //             echo "Add to left is $node->value \n";
    //             $this->insertNode($node, $subtree->left); //insert node to the left of the tree
    //         } else {
    //             // reject duplicates
    //         }
    //     }
    // }


    // public function __toString(): string
    // {
    //     $data  = "[ ";

    //     $cur  = $this->root;
    //     $data .= "Root-> $cur->value";
    //     $rNum = 0;
    //     $leftNum = 0;
    //     $n  = 0;
    //     while ($cur) {
    //         $n++;
    //         if ($cur->left) {
    //             $leftNum++;
    //             $cur  = $cur->left;
    //             $data .= " Left $leftNum is $cur->value";
    //         }

    //         if ($cur->right) {
    //             $rNum++;
    //             $cur  = $cur->right;
    //             $data .= " Right $rNum is $cur->value";
    //         }

    //         if ($n > 3) {
    //             $cur = null;
    //         }
    //     }

    //     return $data;
    // }
}

$t  = new BinaryTree();
// $t->insert(3);
// $t->insert(6);
// $t->insert(4);
// $t->insert(10);
$searh_val  = 0;
for ($i = 0; $i < 5; $i++) {
    $r  = random_int(20, 3000);
    $t->addNode(floor($r));
    $searh_val  = $r;
}
// $t->addNode(3);
// $t->addNode(2);
// $t->addNode(7);
// $t->addNode(9);
$t->addNode(8);
$t->transverse();
$t->transverse();
$t->search(8);
//var_dump($t);