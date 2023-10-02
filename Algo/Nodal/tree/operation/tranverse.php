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

function tranverse($root)
{
    if ($root === null) {
        return [];
    }
    static $res  = [];

    tranverse($root->left);

    tranverse($root->right);
    array_push($res, $root->data);
    return $res;
}
print_r(tranverse($root));
function postOrder($root)
{
    if ($root === null) {
        return [];
    }
    $visited  = [];
    $stack  = [$root];
    $res  = [];
    $node  = $root;
    /*
           3
          / \
         4   5 
        /\   /\
       6  7 8  9
      / \
     10  11 
    /\   /\
   16 17 18 19
  /\ 
101  111
    preorder
*/
    while (!empty($stack)) {
        if ($node !== null) {
            array_push($stack, $node);
            $node = $node->left;
            ///work down to left first
        } else {
            $node = array_pop($stack);
            // once no more left go to right
            if ($node->right !== null && !in_array($node->right, $visited)) {
                array_push($stack, $node);
                $node = $node->right;
            } else {
                array_push($visited, $node);
                array_push($res, $node->data);
                $node = null;
            }
        }
    }

    array_pop($res);
    print_r($res);
}

function preOrderTransversal($root)
{

    if ($root === null) {
        return [];
    } else {
        ///[1,2,3,4,5]
        $stack  = [$root];
        $res = [];
        while (!empty($stack)) {
            ///load both right and left 
            //therefore left will be taken first
            $node    = array_pop($stack);
            array_push($res, $node->data);
            if ($node->right !== null) {
                array_push($stack, $node->right);
            }

            if ($node->left !== null) {
                array_push($stack, $node->left);
            }
        }
    }
    return $res;
}


function inOrderTransversal($root){
  /*
   load the left first until no more left
   take the left from last one and add right
  */
  if($root ===null){
    return [];
  }else{
     ///[1,2,3,4,5]
     $stack  = [];
     $node = $root;
     $res = [];
     while (!empty($stack) || $node !== null) {
          ///load all the left to the stack first
          if($node !== null){
            array_push($stack,$node);
            $node   = $node->left;
          }else{
        $node    = array_pop($stack);
         array_push($res,$node->data);
         $node = $node->right;
        }


     }
    

  }
    return $res;
}
function postOrderFromRight($root)
{
    if ($root === null) {
        return [];
    }
    $visited  = [];
    $stack  = [$root];
    $res  = [];
    $node  = $root;
    while (!empty($stack)) {
        if ($node !== null) {
            array_push($stack, $node);
            $node = $node->right;
            ///work down to right first
        } else {
            $node = array_pop($stack);
            // once no more left go to right
            if ($node->left !== null && !in_array($node->left, $visited)) {
                array_push($stack, $node);
                $node = $node->left;
            } else {
                array_push($visited, $node);
                array_push($res, $node->data);
                $node = null;
            }
        }
    }

    array_pop($res);
    print_r($res);
}

///bsf is queue
/// dfs is stack
/// preorder(stack) and levelOrder(queue) are similar (no conditional push of left and right)


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

    print_r($res);
    return $res;
}

function levelOrderFromBottom($root)
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

levelOrder($root);

function treeSize($root)
{
    //total number of node

    if ($root === null) {
        return 0;
    }

    return treeSize($root->left) + treeSize($root->right) + 1;//+1 add the root node
}
