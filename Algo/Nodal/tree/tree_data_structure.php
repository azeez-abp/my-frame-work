<?php

/*
/\ heap is a tree with some special properties. The basic requirement of a heap is that the value of a node must
be >= (or <=) than the values of its children.  A heap also has the additional property  that all leaves should be at It or It h - 1 levels
(avl) (where h is the height of the tree)
for some h > 0
(complete binary trees). That means heap should form u complete binary tree (as shown below).

Types of Heaps?
• Min heap: The value of a node must be less than or equal to t he values of its children (the root has the lowerst value )
                                     11
                                    / \
                                   15  12
                                  /\   /\
                                 16 1714 13 
Max heap: The value of a node must be greater thnn or equal to the va lues of ils children (root is the gratest value)
                                     17
                                    / \
                                   15  6
                                  /\   /\
                                 1  4  4 3 
                                 [17,15,6,1,4,4,3] bfs  () 
                                0=>17 children position 1,2  0*2+1 => 1 first childe position
                                1=>15 children position 3,4  1*2+1 => 3
                                2=>6 children position 5,6   2*2 +1=> 5
 Binary Heaps 
In binary heap each node may have up to two children. In practice, binary heaps a re enough a nd we concentrate
on binary min heaps and binary max heaps for the remaining discussion. 


For a node at i-th location, its parent is at (i-th - 1) / 2 location 
 
For a node at i-th location, its children is at (i-th + 1) * 2  and (i-th + 2) * 2 location    
the range of leave is between ith/2  to ith -1  (1,4,4,3)
 


Binary Heap
Time Complexity of building a heap
Applications of Heap Data Structure
Binomial Heap
Fibonacci Heap
Leftist Heap
K-ary Heap
Heap Sort
Iterative Heap Sort
K’th Largest Element in an array
K’th Smallest/Largest Element in Unsorted Array | Set 1
Sort an almost sorted array/
Tournament Tree (Winner Tree) and Binary Heap
Check if a given Binary Tree is Heap
How to check if a given array represents a Binary Heap?
Connect n ropes with minimum cost
Design an efficient data structure for given operations
Merge k sorted arrays | Set 1
Merge Sort Tree for Range Order Statistics
Sort numbers stored on different machines
Smallest Derangement of Sequence
Largest Derangement of a Sequence
K maximum sum combinations from two arrays
Maximum distinct elements after removing k elements
Maximum difference between two subsets of m elements
Height of a complete binary tree (or Heap) with N nodes
Heap Sort for decreasing order using min heap
Print all nodes less than a value x in a Min Heap.
Median of Stream of Running Integers using STL
Largest triplet product in a stream
Find k numbers with most occurrences in the given array
Convert BST to Min Heap
Merge two binary Max Heaps
K-th Largest Sum Contiguous Subarray
Minimum product of k integers in an array of positive Integers
Leaf starting point in a Binary Heap data structure
Why is Binary Heap Preferred over BST for Priority Queue?
Convert min Heap to max Heap
Given level order traversal of a Binary Tree, check if the Tree is a Min-Heap
Rearrange characters in a string such that no two adjacent are same
Implementation of Binomial Heap
Array Representation Of Binary Heap
Sum of all elements between k1’th and k2’th smallest elements
Minimum sum of two numbers formed from digits of an array
K’th largest element in a stream
k largest(or smallest) elements in an array | added Min Heap method
Median in a stream of integers (running integers)
Sort a nearly sorted (or K sorted) array



After inserting un clemen t into heap, it may not satisfy the heap property. In that case we need to adjust the
localions or the heap to make it heap again. This process is called heapifyng(compare the parent with right and left child recursely ) done through percolate (up or down)
*/
class BinaryNode
{
    public function __construct($data)
    {
        $this->left  = null;
        $this->data  = $data ? $data : 'null';
        $this->right  = null;
    }
}

$root  = new BinaryNode(3);
$root->left  =  new BinaryNode(4);
$root->right  = new BinaryNode(5);
$root->left->left  =  new BinaryNode(6);
$root->left->right  =  new BinaryNode(7);
$root->right->left  =  new BinaryNode(8);
$root->right->right  =  new BinaryNode(9);
$root->left->left->left  =  new BinaryNode(10);
$root->left->left->right  =  new BinaryNode(11);


