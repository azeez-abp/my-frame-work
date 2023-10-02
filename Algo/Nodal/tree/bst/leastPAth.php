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
    $t2   = new Tree();
    $bst   = new Tree();
    //$t->build(['A', 'B', 'D', 'E', 'C', 'F'], ['D', 'B', 'E', 'A', 'F', 'C']);
    $t->build2(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M']);
    $t2->build2([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]);
    $bst->build2([10, 6, 16, 4, 9, 13, null, null, 7]);
    echo "================================";
    var_dump($t->root->left->right->right->data);
    var_dump($t2->root->right->left->right->data);


    /*
    Binary Search Tree Property 
    is for searching
• The left s ubtree of a node contains only nodes with keys less than the nodes key.
• The right subtree of a node contains only nodes with keys greater than the nodes key.
• Both the left and right subtrees must also be bina ry search trees. 

                 Bst                                             

                 7
                / \
              4    9
            /   \
           2     5
             

             Non Bst                                             

                3
                /\
              1    6
                 /   \
                9     7
     
• Since root data is always between left subtree data and right subtree data, performing inorder traversal
on binary search tree produces a sorted list. 

• While solving problems on binary search trees, first we process left subtree, then root data, and fmally
we process right subtree.

• Left child with no left node is the smallest 2 (continue t the left untill yo meet left with no left child) • In BSTs, the maximum element is the right-most node, which does not have right child. 
•in serching if data is less continue to left; if the data is greater continue to the right

    inserting key code
    if root.data > node.data:
        (insert to the left if the the node do not has left(if has left continue to left))
        if root.left == None:
        rool.lefl = node
        else:
        insertNode(root.left, node)
    else:
        if root.right == None:
        root.right = node
        else:
        inserlNode(rooLrighl, node)

        In general, the height balanced trees are represented with HB(k). where k is the difference between left subtree height and right subtree height. Sometimes le is called balance factor.

        Full Balanced Binary Search Trees k = 0  HB(0)
        AVL is binary search tree with k = 1 HB(1)
        Properties of AVL Trees 
          A binary tree is said lo be an AVL tree, if:

*/

    function findLowestCommonAncesstor($root, $a, $b)
    {
        /*is also known as shortest path*/
        /* a < node->data <= b, is the Least Common Ancestor(LCA) of a and b */
        while ($root) {

            if (($a <= $root->data  &&  $root->data  < $b) ||  ($a < $root->data  &&  $root->data  <= $b)) {
                return $root->data;
            }

            if ($a < $root->data) {
                //  if ($root->left !== null) {
                $root  = $root->left;
                // }
            } else {
                //  if ($root->right !== null) {
                $root  = $root->right;
                // }
            }
        }
    }
    echo findLowestCommonAncesstor($bst->root, 2, 7);
}