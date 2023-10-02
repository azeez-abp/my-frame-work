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
$root->left->left->right->right  =  new BinaryNode(12);


function leftView($root, $level)
{
    //////////first child of each level
    static  $res  = [];
    if ($root === null) {
        return [];
    }

    if (sizeof($res) === $level) {///if you reach index 3 in res and tree go back to 2 it won't add
    /////for left right view manipultex ; tby
        array_push($res, $root->data);
    }

    leftView($root->left, $level + 1);
    leftView($root->right, $level + 1);

    return $res;
}

$lv = leftView($root, 0);
print_r($lv);



////////////////////////////////interatiove solution


function RightView($root, $level)
{
    //////////first child of each level
    static  $res  = [];
    if ($root === null) {
        return [];
    }

    if (sizeof($res) === $level) { ///if you reach index 3 in res and tree go back to 2 it won't add
        array_push($res, $root->data);
    }
    RightView($root->right, $level + 1);
    RightView($root->left, $level + 1);


    return $res;
}

$lv = RightView($root, 0);
print_r($lv);
