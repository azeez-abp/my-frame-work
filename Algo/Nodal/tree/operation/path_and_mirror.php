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
$root  = new BinaryNode(2);
$root->left  =  new BinaryNode(3);
$root->right  = new BinaryNode(4);
$root->left->left  =  new BinaryNode(6);
$root->left->right  =  new BinaryNode(7);
$root->right->left  =  new BinaryNode(8);
$root->right->right  =  new BinaryNode(9);
$root->left->left->left  =  new BinaryNode(10);
$root->left->left->right  =  new BinaryNode(11);




    function printPathsToLeaveNode($node, &$path, $pathLen)
    {
        if ($node == null)
            return;

        /* append this node to the path array */
        $path[$pathLen] = $node->data;
        $pathLen++;
        static $old_max_path  = -INF;
        static $old_min_path  = INF;
        static $paths  = [];
        static $pathInfo  = [];
        /* it's a leaf, so print the path that lead to here */
        if ($node->left == null && $node->right == null) {
            array_push($paths, $path);
            $new_max_path  = array_reduce($path, function ($accu, $val) {
                return $accu + $val;
            });
            if ($old_max_path < $new_max_path) {
                $old_max_path  = $new_max_path;
                $pathInfo['max_sum']  =  $old_max_path;
                $pathInfo['max_path_index']  =  count($paths) - 1;
                $pathInfo['max_path_arr']  = $path;
            }
            if ($old_min_path > $new_max_path) {
                $old_min_path  = $new_max_path;
                $pathInfo['min_sum']  =  $old_max_path;
                $pathInfo['min_path_index']  =  count($paths) - 1;
                $pathInfo['min_path_arr']  = $path;
            }

            // print_r($path); ///you only print the paths when you get to leave
            /// this is where we manipulate max path and mean path
        } else {
            /* otherwise try both subtrees */
            printPathsToLeaveNode($node->left, $path, $pathLen);
            printPathsToLeaveNode($node->right, $path, $pathLen);
        }

        return [$paths, $pathInfo];
    }
    $path  = [];
    $paths   = [];
    print_r(printPathsToLeaveNode($root, $path, 0));

function mirrorImage($root)
{
    if ($root === null) {
        return false;
    }
    mirrorImage($root->left);
    mirrorImage($root->right);
    $temp  = $root->left;
    $root->left  = $root->right;
    $root->right = $temp;
}

function getNodeAncestor($root, $node)
{
    if ($root == null) {
        return 0;
    }

    if (($root->left === $node || $root->right === $node) || (getNodeAncestor($root->left, $node)) || (getNodeAncestor($root->right, $node))) {
        print_r($root->data); ///ancesstor
        print_r(sumOfPath($root->left) + sumOfPath($root->right)); //predecessor sum
        echo "\n";

        //return 1;
    }

    //return 0;
}


function sumOfPath($root)
{
    if ($root === null) {
        return 0;
    }
    return $root->data + sumOfPath($root->left) + sumOfPath($root->right);
}

function sumOfPathIterative($root)
{

    if ($root === null) {
        return 0;
    }

    $q  = [$root];
    $current  = null;
    $sum   = 0;
    while (!empty($q)) {

        $current = array_shift($q);
        $sum   += $current->data;

        if ($current->left !== null) {
            array_push($q, $current->left);
        }

        if ($current->right !== null) {
            array_push($q, $current->right);
        }
    }
    return $sum;
}
// print_r(sumOfPathIterative($root));
// mirrorImage($root);
function nodeWithMinimumVal($root)
{
    if ($root === null) {
        return false;
    }

    $q  = [$root];
    $current  = null;
    $min  = $root->data;
    $max  = $root->data;
    while (!empty($q)) {
        $current = array_shift($q);
        $min = $min > $current->data ? $current->data : $min;
        $max = $max < $current->data ? $current->data : $max;

        if ($current->left !== null) {
            array_push($q, $current->left);
        }

        if ($current->right !== null) {
            array_push($q, $current->right);
        }
    }
    return $min . " max is " . $max;
}

