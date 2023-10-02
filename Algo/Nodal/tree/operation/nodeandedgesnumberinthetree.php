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
function maxPathSum($root, &$edgesBetweenNodes)
{
    if ($root === null) {
        return 0;
    }


    $lh  = maxPathSum($root->left, $edgesBetweenNodes);
    $rh = maxPathSum($root->right, $edgesBetweenNodes);
    $edgesBetweenNodes  = max($lh + $rh, $edgesBetweenNodes);

    $numberOfNode  = ($lh + $rh)  + 1; //+1 account for the root node
    return  $numberOfNode; // this the height of tree
}
$res  = 0;
echo maxPathSum($root, $res) . "\n";

echo $res;