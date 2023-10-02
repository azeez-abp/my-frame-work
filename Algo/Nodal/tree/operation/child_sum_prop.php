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
//$root->left->left->right->right  =  new BinaryNode(12);
//haspath
//// this is a concept that use both line and level
//// Left and right view use level (bfs) x-axis
//// Top and botton view use line (dfs) y-axi
$root2  = new BinaryNode(-10);
$root2->left  = new BinaryNode(9);
$root2->right  = new BinaryNode(20);
$root2->right->left  = new BinaryNode(15);
$root2->right->right  = new BinaryNode(7);

$root3 =  new BinaryNode(1);
$root3->left =  new BinaryNode(2);
$root3->right =  new BinaryNode(3);

$root4 =  new BinaryNode(-3);

$root5 =  new BinaryNode(1);
$root5->left =  new BinaryNode(3);
$root5->left->left =  new BinaryNode(5);
$root5->left->right =  new BinaryNode(3);
$root5->right =  new BinaryNode(2);
$root5->right->right =  new BinaryNode(9);


$root6 =  new BinaryNode(1);
$root6->left =  new BinaryNode(3);
$root6->left->left =  new BinaryNode(5);
$root6->left->left->left =  new BinaryNode(6);

$root6->right =  new BinaryNode(2);
$root6->right->right =  new BinaryNode(9);
$root6->right->right->left =  new BinaryNode(7);

$root8 =  new BinaryNode(8);
$root8->left =  new BinaryNode(3);
$root8->right =  new BinaryNode(5);
//PROBLEM STATEMENT
#Given a binary tree of nodes 'N', you need to modify the value of its 
#nodes, such that the tree holds the Children sum property.
function dfs($root)
{  /// the value of a node is the sum of the it right and left child value
    $lv  = 0;
    $rv = 0;
    if ($root === null || ($root->left === null && $root->right === null)) return 1;
    $lv  =  $root->left !== null ?  $root->left->data : $lv;
    $rv  =  $root->right !== null ?  $root->right->data : $rv;
    if (($root->data === $lv + $rv) && dfs($root->left) && dfs($root->right)) return 1;
    return 0;
}
echo dfs($root8);