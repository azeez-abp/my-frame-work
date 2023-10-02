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
      /\        \            
    10  11       13
         \
         12
    preorder
    node between 12 and 13
*/
$root  = new BinaryNode(3);
$root->left  =  new BinaryNode(4);
$root->right  = new BinaryNode(5);
$root->left->left  =  new BinaryNode(6);
$root->left->right  =  new BinaryNode(7);
$root->right->left  =  new BinaryNode(8);
$root->right->right  =  new BinaryNode(9);
$root->right->right->right  =  new BinaryNode(13);
$root->left->left->left  =  new BinaryNode(10);
$root->left->left->right  =  new BinaryNode(11);
$root->left->left->right->left  =  new BinaryNode(12);
$ptr = 0;


/**
 * Diameter of a tree is the number of edges between two leave node on the longest path
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
 
 function heightOfRootAndSubTree($root, &$dia)
{
    if ($root == null) {
        return 0;
    }
    $lh  = $this->heightOfRootAndSubTree($root->left, $dia);
    $rh  = $this->heightOfRootAndSubTree($root->right, $dia);
    $dia  = max($dia, $lh + $rh);
    return 1 + max($lh, $rh);
    ////1 is added to 0 at every call
}
    function diameterOfBinaryTree($root) {
     
         $dia  = 0;

         $this->heightOfRootAndSubTree($root, $dia);
         return $dia;
     
    }
  
}
    function verticalSum($root, $col)
    {
        static $freqCount  = [];
        if ($root == null) {
            return null;
        }

        if (!array_key_exists($col, $freqCount)) {
            $freqCount[$col]  = 0;
        }
        
        $freqCount[$col]  = $freqCount[$col] + $root->data;
        verticalSum($root->left, $col + 1);
        verticalSum($root->right, $col - 1);
        return $freqCount;
    }
  //  verticalSum($root, 0);
   // print_r(verticalSum($root, 0));


//////////////////////the key to finding the diametr of a tree is to is to put second parameter that calculate the width of the subtree as their cheight is calculated



function heightOfRootAndSubTree($root, &$dia)
{
    if ($root == null) {
        return 0;
    }
    $lh  = heightOfRootAndSubTree($root->left, $dia);
    $rh  = heightOfRootAndSubTree($root->right, $dia);

    $dia  = max($dia, $lh + $rh);////Key manipulation
    echo $dia."\n";
    return 1 + max($lh, $rh);
    ////1 is added to 0 at every call
}

$dia =  0;
print_r(heightOfRootAndSubTree($root,$dia ));

function diameterOfTree($root)
{
    $dia  = 0;

    heightOfRootAndSubTree($root, $dia);
    return $dia;
}

echo diameterOfTree($root);