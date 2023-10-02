<?php
class BinaryNode
{
    public function __construct($data)
    {
        $this->left  = null;
        $this->data  = $data;
        $this->right  = null;
    }
}
/*
           3
          / \
         4   5 
        /\   /\
       6  7 8  9
      /\ 
    10  11
    preorder
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

function search($root, $target)
{
    if ($root === null) {
        return false;
    }
    if ($root !== null && $root->data === $target) {
        return true;
    }
    return  search($root->left, $target) || search($root->right, $target);
}


function searchIterative($root, $target)
{
    if ($root === null) {
        return false;
    }
    $queue  = [$root];
    $node  = null;
    $res  = [];
    while (!empty($queue)) {
        $node  = array_shift($queue);
        array_push($res, $node->data);
        if ($node->data === $target) {
            return true;
        }

        if ($node->left !== null) {
            array_push($queue, $node->left);
        }

        if ($node->right !== null) {
            array_push($queue, $node->right);
        }
        //return false;
    }
}

function findNumberOfNodeInATree($root)
{
    if ($root === null) {
        return 0;
    }
    return findNumberOfNodeInATree($root->left) + findNumberOfNodeInATree($root->right) + 1;
}


function findNumberOfNodeInATreeIterative($root)
{
    if ($root === null) {
        return 0;
    }
    $queue  = [$root];
    $node  = null;
    $res  = 1;

    while (!empty($queue)) {
        $node  = array_shift($queue);

        $res++;
        if ($node->left !== null) {
            array_push($queue, $node->left);
        }

        if ($node->right !== null) {
            array_push($queue, $node->right);
        }
        //return false;
    }
    return $res - 1;
}

function bsfRev($root)
{
    if ($root === null) {
        return [];
    }
    $queue  = [$root];
    $node  = null;
    $res  = [];
    while (!empty($queue)) {
        $node  = array_shift($queue);

        if ($node->left !== null) {
            array_push($queue, $node->left);
        }


        if ($node->right !== null) {
            array_push($queue, $node->right);
        }
        array_push($res, $node->data);

        //return false;
    }
    return $res;
}
print_r(bsfRev($root));
