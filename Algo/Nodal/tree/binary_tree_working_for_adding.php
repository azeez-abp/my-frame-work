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
}

$t   = new BinaryTree();
$t->insert(10);
$t->insert(6);
$t->insert(18);
$t->insert(4);
$t->insert(8);
$t->insert(15);
$t->insert(21);
echo $t->root->left->data . "\n";
echo $t->root->left->right->data . "\n";
echo $t->root->right->data . "\n";


echo $t->root->right->left->data . "\n";
//var_dump($t);
