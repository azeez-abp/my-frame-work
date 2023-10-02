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
function pathToANode($root, $x, $y, $ele, &$res)
{
    ///search algo is the basic principle
    if ($root === null) {
        return null;
    }
    echo $root->data . " (" . $x . " , " . $y . ")\n"; //this is the principle
   

    array_push($res, $root->data);
    if (($ele === $root->data)) { ///if you reach index 3 in res and tree go back to 2 it won't add lrx ; tby
        return true;
    }


    if (
        pathToANode($root->left, $x + 1, $y - 1, $ele, $res)
        ||
        pathToANode($root->right, $x + 1, $y + 1, $ele, $res)
    ) {

        return true;
    }

    array_pop($res);
    return false;
}
$res  = [];
print_r(pathToANode($root, 0, 0, 8, $res));
print_r($res);