function build2($arr)
{
    ///through bsf


    $root  = new BinaryNode(array_shift($arr));
    $q  = [$root];

    while (!empty($arr)) {
        $data    = $arr[0];
        $node_l  = new BinaryNode(array_shift($arr));
        $node_r  = new BinaryNode(array_shift($arr));

        $parent   = array_shift($q);

        $parent->left   = $node_l;
        $parent->right  = $node_r;

        array_push($q, $node_l);
        array_push($q, $node_r);
    }

    return $root;
}

function deleteNode($root, $data)
{
    $res = [];
    foreach (levelOrder($root) as $ele) {
        if ($ele !== $data) {
            array_push($res, $ele);
        }
    }
    $root  = build2($res);
    //print_r($root);
    return $root;
}

function deleteNode2($root)
{
    ///find the deepeat node


}
class Tree
{
    public function __construct()
    {
        $this->root  = null;
    }

    function insert($data)
    {
        $this->insert_($this->root, $data);
    }

    private function insert_(&$root, $data): BinaryNode
    {

        if ($root === null) {
            $root   =  new BinaryNode($data);
            return $root;
        }

        if ($data < $root->data) {
            $root->left  = $this->insert_($root->left, $data);
        } else  if ($data > $root->data) {
            $root->right  = $this->insert_($root->right, $data);
        }
        return $root;
    }

    function findMinMax($root = null)
    {
        $root_ = $root === null ? $this->root : $root;
        return  $this->minMaxValue_($root_);
    }

    private function minMaxValue_(&$root)
    {  // if & is not with $root it wont work
        ///you need a function that will be call to pass the root from the call 
        // and the root must be referenctial augumet
        if ($root === null) {
            return null;
        }
        $q  = [$root];
        $min   = $root->data;
        $max   = $root->data;
        $minNode   = $root;
        $maxNode  = $root;
        while (!empty($q)) {
            $currrent_node   = array_shift($q);
            if ($min < $currrent_node->data) {
                $min  = $currrent_node->data;
                $minNode  = $currrent_node;
            }

            if ($max > $currrent_node->data) {
                $max  = $currrent_node->data;
                $maxNode  = $currrent_node;
            }

            if ($currrent_node->left !== null) {
                array_push($q, $currrent_node->left);
            }

            if ($currrent_node->right !== null) {
                array_push($q, $currrent_node->right);
            }
        }

        // print_r([$min, $max, $minNode, $maxNode]);

        return [$min, $max, $minNode, $maxNode];
    }

    function deleteNode($data)
    {
        return $this->deleteNode_($this->root, $data);
    }

    private function deleteNode_(&$root, $data)
    {
        if ($root === null) {
            return $root;
        }
        // $node  = null;
        // Recursive calls for ancestors (parent) of
        // node to be deleted
        // if ($root->data  === $data) {
        //     $node   = $root;
        //     echo "Deleting $node->data";
        // }

        else if ($data < $root->data) {
            $root->left  =   $this->deleteNode_($root->left, $data);
        } else if ($data > $root->data) {
            $root->right  =   $this->deleteNode_($root->right, $data);
            //$root is the root value
        } else {
            if ($root->left === null && $root->right === null) { ///case 1 is leave node
                unset($root);
                $root   = null;
            } elseif ($root->left === null && $root->right !== null) { ///case 2 has skew right
                $temp  = $root;
                $root  = $root->right;
                unset($temp);
            } elseif ($root->right === null && $root->left !== null) { ///case 2 has skew left
                $temp  = $root;
                $root  = $root->left;
                unset($temp);
            } elseif ($root->right !== null && $root->left !== null) { ///case 2 full Node
                $temp  = $this->findMinMax($root->right)[2]; //find the smallest node along the right path
                $root->data  = $temp->data;  ////copy data from minNode from right path to root
                $root->right  = $this->deleteNode_($root->right, $temp->data); //it will now delete the minnode(leave) along right
                // delete the node that we copy it value so that there wont be duplicate
            }
        }
        return $root;
    }




