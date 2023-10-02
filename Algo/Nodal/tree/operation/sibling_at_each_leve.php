<?php

use function Pest\Laravel\delete;

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




function bfsRevAndSiblingAtEachLevel($root, $target)
{

    if ($root === null) {
        return 0;
    }

    $q  = [[$root, 1]];
    $current  = null;
    $sum   = 0;
    $res  = [];
    $byLevel  = [];
    $levelArr  = [];
    while (!empty($q)) {
        list($current, $level) = array_shift($q);
        $sum   += $current->data;
        if ($current->left !== null) {
            array_push($q, [$current->left, $level + 1]);
        }

        if ($current->right !== null) {
            array_push($q, [$current->right, $level + 1]);
        }

        array_push($res, $current->data);
        array_push($levelArr, $current->data);
        $byLevel[$level - 1]  =  $levelArr;
    }

    rsort($res);
    //array_pop($res);
    return  [$res, compareTwoArray($byLevel)];
}

print_r(bfsRevAndSiblingAtEachLevel($root, 4));


function compareTwoArray($arr)
{
    $res  = [$arr[0]];
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $start  = $i;
        $next   = $start + 1;
        $diff  =  array_diff($arr[$next], $arr[$start]);
        array_push($res, array_values($diff));
    }
    print_r($res);
    return $res;
}
compareTwoArray([[3], [3, 5], [3, 5, 6, 7]]);




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




<?php
function buildTree()
{

    class Node
    {

        public  function __construct($data)
        {
            $this->left = null;
            $this->data  = $data;
            $this->right =  null;
        }
    }

    class Tree
    {
        public function __construct()
        {
            $this->root = null;
        }

        public function build($preorder, $inorder)
        {
            if (empty($inorder)) {

                return null;
            }

            $root  = new Node($preorder[0]);
            if ($this->root  == null) {
                $this->root  = $root;
            }
            // print_r($inorder);
            $rootPos  = array_search($preorder[0], $inorder);

            $root->left  = $this->build(array_splice($preorder, 1, 1 + $rootPos), array_splice($inorder, 0, $rootPos));

            $root->right  = $this->build(array_splice($preorder, 1 + $rootPos), array_splice($inorder, $rootPos + 1));



            return $root;
        }


        public function build2($arr)
        {
            ///through bsf
            $q  = [];

            while (!empty($arr)) {
                $data    = $arr[0];
                $node  = new Node($data);
                if ($this->root  == null) {
                    $this->root  = $node;
                    array_shift($arr);
                    array_push($q, $node);
                } else {
                    $root  = array_shift($q);
                    if ($root->left === null) {
                        $root->left  = $node;
                        array_shift($arr);
                        if ($root->right === null) {
                            array_unshift($q, $root); //make it the first element
                        } else {
                            array_push($q, $root->left);
                        }
                    } else if ($root->right === null) {
                        $root->right  = $node;
                        array_shift($arr);
                        array_push($q, $root->left);
                        array_push($q, $root->right);
                    }
                }
            }
        }
    }

    $t   = new Tree();
    //$t->build(['A', 'B', 'D', 'E', 'C', 'F'], ['D', 'B', 'E', 'A', 'F', 'C']);
    $t->build2(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M']);
    echo "================================";
    var_dump($t->root->left->right->right->data);
    var_dump($t->root->right->left->right->data);
    function zigzagHorizontallyTransverse($root)
    {
        /*Sibling at each level*/
        /*
         while (!empty($currentLevel)) {
                
                while (!empty($currentLevel)) {
                }
            }
        */
        $res   = [];
        $currentLevel  = [];

        if ($root !== null) {
            array_push($currentLevel, $root);
            $letfToRight  = true;
            while (!empty($currentLevel)) {
                $levelresult = [];
                $nextLevel = [];
                //////////////////////////////////for every horizontal result
                while (!empty($currentLevel)) {
                    $node  = array_pop($currentLevel);
                    array_push($levelresult, $node->data);
                    ///////////////////////////////////////
                    if ($letfToRight) {
                        if ($node->left !== null) {
                            array_push($nextLevel, $node->left);
                        }
                        if ($node->right !== null) {
                            array_push($nextLevel, $node->right);
                        }
                    } else {

                        if ($node->right !== null) {
                            array_push($nextLevel, $node->right);
                        }

                        if ($node->left !== null) {
                            array_push($nextLevel, $node->left);
                        }
                    }
                    ////////////////////////////
                }
                $currentLevel  = $nextLevel;
                array_push($res,  $levelresult);
                $letfToRight != $letfToRight;
            }
            return $res;
        }



        //  $p = zigzagHorizontallyTransverse($root->left, 'left') . zigzagHorizontallyTransverse($root->right, 'right') . $root->data;
        return 0;
    }
    //Time Complexity: O(n). Space Complexity: Space.; for two stacks = O(n) + O(n) = O(n). 
    print_r(zigzagHorizontallyTransverse($t->root));
}

/*
       A
      / \
     B   C  
    /\   /\
   D  E  F  G  
  /\  /\ /\
 H  I J KL M
*/
buildTree();

// $arr = [1, 2, 3, 4, 5, 5, 6, 6, 5678, 7, 87, 89, 100];
// echo array_search(2, $arr);
// $arr2 = [1, 2, 3, 4, 5, 5, 6, 6, 5678, 7, 87, 89, 100];
//$arr   = ['A', 'B', 'D', 'E', 'C', 'F'];
//print_r(array_splice($arr,  count($arr) / 2));
// print_r(array_splice($arr2, 4, floor(count($arr2) / 2)));
