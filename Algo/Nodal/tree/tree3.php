<?php
/*Generic trees are a collection of nodes where each node is a data structure that consists of records and a list of references to its children(duplicate references are not allowed). Unlike the linked list, each node stores the address of multiple nodes. Every node stores address of its children and the very first node’s address will be stored in a separate pointer called root.

The Generic trees are the N-ary trees which have the following properties: 

            1. Many children at every node.

            2. The number of nodes for each node is not known in advance.*/
class GenericTree
{

    public function __construct($parent, $value = null)
    {
        $this->parent  = $parent;
        $this->value    = $value;
        $this->childList   = [];
        if ($parent === null) {
            $this->birthOrder  = 0;
        } else {
            $this->birthOrder   = count($parent->childList);
            array_push($this->childList, $this);
        }
    }
    public function nChildren()
    {
        return $this->childList;
    }
    public function nthChildren($postion)
    {
        return $this->childList[$postion];
    }

    public function fullPath()
    {
        $result = [];
        $parent = $this->parent;
        $kid = $this;
        while ($parent) {
            $result[0]  = $kid->birthOrder;
            list($parent, $kid) = [$parent->parent, $parent];
        }


        return $result;
    }
}



function isBST($root)
{

    if ($root === null) {
        return 1;
    }

    if ($root->left !== null && $root->left->data < $root->data) {
        return 0;
    }

    if ($root->right !== null && $root->right->data  < $root->data) {
        return 0;
    }

    if (!isBST($root->left) || !isBST($root->left)) {
        return 0;
    }
    return true;
}

class BinaryNode
{
    public function __construct($data)
    {
        $this->left  = null;
        $this->data  = $data;
        $this->right  = null;
    }
}

function dfs($rootOfTree)
{
    $root = null;
    $s  = [$rootOfTree];
    $res  = [];

    while (!empty($s)) {
        $root  =  array_pop($s);
        array_push($res, $root->data);
        if ($root->right !== null) {
            array_push($s, $root->right);
        }

        if ($root->left !== null) {
            array_push($s, $root->left);
        }
    }
    return $res;
}

function dfs2($root)
{
    /*
           3
          / \
         4   5 
        /\   /\
       6  7 8  9
      /\ 
    10  11

    go from 3 to 10 =>left call //when left is null change to rigth
    go to 11 =>//look for right untill null// return out put// check call stack if is not empty 
    continue with right // the right is null //check the stack and pick it root and continue with left
    ///continue with cycle untill the stack is empty and root is null
    
*/
    /*
    [0] => 3
    [1] => 4
    [2] => 6
    [3] => 10
    [4] => 11
    [5] => 7
    [6] => 5
    [7] => 8
    [8] => 9
/////////////////////////////
    [0] => 10
    [1] => 6
    [2] => 11
    [3] => 4
    [4] => 7
    [5] => 3
    [6] => 8
    [7] => 5
    [8] => 9

    ////////////////////

    [0] => 10
    [1] => 11
    [2] => 6
    [3] => 7
    [4] => 4
    [5] => 8
    [6] => 9
    [7] => 5
    [8] => 3
    */
    if ($root === null) {
        return [];
    }
    static $res  = [];
    array_push($res, $root->data);
    dfs2($root->left);
    dfs2($root->right);

    return  $res;
}

function dfs2_find($root, $target)
{

    if ($root !== null && $root->data === $target) {
        return true;
    }
    if ($root === null) {
        return false;
    }
    return dfs2_find($root->left, $target) || dfs2_find($root->right, $target);
}

function bfs($rootOfTree)
{
    $root = null;
    $s  = [$rootOfTree];
    $res  = [];

    while (!empty($s)) {
        $root  =  array_shift($s);
        array_push($res, $root->data);


        if ($root->left !== null) {
            array_push($s, $root->left);
        }

        if ($root->right !== null) {
            array_push($s, $root->right);
        }
    }
    return $res;
}

function bfs_find($rootOfTree, $target)
{
    $root = null;
    $s  = [$rootOfTree];
    $res  = [];

    while (!empty($s)) {
        $root  =  array_shift($s);

        if ($root->data === $target) {
            return true;
        }
        array_push($res, $root->data);


        if ($root->left !== null) {
            array_push($s, $root->left);
        }

        if ($root->right !== null) {
            array_push($s, $root->right);
        }
    }
    return false;
}


function bfs_get($rootOfTree, $data)
{
    /*
       1
      / \
    2    3
   /\    /\  
  4  5  6  7
  */
}
////////////////////////
/*
           3
          / \
         4   5 
        /\   /\
       6  7 8  9
      /\ 
    10  11
*/
$root  = new BinaryNode(3);
$root->left  =  new BinaryNode(4);
$root->right  = new BinaryNode(5);
$root->left->left  =  new BinaryNode(6);
$root->left->right  =  new BinaryNode(7);
$root->right->left  =  new BinaryNode(8);
$root->right->right  =  new BinaryNode(9);
$root->left->left->left  =  new BinaryNode(10);
$root->left->left->right  =  new BinaryNode(11);
//print_r(bfs_find($root, 9));
print_r(dfs2_find($root, 3));
//var_dump($root->left->left->right->data);
/*
           3
          / \
         4   5 
        /\   /\
       6  7 8  9
      /\ 
    10  11
*/
//echo isBST($root);

/*
       1
      / \
    2    3
   /\    /\  
  4  5  6  7
*/
$root2  = new BinaryNode(1);
bfs_get($root2, 2);
bfs_get($root2, 70);
// bfs_get($root2, 4);
// bfs_get($root2, 5);
// bfs_get($root2, 6);
//var_dump($root2->right->data);
