<?php

use Intervention\Image\Size;

use function PHPUnit\Framework\callback;

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
function getLeft($root)
{

    $q  = [$root];
    $res  = [];
    while (sizeof($q) > 0) {
        $c  = array_shift($q);
        if ($c->left !== null && $c->right !== null) {
            array_push($res, $c->data);
            array_push($q, $c->left);
            // echo $c->left->data . "\n";
        }
    }
    return $res;
}




function eachLEvelZigZag($root)
{

    $curL  = [$root];
    $res  = [];
    $ltr  = false;
    ////////////////////////////////////
    while (sizeof($curL) > 0) {
        $nextL  = [];
        $eachLRes  = [];
        ////////////////////////////////////
        while (sizeof($curL) > 0) {
            $cur  = array_shift($curL);
            $eachLRes  = [...$eachLRes, $cur->data];
            if ($ltr) {
                if ($cur->left !== null) {
                    $nextL  = [...$nextL, $cur->left];
                    // array_push($nextL, $cur->left);
                }
                if ($cur->right !== null) {
                    //array_push($nextL, $cur->right);
                    $nextL  = [...$nextL, $cur->right];
                }
            } else {
                if ($cur->right !== null) {
                    // array_push($nextL, $cur->right);
                    $nextL  = [...$nextL, $cur->right];
                }
                if ($cur->left !== null) {
                    //  array_push($nextL, $cur->left);
                    $nextL  = [...$nextL, $cur->left];
                }
            }
        }
        ///////////////////////////////end of each level
        $curL  = $nextL;
        $res  = [...$res, $eachLRes];
    }
    /////////////////////////////////
    $ltr = !$ltr;
    return $res;
}

print_r(eachLEvelZigZag($root));


function groupByLevelAndCol($root, $x, $y)
{
    $res  = [];
    $rows  = [];
    $cols  = [];
    $q = [[$root, $x, $y]];
    while (sizeof($q) > 0) {
        $size = sizeof($q);

        list($cur, $x, $y)  = array_shift($q);
        //////////use co-ordinate concept print element group by row////////////////////////////////////
        if (!empty($rows[$x])) {
            $rows[$x]  = [...$rows[$x], $cur->data];
        } else {
            $rows[$x] = [$cur->data];
        }
        //////////////////////////////////////////////

        //////////use co-ordinate concept print element grop by column////////////////////////////////////
        if (!empty($cols[$y])) {
            $cols[$y]  = [...$cols[$y], $cur->data];
        } else {
            $cols[$y] = [$cur->data];
        }
        //////////////////////////////////////////////


        if ($cur->left !== null) {
            array_push($q, [$cur->left, $x + 1, $y - 1]);
        }

        if ($cur->right !== null) {
            array_push($q, [$cur->right, $x + 1, $y + 1]);
        }
        array_push($res, [$cur->data, $x, $y]);
    }
    return [$res, $rows, $cols];
}
//groupByLevelAndCol($root);
print_r(groupByLevelAndCol($root, 0, 0));