    public function build2($arr)
    {
        ///through bsf
        $q  = [];

        while (!empty($arr)) {
            $data    = $arr[0];
            $node  = new BinaryNode($data);
            if ($this->root  == null) {
                $this->root  = $node;
                array_shift($arr);
                array_push($q, $node);
            } else {
                $root  = array_shift($q);
                if ($root->left === null) {
                    $root->left  = $node;
                    array_shift($arr);
                    if ($root->right === null) {
                        array_unshift($q, $root); //make it the first element
                    } else {
                        array_push($q, $root->left);
                    }
                } else if ($root->right === null) {
                    $root->right  = $node;
                    array_shift($arr);
                    array_push($q, $root->left);
                    array_push($q, $root->right);
                }
            }
        }
    }


    public function transversal($type = 'pre')
    {
        return  $this->transversal_($this->root, $type);
    }
    private function transversal_(&$root, $type="pre")
    {
        static  $res  = [];
        if ($root === null) {
            return [];
        }
        if ($type == 'pre') array_push($res, $root->data);
        $this->transversal_($root->left, $type);
        if ($type == 'in') array_push($res, $root->data);
        $this->transversal_($root->right, $type);
        if ($type == 'post') array_push($res, $root->data);

        return $res;
    }

    function search($data)
    {
        return $this->search_($this->root, $data);
    }

    private function search_(&$root, $target)
    {
        if ($root === null) {
            return false;
        }

        if ($target  === $root->data) {

            return true;
        }

        return  $this->search_($root->left, $target) || $this->search_($root->right, $target);
    }

    function diameter($root = null)
    {
        $root_  = $root === null ? $this->root : $root;
        $ptr  = 0;
        //$ptr == diameter of the tree
        $this->diameterOfTree_($root_, $ptr);
        return $ptr;
    }
    private function diameterOfTree_(&$root,&$ptr)
    {
        //Solution: To find the diameter of a tree, first calculate the diameter of left subtree and right subtrees
        //recursively. Among these two va lues, we need to send maximum value along with current level (+1).
    
        if ($root === null) {
            return 0;
        }
        $left = $this->diameterOfTree_($root->left,$ptr);
        $right = $this->diameterOfTree_($root->right,$ptr);
        $ptr  = max($ptr,$left+$right);
        return max($left, $right) + 1;
    }


    function printChildAllEachLevel($root = null)
    {
        $root_  = $root === null ? $this->root : $root;

        return  $this->zigzagHorizontallyTransverse($root_);
    }
    private function zigzagHorizontallyTransverse(&$root)
    {

        $res   = [];
        $currentLevel  = [];

        if ($root !== null) {
            array_push($currentLevel, $root);
            $letfToRight  = true;
            while (!empty($currentLevel)) {
                $levelresult = [];
                $nextLevel = [];
                //////////////////////////////////for every horizontal level
                while (!empty($currentLevel)) {
                    $node  = array_pop($currentLevel);
                    array_push($levelresult, $node->data);
                    ///////////////////////////////////////
                    if ($letfToRight) {
                        if ($node->left !== null) {
                            array_push($nextLevel, $node->left);
                        }
                        if ($node->right !== null) {

                            array_push($nextLevel, $node->right);
                         }
                    } else {

                        if ($node->right !== null) {
                            array_push($nextLevel, $node->right);
                        }

                        if ($node->left !== null) {
                            array_push($nextLevel, $node->left);
                        }
                    }
                    ///// ///////////////////////
                }
                $currentLevel  = $nextLevel;
                array_push($res,  $levelresult);
                $letfToRight != $letfToRight;
            }
            return $res;
        }



        //  $p = zigzagHorizontallyTransverse($root->left, 'left') . zigzagHorizontallyTransverse($root->right, 'right') . $root->data;
        return 0;
    }

    function getPathToLeaveNode($root = null)
    {
        $root_  = $root === null ? $this->root : $root;
        $path  = [];
        return  $this->printPathsToLeaveNode($root_, $path, 0);
    }

