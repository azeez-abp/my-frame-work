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




function findLevelwithMaxSum($root)
{

    if ($root === null) {
        return 0;
    }

    $q  = [$root, null];
    $current  = null;
    $sum   = 0;
    $res  = [];
    $level = $maxLevel = $currentSum = $maxSum = 0;
    while (!empty($q)) {
        $current = array_shift($q);

        if ($current === null) {
            $maxSum  = $currentSum;
            $maxLevel = $level;
            if ($currentSum > $maxSum) {
                $maxSum = $currentSum;
                $maxLevel = $level;
            }
            if (!empty($q)) {
                array_push($q, null);
                $level += 1;
            }
        } else {
            $currentSum   += $current->data;
            if ($current->left !== null) {
                array_push($q, $current->left);
            }

            if ($current->right !== null) {
                array_push($q, $current->right);
            }
        }
    }

    return  $maxLevel;
}

print_r(findLevelwithMaxSum(($root)));




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
