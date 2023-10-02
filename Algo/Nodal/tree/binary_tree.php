<?php
/*
A tree is a data structure similar to a linked LisL but instead of each node poinling simply to Lhe next node in a
linear fashion, each node points to a number of nodes. Tree is an example of non-linear data structurcs.is a way of representing the hierarchical nature of a structure in a graphical form. 
*/

  /*
     compostion of tree 
     1. node(value left right)
     -----------------------------------
      left(a node) |data|right(a node)     this is node 
     ----------------------------------

     2. Edge = link

   =>  The depth of a node is the length of the path from the root to the node (root to the node upward )
   =>  The height of a node is the length of the path from that node to the deepest node (from the node down downward)
   =>  The height of a tree is the length of the path from the root to the deepest node in the t ree
  => The size of a node is the number of descendants it has including itself
     
  => If every node in a tree has only one child (except leaf nodes) then we call such trees skew trees. 
  =>  If every node has only left child then we call them left skew trees. Similarly, if every node has only right child then we call them right skew trees.

                            Left Skew
							   --------
							   | root |
							   --------
                              /
                             /
                            \/
					  --------
				      |      |
				      --------

		              /
                     /
                    \/
			  --------
		      |      |
		      --------            Right skew                                           
							   --------
							   | root |
							   --------
		                            \
		                             \
		                             \/
								  --------
							      |      |
							      --------
                                       \
		                                \
		                                \/
									  --------
								      |      |
								      --------


Binary tree has a maximum child node  of two

types of binary tree
  Strict Binary Tree: A binary tree is called strict binary tree if each node has exactly two children or no children.

  Full Binary Tree: A binary tree is called full binary tree if each nod ehas exactly two children and leaf nodes are at the same level. 

Basic Operations
• Inserting an element into a tree
• Deleting an element from a tree
• Searching for an element
• Traversing the tree

Auxiliary Operations
• Finding the size of the tree
• Finding the height of the tree
• finding the level which has maximum sum
• finding the least common ancestor (LCA) for a given pair of nodes, and many more. 

The process of visiting a ll nodes of a tree is called tree traversal.

Based on the above definition there are 6 possibilities:
I. LDR: Process left subtree, process the current node data and then process right subtree
2. LRD: Process left subtree, process right subtree and then process the current node data
3. DLR: Process the current node data, process left subtree and then process right subtree
4. DRL.: Process the current node data, process right subtree a nd then process left subtree
5. RDL: Process right subtree, process the current node data and then process le ft subtree
6. RLD: Process right subtree, process left subtree and then process the current node data 

Classifying the Traversals 
• Preorder  (DLR) Traversal //123
• lnorder   (LDR) Traversal //213
• Postorder (LRD) Traversal //231


Level Order Traversal
Level order traversal is def med as follows:
• Visit the root.
• While traversing level l, keep all the elements at level l + 1 in queue.
• Go to the next level and visit a ll the nodes al that level.
• Repeat this until a ll levels arc completed. 
baisc of recursion
function(int n, tree t) {
// terminating condition and return
.
// procedure details
.
return function(n-1, t2)
}

insert(v,bst) {
if ( isEmpty(bst) )
return MakeTree(v, EmptyTree, EmptyTree)
elseif ( v < root(bst) )
return MakeTree(root(bst), insert(v,left(bst)), right(bst))
elseif ( v > root(bst) )
return MakeTree(root(bst), left(bst), insert(v,right(bst)))///continue to call external function
else error(‘Error: violated assumption in procedure insert.’)
}


allsmaller(tree t, value v) {
if ( isEmpty(t) )
return true
else
return ( (root(t) < v) and allsmaller(left(t),v)
and allsmaller(right(t),v) )
}

allbigger(tree t, value v) {
if ( isEmpty(t) )
return true
else
return ( (root(t) > v) and allbigger(left(t),v)
and allbigger(right(t),v) )
}


isbst(tree t) {
if ( isEmpty(t) )
return true
else
return ( allsmaller(left(t),root(t)) and isbst(left(t)) and allbigger(right(t),root(t)) and isbst(right(t)) )
}

  */ 




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

    public function visitNodePre()
    {
        $res  = null;
        static $res_a  = [];
        array_push($res_a,  $this->value);  //array_push($res_a,  $this->value);
        if ($this->left !== null) {
            $this->left->visitNodePre();
        }

        //  $res = ; /// this is the right place to call the value;
        //else it will note sorted
        //  array_push($res_a, $res);
        //echo $res . "\n";
        //  array_push($res_a,  $this->value);
        if ($this->right !== null) { // to avoid zero value
            // echo $this->right->value . "\n";
            $this->right->visitNodePre();
        }


        return $res_a;
    }


    public function visitNodeIn()
    {
        $res  = null;
        static $res_a  = [];

        if ($this->left !== null) {
            $this->left->visitNodeIn();
        }
        array_push($res_a,  $this->value);
        if ($this->right !== null) { // to avoid zero value
            $this->right->visitNodeIn();
        }


        return $res_a;
    }


    public function visitNodePost()
    {
        $res  = null;
        static $res_a  = [];

        if ($this->left !== null) {
            $this->left->visitNodePost();
        }

        if ($this->right !== null) { // to avoid zero value
            $this->right->visitNodePost();
        }
        array_push($res_a,  $this->value);


        return $res_a;
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



    public function transversePreOrder()
    { //DLR
        if ($this->root !== null)
            return $this->root->visitNodePre();
    }

    public function transverseInOrder()
    { //LDR
        if ($this->root !== null)
            return $this->root->visitNodeIn();
    }

    public function transversePostOrder()
    { //LRD
        if ($this->root !== null)
            return $this->root->visitNodePost();
    }

    public function search($data)
    {
        if ($this->root !== null)
            $this->root->search($data);
    }



  
}

