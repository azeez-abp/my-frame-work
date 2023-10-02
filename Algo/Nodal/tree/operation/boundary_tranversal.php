<?php

use Intervention\Image\Size;

use function PHPUnit\Framework\callback;

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
function getLeft($root)
{

    $q  = [$root];
    $res  = [];
    while (sizeof($q) > 0) {
        $c  = array_shift($q);
        if ($c->left !== null && $c->right !== null) {
            array_push($res, $c->data);
            array_push($q, $c->left);
            // echo $c->left->data . "\n";
        }
    }
    return $res;
}


function getLeave($root)
{

    $q  = [$root->left, $root->right];
    $res  = [];
    while (sizeof($q) > 0) {
        $c  = array_shift($q);
        if ($c !== null) {
            if ($c->left === null && $c->right === null) {
                array_push($res, $c->data);
            }
            array_push($q, $c->left);
            array_push($q, $c->right);
        }
    }
    return $res;
}


function getRight($root)
{

    $q  = [$root->right];
    $res  = [];
    while (sizeof($q) > 0) {
        $c  = array_shift($q);

        if ($c->left !== null && $c->right !== null) {
            array_push($res, $c->data);
            array_push($q, $c->right);
        }
    }
    return $res;
}



print_r([...getLeft($root), ...getLeave($root), ...getRight($root)]);
