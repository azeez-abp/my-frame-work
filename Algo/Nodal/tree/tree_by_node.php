<?php

/**
 * This is a class for creating the binary nodes
 */
class BinaryNode
{
    public $data;
    public $left;
    public $right;
    public function __construct(string $data = NULL)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
    /**
     * Adds child nodes
     */
    public function addChildren($left, $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}



class BinaryTree
{
    //private $root = null;
    public function __construct()
    {
        $this->root = null;
    }
    public function isEmpty()
    {
        return $this->root === null;
    }

    /**
     * Method to insert elements in to the binary tree
     */
    public function insert($data)
    {
        $node = new BinaryNode($data);
        if ($this->isEmpty()) { // this is the root node
            $this->root = $node;
            return true;
        } else {
            return $this->insertNode($node, $this->root);
        }
    }

    public function setLeft($root, $target, $data)
    {
        $node  = new BinaryNode($data);
        if ($this->root === null) {
            $this->root  = $node;
        } else {
            $targetNode  = null;
            if ($root === null) {
                echo "NOT FOUND";
            } else {
                return $this->setLeft($root->left, $target, $data);
                if ($root !== null && $root->data == $data) $targetNode = $root;
                return $this->setLeft($root->right, $target, $data);
            }


            var_dump($targetNode);
        }
    }
    /**
     * Method to recursively add nodes to the binary tree
     */
    private function insertNode($node, $current)
    {
        $addedNode = false;
        while ($addedNode === false) {
            if ($node->data < $current->data) {
                if ($current->left === null) {
                    ////add to right 
                    $current->addChildren($node, $current->right);
                    $addedNode = $node;
                    break;
                } else {
                    ///swithc to left
                    $current = $current->left;
                    return $this->insertNode($node, $current);
                }
            } elseif ($node->data > $current->data) {
                if ($current->right === null) {
                    $current->addChildren($current->left, $node);
                    $addedNode = $node;
                    break;
                } else {
                    $current = $current->right;
                    return $this->insertNode($node, $current);
                }
            } else {
                break;
            }
        }
        return $addedNode;
    }
    public function transverse($root)
    {
        static $res  = [];
        if ($root !== null) {




            array_push($res, $root->data); ///dept first search (vertical)
            if ($root->left !== null) {
                $this->transverse($root->left);
            }

            if ($root->right !== null) {
                $this->transverse($root->right);
            }
        }
        return $res;
    }
    public function search($root, $target, $c = 0)
    {

        static $data  = [];
        $data[$c]  = $root->data;
        if ($root === null) {
            return false;
        }

        if ($target == $root->data) {
            return [$data, true,];
        } elseif ($root->data > $target) {

            return $this->search($root->left,  $target, $c + 1);
        } elseif ($root->data  < $target) {

            return $this->search($root->right,  $target, $c + 2);
        }


        // if ($root === null) return "NOt";
        // if ($root->data == $target) return "$target fond";
        // return $this->search($root->left,  $target) || $this->search($root->right,  $target);
        return "FLASE";
    }

    public function findMaxElement($root)
    {
        global $data;
    }

    public function findDept($root)
    {
        static $data  = [];
        //  $data[$c]  = $root->data;
        if ($root === null) {
            return [$data, true];
        }

        array_push($data, $root->data);
        $this->findDept($root->left);
        // array_push($data, $root->data);
        $this->findDept($root->right);

        return [$data, 'count' => count($data) / 2];
    }

    public function findDept2($root)
    {
        static $data  = [];
        //  $data[$c]  = $root->data;
        if ($root === null) {
            return [$data, true];
        }

        array_push($data, $root->data);
        $this->findDept($root->left);
        // array_push($data, $root->data);
        $this->findDept($root->right);

        return [$data, 'count' => count($data) / 2];
    }

    public function  findRecursive($root, $data)
    {
        //var_dump($root);
        if ($root === null) {
            return 0;
        }
        if ($root->data == $data) {
            return 1;
        } else {

            $temp = $this->findRecursive($root->left, $data);
            if ($temp == 1) {
                return $temp;
            } else {
                return $this->findRecursive($root->right, $data);
            }
        }
    }

    public function levelOrder($root, $data = 0)
    {   ////breath first first
        static $result  = [];
        if ($root === null) {
            return true;
        }
        $queue  = [];
        array_push($queue, $root);
        $node  = null;
        $targetNode = null;
        while (!empty($queue)) {
            $node  = array_shift($queue); ///breadth first horizontal first FIFO i.e quueue
            //$node  = array_pop($queue);  ////dept first verticalfirst LIFO i.e stack
            array_push($result, $node->data);
            if ($node->data == $data) {
                $targetNode  = $node;
            }
            if ($node->left !== null) {
                array_push($queue, $node->left);
                ////the left
                /// with stack the block of code above read last
            }

            if ($node->right !== null) {
                ///the right
                array_push($queue, $node->right);
            }
        }

        return [$result, $targetNode];
    }
}

$t   = new BinaryTree();
$t->insert(10);
$t->insert(6);
$t->insert(18);
$t->insert(4);
$t->insert(8);
$t->insert(15);
$t->insert(21);
$t->insert(22);
//$t->setLeft($t->root, 22, 23);
//echo $t->findRecursive($t->root, 22);
//echo $t->root->left->data . "\n";
// echo $t->root->left->right->data . "\n";
// echo $t->root->right->data . "\n";
//print_r($t->transverse($t->root));

//echo $t->root->right->left->data . "\n";
//print_r($t->search($t->root, 21));
//print_r($t->findDept($t->root));
//var_dump($t);
$a  = [3, 4, 5, 6];
array_pop($a);
print_r($a);
array_shift($a);
print_r($a);
print_r($t->levelOrder($t->root, 18));
