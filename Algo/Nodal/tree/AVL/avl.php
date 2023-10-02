<?php
class Node
{

    public  function __construct($data)
    {
        $this->left = null;
        $this->data  = $data;
        $this->right =  null;
        $this->parent  = null;
        $this->balanceFactor  =  0;
    }
}

/*
Rotations 
When the tree structure changes (e.g., with insertion or deletion), we need to modify the tree to restore the AVL tree property. 

So, if the AVIJ tree property is violated at a node X, it means that the he ights of lefl(X) and righl(X) differ by exactly 2. This is because, if we balance the AVL tree every lime, then at any point, the difference in heights of left(X) and right(X) differ by exactly 2. Rotations is the technique used for rei;toring the AVL tree property. This means, we need lo apply the rotations for the node X

Types of Violations
Let us assume the node that must be rebalanced is X. Since any node has al moi;t two ch ildren, and a height
imbalance requires that X's two subtree heights differ by two, we can observe that a violation might occu r in four
cases:(the starting point is the node that is not balance)
1. An insertion into the LEFT subtree(tree under unbalance node) of the LEFT child of X. (Left Left Rotation. insertion into R ) ll 
2. An insertion into the RIGHT subtree of the LEFT child of X. (Left Right Rotation,insertion into S)rl
3. An insertion into the LEFT subtree of the RIGHT child of X.  ( Left Right Rotation)  lr   
#look @ right chid of a node , look at the tree under it and insert a node into the left node of the tree         
4. An insenion into the RIGHT subtree of the RIGHT child of X. (Right Right Rotation) rr
                          
                    P
                   /\ 
                  X  Q
                 /\  /\
                R  S T U  
               / \ /\   
              V   WY Z  
Cases 1 and 4 are symmetric and easily solved with single rotations.
Identify the node inserted, count two node up on the same path, that is node X 
Rotation LL
1. temp  = root.left (save left in a variable)
2. root.left  = temp.right (point the left of the root to its desendance right)'
3. temp.right  = root    (take the desendance right and point to the root) observation temp.right  = temp
             
             6                   6
            / \                 / \
          5     9              5    8
         /     /    => (LLR)  /    / \
        3     8              3     7   9
             /
            7  
  balance factor of each node must be one.    
  node(6) = 2 - 3  =-1;       
  Rotation is important for every node if the heightBalance is greater than one
*/

class AVLBSTTree
{

    public function __construct()
    {
        $this->root  = null;
    }

    public function insert($root, $data)
    {


        /*
          insert 
          calculate balance 
          rebalace
        */

        $node  = new Node($data);

        if ($this->root === null) {
            $this->root  = $node;
            $root  = $this->root;
            $root->balanceFactor = 0;
        } else {


            //$root->balanceFactor =  $this->heightBalance($root);
            if ($root->data > $data) {



                if ($root->left === null) {
                    //insert 
                    $root->left  = $node;
                    if (abs($this->heightBalance($root)) > 1 && -1 * $this->heightBalance($root) > 1) {
                        $root  = $this->singleLeftRotate($root);
                    }
                    if (abs($this->heightBalance($root)) > 1 && 1 * $this->heightBalance($root) < -1) {
                        $root  = $this->singleRighttRotate($root);
                    }
                } else {
                    //array_push($balanceArr, [$root->data, $this->heightBalance($root)]);

                    $this->insert($root->left, $data);
                }
            } else {
                if ($root->right === null) {
                    $root->right  = $node;
                } else {
                    // array_push($balanceArr, [$root->data, $this->heightBalance($root)]);

                    $this->insert($root->right, $data);
                }
            }
        }

        // print_r($root);
    }

    public function BinaryInsert($root, $data)
    {

        $node  = new Node($data);

        if ($this->root === null) {
            $this->root  = $node;
            $root  = $this->root;
            return $root;
        } else {


            if ($root->data > $data) {
                if ($root->left === null) {
                    $root->left  = $node;
                } else {
                    $this->insert($root->left, $data);
                }
            } else {
                if ($root->right === null) {
                    $root->right  = $node;
                } else {
                    $this->insert($root->right, $data);
                }
            }
        }
    }




    public function singleLeftRotate($unbalanceRoot)
    {   /// left-left imbalance =>more node to the left
        // left rotation i.e take the left rotate to the right
        //shift the left to the right 
        // and make the right to be unbalanceRoot
        $temp  = $unbalanceRoot->left; /*take that left 8 */
        $unbalanceRoot->left  = $temp->right; /*take the left and save it right in it */
        $temp->right =  $unbalanceRoot;
        return $temp;
    }

    public function singleRighttRotate($unbalanceRoot)
    {
        //shift the left to the right 
        // and make the right to be unbalanceRoot
        $temp  = $unbalanceRoot->right; /*take that left 8 */
        $unbalanceRoot->right  = $temp->left; /*take the left and save it right in it */
        $temp->left =  $unbalanceRoot;
        return $temp;
    }

