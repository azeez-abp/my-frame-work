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
//$root->left->left->right->right  =  new BinaryNode(12);
//haspath
//// this is a concept that use both line and level
//// Left and right view use level (bfs) x-axis
//// Top and botton view use line (dfs) y-axi


function eachLevelWithdfs($root, $x, $y)//it is also called horizontal tranversal
{
    static $res  = [];
    if ($root === null) {
        return null;
    }
    // echo $root->data . " (" . $x . " , " . $y . ")\n";//this is the principle
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
    preorder
*/
    if (array_key_exists($x, $res)) {//for vertical transversal replace the x for y
        echo $x . " ";
        if (!in_array($root->data, $res[$x])) {
            $dx   = [...$res[$x], $root->data];
            $res[$x]  = $dx;
        }
        print_r($dx);
    } else {
        $res[$x]  = [$root->data];
    }
    eachLevelWithdfs($root->left, $x + 1, $y - 1);
    eachLevelWithdfs($root->right, $x + 1, $y + 1);
    return $res;
}

print_r(eachLevelWithdfs($root, 0, 0));




//// this is a concept that use both line and level
//// Left and right view use level (bfs) x-axis
//// Top and botton view use line (dfs) y-axi

function verticalTransversal($root, $x, $y)
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
      | | | 3 | |------------x 0
      | | |/|\| |  
      | | 4 | 5 |------------x  1
      | |/\ | /\|
      | 6 7 | 8 9------------x  2
      | /\| | | | 
      10 11 | | |------------x  3
      
      we create arr $res[$x] x -axis as key 
      we check if x-axis exist in the array an push the element into it
    preorder
*/
    if (array_key_exists($y, $res)) {

        if (!in_array($root->data, $res[$y])) {
            $dy   = [...$res[$y], $root->data];
            $res[$y]  = $dy;
        }
    } else {
        $res[$y]  = [$root->data];
    }
    verticalTransversal($root->left, $x + 1, $y - 1);
    verticalTransversal($root->right, $x + 1, $y + 1);
    ksort($res);
    return $res;
}

print_r(verticalTransversal($root, 0, 0));
