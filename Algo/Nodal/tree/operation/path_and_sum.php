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
$root2  = new BinaryNode(-10);
$root2->left  = new BinaryNode(9);
$root2->right  = new BinaryNode(20);
$root2->right->left  = new BinaryNode(15);
$root2->right->right  = new BinaryNode(7);

$root3 =  new BinaryNode(1);
$root3->left =  new BinaryNode(2);
$root3->right =  new BinaryNode(3);
function maxPathSum($root, &$sum)
{
    //// Principle of total number of edges is used to find diameter
    /// max sum path use the same principle   
    if ($root === null) {
        return 0;
    }
    $lh =  max(0, maxPathSum($root->left, $sum));
    $rh  = max(0, maxPathSum($root->right, $sum));
     //post order
    $val = $root->data;
    $sum  = max($lh + $rh +  $val, $sum);
    return max($lh, $rh) + $val;
}
$edges  = 0;
maxPathSum($root3, $edges) . "\n";
echo $edges;




/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxPathSumCode(&$root, &$sum)
    {
        //// Principle of total number of edges is used to find diameter
        /// max sum path use the same principle   
        if ($root === null) {
            return 0;
        }
        $lh = max(0, $this->maxPathSumCode($root->left, $sum));
        $rh = max(0, $this->maxPathSumCode($root->right, $sum));
        $val = $root->data;
        $sum  = max($lh + $rh +  $val, $sum);
        return max($lh, $rh) + $val;
    }


    function maxPathSum($root)
    {
        $edges  = 0;
        $this->maxPathSumCode($root, $edges);
        return $edges;
    }
}
$s = new Solution();
echo $s->maxPathSum($root2);

