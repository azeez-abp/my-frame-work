<?php

use function Pest\Laravel\delete;

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

function dept($root)
{
    if ($root === null) {
        return 0;
    }
    return max(dept($root->left), dept($root->right)) + 1;
}

function deptIterative($root)
{
    if ($root === null) {
        return 0;
    }

    $queue  = [[$root, 1]]; //dept is 1 when root is present
    $temp  = 0;
    while (!empty($queue)) {
        list($node, $dept)  = array_pop($queue);
        if ($node->left !== null) {
            array_push($queue, [$node->left, $dept + 1]);
        }
        if ($node->right !== null) {
            array_push($queue, [$node->right, $dept + 1]);
        }
    }
    return $dept;
}
echo deptIterative($root);