$t  = new BinaryTree();
// $t->insert(3);
// $t->insert(6);
// $t->insert(4);
// $t->insert(10);
$searh_val  = 0;
// for ($i = 0; $i < 5; $i++) {
//     $r  = random_int(20, 3000);
//     $t->addNode(floor($r));
//     $searh_val  = $r;
// }
$t->addNode(1);
$t->addNode(2);
$t->addNode(3);
$t->addNode(4);
$t->addNode(8);
$t->search(8);

print_r($t->transversePreOrder());
print_r($t->transverseInOrder());
print_r($t->transversePostOrder());
//var_dump($t);



function alternateTree(){
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

    public function __construct($data)
    {
        $this->value = $data;
        $this->left = null;
        $this->data  = $this->value;
        // new nodes are leaf nodes
        $this->right = null;
    }



    public function addNode($data, $node)
    {


        if ($node->value < $this->value) {
            if ($this->left === null) {
                $this->left = $node;
            } else {
                $this->left->addNode($data, $node);
            }
        } else {
            if ($this->right === null) {
                $this->right = $node;
            } else {
                $this->right->addNode($data, $node);
            }
        }
    }

    public function visitNodePre()
    {
        $res  = null;
        static $res_a  = [];
        array_push($res_a,  $this->value);  //array_push($res_a,  $this->value);
        if ($this->left !== null) {
            $this->left->visitNodePre();
        }

        //  $res = ; /// this is the right place to call the value;
        //else it will note sorted
        //  array_push($res_a, $res);
        //echo $res . "\n";
        //  array_push($res_a,  $this->value);
        if ($this->right !== null) { // to avoid zero value
            // echo $this->right->value . "\n";
            $this->right->visitNodePre();
        }


        return $res_a;
    }


    public function visitNodeIn()
    {
        $res  = null;
        static $res_a  = [];

        if ($this->left !== null) {
            $this->left->visitNodeIn();
        }
        array_push($res_a,  $this->value);
        if ($this->right !== null) { // to avoid zero value
            $this->right->visitNodeIn();
        }


        return $res_a;
    }


    public function visitNodePost()
    {
        $res  = null;
        static $res_a  = [];

        if ($this->left !== null) {
            $this->left->visitNodePost();
        }

        if ($this->right !== null) { // to avoid zero value
            $this->right->visitNodePost();
        }
        array_push($res_a,  $this->value);


        return $res_a;
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
    //  protected $root; // the root node of our tree

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
            $this->root->addNode($data, $node);
        }
    }



    public function transversePreOrder()
    { //DLR
        if ($this->root !== null)
            return $this->root->visitNodePre();
    }

    public function transverseInOrder()
    { //LDR
        if ($this->root !== null)
            return $this->root->visitNodeIn();
    }

    public function transversePostOrder()
    { //LRD
        if ($this->root !== null)
            return $this->root->visitNodePost();
    }

    public function search($data)
    {
        if ($this->root !== null)
            $this->root->search($data);
    }


    public function printTreeData($root, $type = 1)
    {
        static $data  = [];

        if ($root !== null) {

            if ($type  === 1)  array_push($data, $root->data);
            if ($root->left !== null) {
                $this->printTreeData($root->left);
            }
            if ($type  === 2)  array_push($data, $root->data);
            if ($root->right !== null) {
                $this->printTreeData($root->right);
            }
            if ($type  === 3)  array_push($data, $root->data);
        }
        return $data;
    }
}

$t  = new BinaryTree();
// $t->insert(3);
// $t->insert(6);
// $t->insert(4);
// $t->insert(10);
$searh_val  = 0;
// for ($i = 0; $i < 5; $i++) {
//     $r  = random_int(20, 3000);
//     $t->addNode(floor($r));
//     $searh_val  = $r;
// }

$t->addNode(1);
$t->addNode(-1);
$t->addNode(3);
$t->addNode(4);
$t->addNode(8);
$t->addNode(6);
$t->addNode(9);
$t->addNode(10);
$t->addNode(7);

//print_r($t->printTreeData($t->root, 3));
// echo $t->root->data;
//echo $t->root->right->right->right->right->right->data;
//echo $t->root->left->data;
//$t->search(8);
// var_dump($t->root->right->right->right);
// var_dump($t->root->left);
//print_r($t->transversePreOrder());
//print_r($t->transverseInOrder());
//print_r($t->transversePostOrder());

}