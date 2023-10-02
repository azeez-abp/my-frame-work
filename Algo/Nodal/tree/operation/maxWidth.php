<?php

use Doctrine\DBAL\Types\BinaryType;
use Intervention\Image\Size;
use PhpParser\Node\Expr\Print_;

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
//// this is a concept that use both line and level
//// Left and right view use level (bfs) x-axis
//// Top and botton view use line (dfs) y-axi
$root2  = new BinaryNode(-10);
$root2->left  = new BinaryNode(9);
$root2->right  = new BinaryNode(20);
$root2->right->left  = new BinaryNode(15);
$root2->right->right  = new BinaryNode(7);

$root3 =  new BinaryNode(1);
$root3->left =  new BinaryNode(2);
$root3->right =  new BinaryNode(3);

$root4 =  new BinaryNode(-3);

$root5 =  new BinaryNode(1);
$root5->left =  new BinaryNode(3);
$root5->left->left =  new BinaryNode(5);
$root5->left->right =  new BinaryNode(3);
$root5->right =  new BinaryNode(2);
$root5->right->right =  new BinaryNode(9);


$root6 =  new BinaryNode(1);
$root6->left =  new BinaryNode(3);
$root6->left->left =  new BinaryNode(5);
$root6->left->left->left =  new BinaryNode(6);

$root6->right =  new BinaryNode(2);
$root6->right->right =  new BinaryNode(9);
$root6->right->right->left =  new BinaryNode(7);



function eachLEvelZigZag($root)
{
    if ($root === null) {
        return 0;
    }

    $queue  = [[$root, 1]]; //dept is 1 when root is present
    $temp  = 0;
    $res = [];
    while (!empty($queue)) {
        list($node, $dept)  = array_pop($queue);
        $res = [...$res, $node->data];
        if ($node->left !== null) {
            array_push($queue, [$node->left, $dept + 1]);
        }
        if ($node->right !== null) {
            array_push($queue, [$node->right, $dept + 1]);
        }
    }
    return $res;
}

print_r(eachLEvelZigZag($root));

function widthOfBinaryTree1($root)
{
    $queue = [[$root, 0]];
    $width = 0;
    while (!empty($queue)) {
        $count = count($queue);
        $index_of_first_node  = $queue[0][1];
        $index_of_last_node   = $queue[$count - 1][1];
        $width = max($width, $index_of_last_node - $index_of_first_node + 1);
        while ($count--) {
            list($node, $ind) = array_shift($queue);
            if ($node->left !== null) {
                $queue[] = [$node->left, 2 * $ind + 1];
            }
            if ($node->right !== null) {
                $queue[] = [$node->right, 2 * $ind + 2];
            }
        }
    }
    return $width;
}

//echo widthOfBinaryTree1($root) . "\n";







function heightOfBinaryTree($root)
{
    $queue = [[$root, 0]];

    while (!empty($queue)) {
        list($node, $p) = array_shift($queue);

        if ($node->left !== null) {
            $queue[] = [$node !== null ? $node->left : null, $p + 1];
        }
        if ($node->right !== null) {
            $queue[] = [$node !== null ? $node->right : null, $p + 1];
        }
    }
    return $p;
}

function widthOfBinaryTree2($root, $x)
{
    $h  =  heightOfBinaryTree($root);
    $queue = [[$root, $x]];
    $width = 0;
    $res  = [];

    while (!empty($queue)) {

        list($node, $x) = array_shift($queue);
        // if ($node->left !== null) {
        $queue[] = [$node !== null ? $node->left : null, $x + 1];
        // }
        //if ($node->right !== null) {
        $queue[] = [$node !== null ? $node->right : null, $x + 1];
        // }
        if ($x >= $h + 1) {
            break;
        }

        if (empty($res[$x])) {
            $res  = [...$res, [$node !== null ? $node->data : null]];
        } else {
            $res[$x]  = [...$res[$x], $node !== null ? $node->data : null];
        }
    }


    $width  = 0;
    foreach ($res as $k => $v) {

        if (!empty($v[sizeof($v) - 2])  ||  !empty($v[sizeof($v) - 1])) {

            $width  = max($width, empty($v[sizeof($v) - 1]) ? sizeof($v) - 1 : sizeof($v));
        }
    }
    return [$width, $res];
}