    public function rightLeftRotation($unbalanceRoot)
    {
        $x  = $unbalanceRoot->left;
        if ($x->balanceFactor  === -1) { ///if left does not exist
            $unbalanceRoot->balanceFactor  = 0;
            $x->balanceFactor  = 0;
            $unbalanceRoot  = $this->singleLeftRotate($unbalanceRoot);
        } else {
            $y  = $unbalanceRoot->right;
            if ($y->balanceFactor  === -1) {
                $unbalanceRoot->balanceFactor  = 1;
                $x->balanceFactor  = 0;
            } else if ($y->balanceFactor  == 0) {
                $unbalanceRoot->balanceFactor  = 0;
                $x->balanceFactor  = 0;
            } else {
                $unbalanceRoot->balanceFactor  = -1;
                $x->balanceFactor  = 0;
            }

            $y->balanceFactor  = 0;
            $y  = $this->singleLeftRotate($x);
            $unbalanceRoot  = $this->singleRighttRotate($unbalanceRoot);
        }
        return $unbalanceRoot;
    }

    public function leftRightRotation($unbalanceRoot)
    {
        $x  = $unbalanceRoot->right;
        if ($x->balanceFactor  === -1) { ///if left does not exist
            $unbalanceRoot->balanceFactor  = 0;
            $x->balanceFactor  = 0;
            $unbalanceRoot  = $this->singleLeftRotate($unbalanceRoot);
        } else {
            $y  = $unbalanceRoot->left;
            if ($y->balanceFactor  === -1) {
                $unbalanceRoot->balanceFactor  = 1;
                $x->balanceFactor  = 0;
            } else if ($y->balanceFactor  == 0) {
                $unbalanceRoot->balanceFactor  = 0;
                $x->balanceFactor  = 0;
            } else {
                $unbalanceRoot->balanceFactor  = -1;
                $x->balanceFactor  = 0;
            }

            $y->balanceFactor  = 0;
            $y  = $this->singleLeftRotate($x);
            $unbalanceRoot  = $this->singleRighttRotate($unbalanceRoot);
        }
        return $unbalanceRoot;
    }

    public function dfsOrder($root)
    {
        if ($root === null) {
            return null;
        }
        static $res  = [];

        $this->dfsOrder($root->left);
        array_push($res, [$root->data]);
        $this->dfsOrder($root->right);
        return $res;
    }


    public  function heightBalance($root)
    {
        $orignal_root  = $root;
        static $l  = 0;
        static $r = 0;
        echo  $orignal_root->data;
        if ($root !== null && $root->left !== null) {
            $l = $l + 1;
            $this->heightBalance($root->left);
        }

        if ($root !== null && $root->right !== null) {
            $r  = $r + 1;
            $this->heightBalance($root->right);
        }

        return   $l - $r;
    }
}



$t  = new AVLBSTTree();
$nums = [33, 13, 52, 9, 21, 61, 8, 11, 66, 77, 88];



foreach ($nums as $num) {
    $t->insert($t->root, $num);  # code...

}
function heightBalance($root)
{
    if ($root === null) {
        return -1;
    }

    return   heightBalance($root->left) - heightBalance($root->right);
}
echo $t->heightBalance($t->root->left);
//print_r($t->root->right->right);




$avl  = new Node(6);
$avl->left  = new Node(5);
$avl->right  = new Node(9);
$avl->left->left  = new Node(3);
$avl->right->left  = new Node(8);
$avl->right->left->left  = new Node(7);
// print_r(heightBalance($t->root->right->right));

// function singleLeftRotate($root/*node that is not balance (with high node on left) 9*/)
// {

//     //shift the left to the right 
//     // and make the right to be root
//     $temp  = $root->left; /*take that left 8 */
//     $root->left  = $temp->right; /*take the left and save it right in it */
//     $temp->right =  $root;
//     return $temp;
// }
//echo singleLeftRotate($avl->right)->left->data;
//

//var_dump($avl->right->data);

/*
            
             6                   6
            / \                 / \
          5     9              5    8
         /     /    => (LLR)  /    / \
        3     8              3     7   9
             /
            7  
  balance factor of each node must be one.
  9 balance factor is 2  (it is not balance)
  //locate 9     
*/



// function dfsOrder($root)
// {
//     if ($root === null) {
//         return null;
//     }
//     static $res  = [];
//     array_push($res, [$root->data, heightBalance($root)]);
//     dfsOrder($root->left);
//     dfsOrder($root->right);
//     return $res;
// }

//print_r(dfsOrder($t->root));
//////////////////////////////



$avl2  = new Node(41);
$avl2->left  = new Node(20);
$avl2->left->left  = new Node(11);
$avl2->left->right  = new Node(29);
$avl2->left->right->left  = new Node(29);
$avl2->right  = new Node(65);
$avl2->right->left  = new Node(50);
$avl2->right->left->left  = new Node(7);
