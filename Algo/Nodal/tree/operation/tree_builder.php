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