//print_r(widthOfBinaryTree2($root6, 0)) . "\n";


function widthOfBinaryTree3($root, $x)
{

    $queue = [[$root, $x]];
    $width = 0;
    $res  = [];

    while (!empty($queue)) {

        list($node, $x) = array_shift($queue);
        // if ($node->left !== null) {
        $queue[] = [$node !== null ? $node->left : null, $x + 1];
        // }
        //if ($node->right !== null) {
        $queue[] = [$node !== null ? $node->right : null, $x + 1];
        // }
        if (empty($res[$x])) {
            $res  = [...$res, [$node !== null ? $node->data : null]];
        } else {
            $res[$x]  = [...$res[$x], $node !== null ? $node->data : null];
        }
        if (
            array_key_exists($x, $res)
            &&
            array_key_exists($x - 1, $res)

            &&
            (array_key_exists(0, $res[$x]) && $res[$x][0] === null)
            &&
            (array_key_exists(1, $res[$x]) && $res[$x][1] === null)
        ) {
            break;
        }
    }


    $width  = 0;
    foreach ($res as $k => $v) {

        if (

            (array_key_exists(sizeof($v) - 2, $v) && $v[sizeof($v) - 2] !== null)
            ||

            (array_key_exists(sizeof($v) - 1, $v) && $v[sizeof($v) - 1] !== null)


        ) {

            $width  = max($width, $v[sizeof($v) - 1] === null ? sizeof($v) - 1 : sizeof($v));
        }
    }
    return $res; //[$width, $res];
}

$root7    = new BinaryNode(0);
$node  = $root7;
for ($i = 0; $i < 3000; $i++) {

    if ($i % 2 == 0) {
        $node->left  = new BinaryNode(null);
    } else {
        $node->left  = new BinaryNode(0);
    }
    $node  = $node->left;
}
//print_r(widthOfBinaryTree3($root7, 0));
//print_r(widthOfBinaryTree2($root7, 0)) . "\n";
function widthOfBinaryTree($root)
{
    $queue = [[$root, 0]];
    $width = 0;
    while (!empty($queue)) {
        $count = count($queue);
        $f  = $queue[0][1];
        $l   = $queue[$count - 1][1];
        $width = max($width, $l - $f + 1);
        for ($i = 0; $i < $count; $i++) {
            // while ($count--) {
            list($node, $ind) = array_shift($queue);
            if ($node->left) {
                $queue[] = [$node->left, 2 * $ind + 1];
            } 
            if ($node->right) {
                $queue[] = [$node->right, 2 * $ind + 2];
            } 
        }
    }
    return $width;
}
echo widthOfBinaryTree($root7);


function maxWidthdfs($root, $level, $index, &$start, &$res)
{

    if ($root === null) return  0;
    if (sizeof($start) === $level) {
        $start = [...$start, $index];
    }

    // if (array_key_exists($level, $res)) {
    //     if (!in_array($root->data, $res[$level])) {
    //         $res[$level]   = [...$res[$level], [$root->data, $index]];
    //     }
    // } else {
    //     $res =  [...$res, [[$root->data, $index]]];
    // }
    $cur  = $index - $start[$level] + 1;
    $l  = maxWidthdfs($root->left, $level + 1, 2 * $index + 1, $start, $res);
    $r  = maxWidthdfs($root->right, $level + 1, 2 * $index + 2, $start, $res);
    return  max($cur, max($l, $r));
}

$s  =  [];
$e  = [];
$res  = [];
echo maxWidthdfs($root8, 0, 0, $s, $res);

Act as interviewer as me 20 questions about power Bi for the role of Business Intelligence developer

what is answer to question 2
