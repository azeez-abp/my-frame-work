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




////////////////////////////////interatiove solution



function bottomView2($root)
{

    /*
    -3 -2-1 0 1 2  the root will be on line zeor the line is key ,the value on node is the data
      | | | | | |  not two key can exits together. only add the value to the map if the key
      | | | 3 | |  has not exist previously
      | | |/|\| |  For the botton view, if the key has not exist previosly ans is leave node
      | | 4 | 5 |  All left are negative and all right are positve
      | |/\ | /\|
      | 6 7 | 8 9
      | /\| | | | 
      10 11 | | |
    For bottom view take the last element on each line (then don't bother ma be the element is in map because we the last one) 

    For the case of the top view, we need to check may be the element is in map because we need the first one
    preorder
*/
    $q = [[$root, 0]];
    $ans  = [];
    $map  = [];
    if ($root === null) return $ans;
    while (sizeof($q) > 0) {
        list($cur, $lineKeeper)  = array_shift($q);
        //  array_column()
        // if (!array_key_exists($lineKeeper, $map)) {

        $map[$lineKeeper] = $cur->data; // = [...$map, ...[$lineKeeper => ]];
        //}

        if ($cur->left !== null) {
            array_push($q, [$cur->left, $lineKeeper - 1]);
        }

        if ($cur->right !== null) {
            array_push($q, [$cur->right, $lineKeeper + 1]);
        }
    }

    print_r($map);

    foreach ($map as $key => $va) {

        array_push($ans, $va);
    }

    return $ans;
}

print_r(bottomView2($root));



//// Left and right view use level (bfs) x-axis
//// Top and botton view use line (dfs) y-axi

function bottomview3($root, $x, $y)
{
    static $res  = [];
    if ($root === null) {
        return null;
    }
    echo $root->data . " (" . $x . " , " . $y . ")\n"; //this is the principle
    //
    /*
    -3 -2-1 0 1 2  
      | | | | | |  
      | | | 3 | |-------------x 0
      | | |/|\| |  
      | | 4 | 5 |----------- x  1
      | |/\ | /\|
      | 6 7 | 8 9------------x  2
      | /\| | | | 
      10 11 | | |----------- x  3
      
      we create arr $res[$x] x -axis as key 
      we check if x-axis exist in the array an push the element into it
      top view last element on each y-axist ==> vertical transversal take last element
*/
    if (array_key_exists($y, $res)) {
        if (!in_array($root->data, $res[$y])) {

            // $dy   = [...$res[$y], $root->data];
            // $res[$y]  = $dy;
            $res[$y]  = [$root->data]; ///replace the formal
        }
    } else {
        $res[$y]  = [$root->data];
    }
    bottomview3($root->left, $x + 1, $y - 1);
    bottomview3($root->right, $x + 1, $y + 1);
    ksort($res);
    return $res;
}

print_r(bottomview3($root, 0, 0));