<?php



function levelOrder($root)
{
    //bfs
    if ($root === null) {
        return [];
    }
    $queue  = [$root];
    $node  = null;
    $res  = [];
    while (!empty($queue)) {
        $node  = array_shift($queue);
        array_push($res, $node->data);

        if ($node->left !== null) {
            array_push($queue, $node->left);
        }

        if ($node->right !== null) {
            array_push($queue, $node->right);
        }
    }


    return $res;
}


class BinaryNode
{
    public function __construct($data)
    {
        $this->left  = null;
        $this->data  = $data ? $data : 'null';
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

function levelOrderRever($root)
{
    //bfs
    if ($root === null) {
        return [];
    }
    $queue  = [$root];
    $node  = null;
    $res  = [];

    while (!empty($queue)) {
        $node  = array_shift($queue);
        array_push($res, $node->data);
        if ($node->right !== null) {
            array_push($queue, $node->right);
        }
        if ($node->left !== null) {
            array_push($queue, $node->left);
        }
    }
    return array_reverse($res);
}




$root  = new BinaryNode(3);
$root->left  =  new BinaryNode(4);
$root->right  = new BinaryNode(5);
$root->left->left  =  new BinaryNode(6);
$root->left->right  =  new BinaryNode(7);
$root->right->left  =  new BinaryNode(8);
$root->right->right  =  new BinaryNode(9);
$root->left->left->left  =  new BinaryNode(10);
$root->left->left->right  =  new BinaryNode(11);


function build2($arr)
{
    ///through bsf


    $root  = new BinaryNode(array_shift($arr));
    $q  = [$root];

    while (!empty($arr)) {
        $data    = $arr[0];
        $node_l  = new BinaryNode(array_shift($arr));
        $node_r  = new BinaryNode(array_shift($arr));

        $parent   = array_shift($q);

        $parent->left   = $node_l;
        $parent->right  = $node_r;

        array_push($q, $node_l);
        array_push($q, $node_r);
    }

    return $root;
}

function deleteNode($root, $data)
{
    $res = [];
    foreach (levelOrder($root) as $ele) {
        if ($ele !== $data) {
            array_push($res, $ele);
        }
    }
    $root  = build2($res);
    //print_r($root);
    return $root;
}
$n  = deleteNode($root, 3);
echo $n->left->left->right->data;
print_r(levelOrder($n));
//print_r(levelOrderRever($root));
