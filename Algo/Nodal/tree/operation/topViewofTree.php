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


function topViewOfATree($root)
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
     
    preorder
*/
    ///////////////////this is solved by line method /// we only add the node vale to stack if 
    // it line has not exist

    function topView($root, $lineL, $lineR)
    {
        static $stackL = [];
        static $stackR = [];
        if ($root == null) {
            return null;
        }

        // if (!array_key_exists($lineL,$map)  && !in_array($root->data, $map)) $map[$lineL]  = $root->data;


        if (!in_array($lineL, $stackL)) {
            $stackL = [...$stackL, $lineL];
            $stackL = [...$stackL, $root->data];
        }

        topView($root->left, $lineL - 1, $lineR);

        topView($root->right, $lineL, $lineR + 1);

        if (!in_array($lineR, $stackL) &&  !in_array($root->data, $stackL)) {
            $stackR = [...$stackR, [$lineR, $root->data]];
        }



        return [$stackL, $stackR];
    }










function topviewdfs($root, $x, $y)
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
      top view first element on each y-axist ==> vertical transversal take first element
*/
    if (array_key_exists($y, $res)) {
        if (!in_array($root->data, $res[$y])) {

            // $dy   = [...$res[$y], $root->data];
            // $res[$y]  = $dy;
        }
    } else {
        $res[$y]  = [$root->data];
    }
    topviewdfs($root->left, $x + 1, $y - 1);
    topviewdfs($root->right, $x + 1, $y + 1);
    ksort($res);
    return $res;
}

print_r(topviewdfs($root, 0, 0));




    
   
    function getTopView($root)
    {
        $ans  = [];
        $res  = topView($root, 0, 0);

        for ($i = 0; $i < sizeof($res[0]); $i++) {
            if ($i % 2 !== 0) {
                $ans  = [...$ans, $res[0][$i]];  ///left proces
            }
        }

        $temp = [];

        while (sizeof($res[1]) > 0) { ///right of tree
            $d  = array_pop($res[1]);
            if (!in_array($d[0], $temp)) {
                $temp  = [...$temp, $d[0]];
                $ans  = [...$ans, $d[1]];
            }
        }


        return    $ans;
    }
    // print_r(topView($root, 0, 0));

    print_r(getTopView($root));



















    ////////////////////////////////interatiove solution



    function topView2($root)
    {
        $q = [[$root, 0]];
        $ans  = [];
        $map  = [];
        if ($root === null) return $ans;
        while (sizeof($q) > 0) {
            list($cur, $lineKeeper)  = array_shift($q);
            //  array_column()
            if (!array_key_exists($lineKeeper, $map)) {

                $map[$lineKeeper] = $cur->data; // = [...$map, ...[$lineKeeper => ]];
            }

            if ($cur->left !== null) {
                array_push($q, [$cur->left, $lineKeeper - 1]);
            }

            if ($cur->right !== null) {
                array_push($q, [$cur->right, $lineKeeper + 1]);
            }
        }

        foreach ($map as $key => $va) {

            array_push($ans, $va);
        }

        return $ans;
    }

    print_r(topView2($root));
}
topViewOfATree($root);