    private  function printPathsToLeaveNode(&$node, &$path, $pathLen)
    {
        if ($node == null)
            return;

        /* append this node to the path array */
        $path[$pathLen] = $node->data;
        $pathLen++;
        static $old_max_path  = -INF;
        static $old_min_path  = INF;
        static $paths  = [];
        static $pathInfo  = [];
        /* it's a leaf, so print the path that lead to here */
        if ($node->left == null && $node->right == null) {
            array_push($paths, $path);
            $new_max_path  = array_reduce($path, function ($accu, $val) {
                return $accu + $val;
            });
            if ($old_max_path < $new_max_path) {
                $old_max_path  = $new_max_path;
                $pathInfo['max_sum']  =  $old_max_path;
                $pathInfo['max_path_index']  =  count($paths) - 1;
                $pathInfo['max_path_arr']  = $path;
            }
            if ($old_min_path > $new_max_path) {
                $old_min_path  = $new_max_path;
                $pathInfo['min_sum']  =  $old_max_path;
                $pathInfo['min_path_index']  =  count($paths) - 1;
                $pathInfo['min_path_arr']  = $path;
            }

            // print_r($path); ///you only print the paths when you get to leave
            /// this is where we manipulate max path and mean path
        } else {
            /* otherwise try both subtrees */
            $this->printPathsToLeaveNode($node->left, $path, $pathLen);
            $this->printPathsToLeaveNode($node->right, $path, $pathLen);
        }

        return [$paths, $pathInfo];
    }

    public function getAncestor($data, $root = null)
    {
        $root_  = $root === null ? $this->root : $root;

        return $this->printAncesstor($root_, $data);
    }
    public function printAncesstor(&$root, $data)
    {
        if ($root === null) {
            return false;
        }
        static $ancsetor  = [];
        //  var_dump($root);
        if (
            // $root->left === $node
            // || $root->right === $node
            //  || 
            $this->printAncesstor($root->left, $data)
            || $this->printAncesstor($root->right, $data)
        ) {
            echo  $root->data;
            array_push($ancsetor, $root->data);
        }


        return [$ancsetor];
    }

    public function isIsomorph($root1, $root2, $type = 'iso')
    {
        return $this->isIsomorphTrees($root1, $root2, $type);
    }
    private function isIsomorphTrees(&$tree_root_1, &$tree_root_2, $type = 'iso')
    {
        if ($tree_root_1 === null && $tree_root_2 === null) {
            return true;
        }

        if (($tree_root_1 !== null && $tree_root_2 === null)  ||  ($tree_root_1 == null && $tree_root_2 !== null)) {
            return false;
        }

        if ($type === 'iso') {
            return ($this->isIsomorphTrees($tree_root_1->left, $tree_root_2->left)//l-l r-r
                &&
                $this->isIsomorphTrees($tree_root_1->right, $tree_root_2->right)
            );
        }

        ////////////////////////////////
        //  echo $type;
        if ($type === 'quasi-iso') {
            return (($this->isIsomorphTrees($tree_root_1->left, $tree_root_2->left) //l-l
                &&
                $this->isIsomorphTrees($tree_root_1->left, $tree_root_2->right)) //l-r

                ||
                ($this->isIsomorphTrees($tree_root_1->right, $tree_root_2->left) // r-l
                    &&
                    $this->isIsomorphTrees($tree_root_1->right, $tree_root_2->right)) //r-r
            );
        }

        ///////////////////////////////

    }
}

$t  = new Tree();

//$d  = [20, 30, 40, 50, 60, 70, 80];
//$t2->build2($d);
echo "====================================\n";

//echo $t->search(40);
$t->insert(50);
$t->insert(30);
$t->insert(20);
$t->insert(40);
$t->insert(70);
$t->insert(60);
$t->insert(80);

//var_dump($t->deleteNode(30)->data);
echo "====================================";
$t2  = new Tree();
$t2->insert(50);
$t2->insert(30);
$t2->insert(20);
$t2->insert(40);
$t2->insert(70);
$t2->insert(60);
$t2->insert(80);
print_r($t->isIsomorph($t->root, $t2->root, 'iso'));