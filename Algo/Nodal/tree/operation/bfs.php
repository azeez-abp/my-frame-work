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




function bfsRev($root)
{

    if ($root === null) {
        return 0;
    }

    $q  = [$root];
    $current  = null;
    $sum   = 0;
    $res  = [];
    while (!empty($q)) {
        $current = array_shift($q);
        $sum   += $current->data;



        if ($current->left !== null) {
            array_push($q, $current->left);
        }

        if ($current->right !== null) {
            array_push($q, $current->right);
        }


        array_push($res, $current->data);
    }
    rsort($res);
    return  $res;
}

print_r(bfsRev(($root)));


function deleteTree($root)
{
    static $res  = [];

    if ($root === null) {
        return null;
    }

    deleteTree($root->left);
    deleteTree($root->right);
    array_push($res, $root->data);

    return $res;
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
//print_r(deleteTree($root));
//var_dump($root);

function dfs($root)
{
  if($root === null) return null;

  dfs($root->left);
  dfs($root->right);

}